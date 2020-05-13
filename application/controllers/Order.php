<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Transaksi_m']);
    }

    public function index()
    {
        $this->template->load('template', 'order_pending/order_data');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['acc_tombol']))
        {
            $this->Transaksi_m->acc_trans($post);
        }

        if($this->db->affected_rows() > 0 )
        {
            echo "<script>alert('Data berhasil di Terima');</script>";
        }

        // echo "<script>window.location='".site_url('Order')."';</script>";
    }
}