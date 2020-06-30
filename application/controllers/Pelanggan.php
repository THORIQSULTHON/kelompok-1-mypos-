<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Customer_m');
    }
	public function index()
	{
		$data['row']	=	$this->Customer_m->get();
		$this->template->load('template', 'customer/customer_data', $data);
	}

	public function add()
	{
		$customer = new stdClass();
		$customer->customer_id		=	null;
        $customer->name 			=	null;
		$customer->gender 			=	null;
		$customer->email_db 			=	null;
		$customer->password_db 			=	null;
		$customer->phone 			=	null;
		$customer->address 			=	null;
		$data = array(
			'page'		=>	'add',
			'row'		=>$customer
		);
		$this->template->load('template', 'customer/customer_form', $data);
	}

	public function process()
	{
		$post		=	$this->input->post(null, TRUE);

		if(isset($_POST['add']))
		{
				$this->Customer_m->add($post);
		}

		else if(isset($_POST['edit']))
		{
				$this->Customer_m->edit($post);
		}

		if($this->db->affected_rows() > 0 )

		{

			echo "<script>alert('Data berhasil di Simpan');</script>";

		}

			echo "<script>window.location='".site_url('customer')."';</script>";
	}

	public function del($id)
	{
		$this->Customer_m->del($id);
		if($this->db->affected_rows() > 0 )
		{
		echo "<script>alert('Data berhasil di hapus');</script>";
		}
		echo "<script>window.location='".site_url('customer')."';</script>";
	}
					// $id adalah para meter dari link di dalam tombol edit yang berisikan (costumer_id)
	public function edit($id)
	{
		$query	=		$this->Customer_m->get($id);
		if($query->num_rows() > 0)
		{
			$customer	=	$query->row();
			$data		=	array	(
				'page'	=>	'edit',
				'row'	=>	$customer
			);
			$this->template->load('template', 'customer/customer_form', $data);
		} 
		
		else
		{
			echo "<script>alert('data Tidak Di temukan');</script>";
			echo "<script>window.location='".site_url('customer')."';</script>";
		}
	}

}
