<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Item_m');
		$this->load->model('Customer_m');
		$this->load->model('Cart_m');
		$this->load->model('Transaksi_m');
	}
    public function index()
	{
		// $data['user'] = $this->db->get_where('customer', ['name' => $this->session->userdata('name')])->row_array();
		$data['row'] 	= $this->Item_m->get();
		$this->load->view('home/elemen/header');
		$this->load->view('home/elemen/banner');
		$this->load->view('home/elemen/produklain', $data);
		$this->load->view('home/index', $data);
		$this->load->view('home/elemen/banner_bawah', $data);
		$this->load->view('home/elemen/footer');
	}

	public function histori_transaksi()
	{
		$users_params = $this->session->userdata('customerid');
		$data['row'] = $this->Transaksi_m->get_transaksi();
		$this->load->view('home/elemen/header');
		$this->load->view('home/histori_transaksi', $data);
		$this->load->view('home//elemen/footer');
	}
	
	public function detail($id)
	{
		$query = $this->Item_m->get($id);
		if($query->num_rows() > 0)
		{
			$item 	= 	$query->row();
			$data 	=	array (
			'page'	=> 	'detail',
			'row'	=>	$item
			);

			$this->load->view('home/elemen/header');
			$this->load->view('home/elemen/page_info');
			$this->load->view('home/detail', $data);
			// $this->load->view('home/elemen/produklain', $data);
			$this->load->view('home/elemen/footer');
		}
	}

	public function proses()
	{

		$post   =   $this->input->post(null, TRUE);
		
		if(isset($_POST['tambah_cart']))
		{
			$minimal = $this->input->post('qty');
			if($minimal == 0)
			{
				echo "<script>
					alert('Minimal pembelian 1 barang');
					window.location='".site_url('Home')."';
				</script>";
			}

			$this->Cart_m->add_cart($post);
			echo "<script>
					alert('Barang telah di tambahkan');
					window.location='".site_url('Home')."';
				</script>";
		}

		echo "<script>window.location='".site_url('Home/cart')."';</script>";


	}
	public function cart()
    {
		cek_login_cart();
		$data['row'] 	= 		$this->Cart_m->get_cart();
        $this->load->view('home/elemen/header');
        $this->load->view('home/elemen/page_info');
        $this->load->view('home/cart', $data);
        $this->load->view('home/elemen/footer');

	}
	
	public function del_cart($id)
	{
		$this->Cart_m->delete($id);
		if($this->db->affected_rows() > 0)
		{
			echo "<script>alert('Sukses');</script>";
		}
		echo "<script>window.location='".site_url('Home/cart')."';</script>";
	}
	public function prosesct()
	{
		if(isset($_POST['edit_tombol']))
		{
			$post = $this->input->post(null, TRUE);
			$this->Cart_m->edit($post);
			if($this->db->affected_rows() > 0)
			{
				echo "<script>alert('Sukses');</script>";
			}
			echo "<script>window.location='".site_url('Home/cart')."';</script>";
		}
	}

	public function edit_cart($id)
	{
		$this->Cart_m->get_cart($id);
	}

	public function check_out()
	{
		$query = $this->db->query('SELECT * FROM transaksi');
		$tabel = $query->num_rows();
        $date = date('dm', time());
        $id_p = "IDC" . $tabel . $date;

		$user_params = $this->session->userdata('customerid');
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['transak']))
		{
		 	$id = $this->input->post('id_brg_tmp');
			$harga = $this->input->post('harga_brg_tmp');
			$qty = $this->input->post('qty_brg_tmp');
			
			$hitungData_dtl = $this->db->query("SELECT * FROM dtl_transaksi");
			$hitung_dtl = $hitungData_dtl->num_rows();
			
			$this->Transaksi_m->add($post);

			$number_id_brg = count($id);
			$number_harga = count($harga);
			$jml_beli = 0;
			
			if($number_id_brg >= 1 && $number_harga >= 1)
			{
				for ($i=0; $i <= $number_id_brg ; $i++) { 
					$hitung_dtl++;
					if(isset($harga[$i]) != '' && isset($qty[$i]) != '')
					{
						$this->db->query("INSERT INTO dtl_transaksi VALUES('$id_p', '$id[$i]', '$hitung_dtl', '$harga[$i]','$qty[$i]', '$jml_beli')");
					}
				}
			}
			$this->Transaksi_m->del_cart(['customer_id' => $this->session->userdata('customerid')]);
			if($this->db->affected_rows() > 0)
				{
					echo "<script>alert('Sukses');</script>";
				}
		}
		echo "<script>window.location='".site_url('Home')."';</script>";
	}
    
}