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
}