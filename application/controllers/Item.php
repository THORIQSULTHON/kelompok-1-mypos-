<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
		$this->load->model(['item_m', 'category_m', 'unit_m']);
		
	}
	
	function get_ajax() 
	{
								// ngambil dari model item_m.php
        $list = $this->item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Cetak <i class="fa fa-barcode"></i></a>';
            $row[] = $item->name;
            $row[] = $item->category_name;
            $row[] = $item->unit_name;
            $row[] = indo_currency($item->price);
            $row[] = $item->berat;
            $row[] = $item->stock;
            $row[] = $item->image != null ? '<img src="'.base_url('uploads/product/'.$item->image).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                   <a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->item_m->count_all(),
                    "recordsFiltered" => $this->item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
	}
	
	public function index()
	{
		$data['row']	=	$this->item_m->get();
		$this->template->load('template', 'product/item/item_data', $data);
	}

	public function add()
	{
		$item = new stdClass();
		$item->item_id		=	null;
		$item->barcode		=	null;
		$item->name 		=	null;
		$item->price		=	null;
		$item->berat		=	null;
		$item->deskripsi	=	null;
		$item->category_id 	= 	null;


		$query_category	=	$this->category_m->get();

		$query_unit		=	$this->unit_m->get();
		$unit[null]		=	'- Pilih -';
		foreach($query_unit->result() as $unt)
		{
			$unit[$unt->unit_id]	=	$unt->name;
		}

		$data = array(
			'page'		=>	'add',
			'row'		=>	$item,
			'category'	=>	$query_category,
			'unit'		=>	$unit, 'selectedunit'	=> null,
		);
		$this->template->load('template', 'product/item/item_form', $data);
	}

	public function process()
	{
							// ini untuk validasi untuk letak penyimpanan file yang akan di upload
					$config['upload_path']		=	'./uploads/product/';
					// ini untuk validasi unutk jenis file yang bisa di upload 
					$config['allowed_types']	=	'gif|jpg|png|jpeg';
					// valdasi untuk ukuran maksimal file yang bisa di upload
					$config['max_size']			=	20480;
					// ini untuk menseting nama file yang akan di simpan , ketika di simpan maka yang akan terjadi nama fileyang di upload akan di ubah menjadi "item-(tanggal upload)-(dan kode yang di enkripsi menggunakan md5)"
					$config['file_name']		=	'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
					$this->load->library('upload', $config);

					$post		=	$this->input->post(null, TRUE);

		if(isset($_POST['add']))
		{
				// ini adalah parameter untuk validasi di jika barcodenya di tambahkan sudah di pakai oleh barang lain
				if ($this->item_m->check_barcode($post['barcode'])->num_rows() > 0 )
				{
					// maka di flash data sudah di beri para meter 'error' yang di gunakan untuk menampilkan pesan yang telah di custom yang terletak di  views/message.php
					$this->session->set_flashdata('error', "Barcode $post[barcode] sudah di pakai untuk barang lain, Silahkan Gunakan barcode Yang Masih belum Dipakai");
					// setelah itu di lempar lagi di halaman untuk add dan di item_form.php sudah di beri atau sudah load flash data meesage pada di bawah div content
					redirect('item/add');

				}
				else
				{
					if (@$_FILES['image']['name'] != null)
					{
						if($this->upload->do_upload('image'))
						{
							$post['image'] = $this->upload->data('file_name');
							$this->item_m->add($post);
							if($this->db->affected_rows() > 0 )

							{
					
								$this->session->set_flashdata('success', 'data berhasil di simpan');
					
							}
					
								redirect('item');
						}
						else
						{
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error', $error);
							redirect('item/add');

						}
					}
					else
					{
						$post['image'] = null;
						$this->item_m->add($post);
						if($this->db->affected_rows() > 0 )

						{
				
							$this->session->set_flashdata('success', 'data berhasil di simpan');
				
						}
				
							redirect('item');
					}
				}
		}

		else if(isset($_POST['edit']))
		{
												// untuk validasi edid kita hanya menambahkan 1 parameter lagi si dalam load function check barcode ya itu berupa post id di form, untuk menghindari error pada saat kita mengubah semua data kecuali barcode, kalau tidak di beri parameter baru maka hasilnya atau peraturannya jika ingin mengedit kita harus memberi atau mengubah barcodenya 
			if ($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0 )
			{
				$this->session->set_flashdata('error', "Barcode $post[barcode] sudah di pakai untuk barang lain, Silahkan Gunakan barcode Yang Masih belum Dipakai");
				redirect('item/edit/'.$post['id']);
			}

			else 
			{
				if (@$_FILES['image']['name'] != null)
					{
						if($this->upload->do_upload('image'))
						{
							// ini untuk logika replace yang ada di upload agar tidak memakan banyak penyimpanan
							// pertama mencari atau mengambil data sesuai post di inputan idnya yang otomatis terisi sesuai id yang ada di parameter getnya
							$item = $this->item_m->get($post['id'])->row();
							// jika item image tidak sama dengan nol alias ada
							if($item->image != null)
							{
								// maka targetfile akan pilih letah foldernya dan variabel item yang mewakili gambarnya sesuai id di inputan form yang telah di hidden
								$target_file = './uploads/product/'.$item->image;
								// setelah itu di buat method unlink lalu di beri para meter target file yang mewakili letak file sekaligus nama file tersebut. "unlink adalah nama method yang ada di php native
								unlink($target_file);
							}
							// setelah melewati atau memenuhi pesyaratan di atas sebenarnta tidak masalah di atas intinya adalah bertujuan untuk menghapus, jika tidak memenuhi maka akan dilewati dan di lanjutkan ke perkondisian untuk menginputkan file yang sudah di pilih di bawah ^^
							$post['image'] = $this->upload->data('file_name');
							$this->item_m->edit($post);
							if($this->db->affected_rows() > 0 )

							{
					
								$this->session->set_flashdata('success', 'data berhasil di simpan');
					
							}
					
								redirect('item');
						}
						else
						{
							$error = $this->upload->display_errors();
							$this->session->set_flashdata('error', $error);
							redirect('item/add');

						}
					}
					else
					{
						$post['image'] = null;
						$this->item_m->edit($post);
						if($this->db->affected_rows() > 0 )

						{
				
							$this->session->set_flashdata('success', 'data berhasil di simpan');
				
						}
				
							redirect('item');
					}
			}
		}


	}

	public function del($id)
	{
		// ini untuk logika replace yang ada di upload agar tidak memakan banyak penyimpanan
		// pertama mencari atau mengambil data sesuai post di inputan idnya yang otomatis terisi sesuai id yang ada di parameter getnya
		$item = $this->item_m->get($id)->row();
		// jika item image tidak sama dengan nol alias ada
		if($item->image != null)
		{
			// maka targetfile akan pilih letah foldernya dan variabel item yang mewakili gambarnya sesuai id di inputan form yang telah di hidden
			$target_file = './uploads/product/'.$item->image;
			// setelah itu di buat method unlink lalu di beri para meter target file yang mewakili letak file sekaligus nama file tersebut. "unlink adalah nama method yang ada di php native
			unlink($target_file);
		}
		$this->item_m->del($id);
		if($this->db->affected_rows() > 0 )
		{
			$this->session->set_flashdata('success', 'data berhasil di Hapus');
		}
		echo "<script>window.location='".site_url('item')."';</script>";
	}

	public function edit($id)
	{
		$query	=		$this->item_m->get($id);
		if($query->num_rows() > 0)
		{
			$item	=	$query->row();
			$query_category	=	$this->category_m->get();

			$query_unit		=	$this->unit_m->get();
			$unit[null]		=	'- Pilih -';
			foreach($query_unit->result() as $unt)
			{
				$unit[$unt->unit_id]	=	$unt->name;
			}
	
			$data = array(
				'page'		=>	'edit',
				'row'		=>	$item,
				'category'	=>	$query_category,
				'unit'		=>	$unit, 'selectedunit'	=> $item->unit_id,
			);
			$this->template->load('template', 'product/item/item_form', $data);
		}
		
		
		else
		{
			echo "<script>alert('data Tidak Di temukan');</script>";
			echo "<script>window.location='".site_url('item')."';</script>";
		}
	}

	function barcode_qrcode($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
							// manggil templatenya, lalu setalh itu memanggil contentnya file "barcode_qrcode" yang berada di dalam folder "product/item"
		$this->template->load('template', 'product/item/barcode_qrcode', $data);
	}
	function barcode_print($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
		$html = $this->load->view('product/item/barcode_print', $data, true);
																					// landscape posisi miring
		$this->fungsi->PdfGenerator($html, 'barcode-'.$data['row']->barcode,'A4', 'landscape');
	}

	function qrcode_print($id)
	{
		$data['row'] = $this->item_m->get($id)->row();
		$html = $this->load->view('product/item/qrcode_print', $data, true);
																						// potrait posisi tegak
		$this->fungsi->PdfGenerator($html, 'qrcode-'.$data['row']->barcode,'A4', 'potrait');
	}
}
