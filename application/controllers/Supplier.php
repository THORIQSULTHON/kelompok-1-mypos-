<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('supplier_m');
    }
	public function index()
	{
		$data['row']	=	$this->supplier_m->get();
		$this->template->load('template', 'supplier/supplier_data', $data);
	}

	public function add()
	{
		$supplier = new stdClass();
		$supplier->supplier_id		=	null;
		$supplier->name 			=	null;
		$supplier->phone 			=	null;
		$supplier->address 			=	null;
		$supplier->description 		=	null;
		$data = array(
			'page'		=>	'add',
			'row'		=>$supplier
		);
		$this->template->load('template', 'supplier/supplier_form', $data);
	}

	public function process()
	{
		$post		=	$this->input->post(null, TRUE);

		if(isset($_POST['add']))
		{
				$this->supplier_m->add($post);
		}

		else if(isset($_POST['edit']))
		{
				$this->supplier_m->edit($post);
		}

		if($this->db->affected_rows() > 0 )

		{

			echo "<script>alert('Data berhasil di Simpan');</script>";

		}

			echo "<script>window.location='".site_url('supplier')."';</script>";
	}

	public function del($id)
	{
		$this->supplier_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0)
		{
			// kalau ingin hapus meskipun ada relasi silahkan ganti tipe relasi antara relasi tabel supplier dan table t_stock ubah relasi restric dari menjadi cascade di bagian on delete jika hanya ingin menghapus dan jika ingin mengupdatenya silahkan ubah juga di bagian on update
			 echo "<script>alert('Data Tidak Dapat di hapus, karena Supplier ini ada di Daftar Item');</script>";
		}
		else
		{
			echo "<script>alert('Data berhasil di hapus');</script>";
		}
			echo "<script>window.location='".site_url('supplier')."';</script>";
	}


	public function edit($id)
	{
		$query	=		$this->supplier_m->get($id);
		if($query->num_rows() > 0)
		{
			$supplier	=	$query->row();
			$data		=	array	(
				'page'	=>	'edit',
				'row'	=>	$supplier
			);
			$this->template->load('template', 'supplier/supplier_form', $data);
		} 
		
		else
		{
			echo "<script>alert('data Tidak Di temukan');</script>";
			echo "<script>window.location='".site_url('supplier')."';</script>";
		}
	}

}
