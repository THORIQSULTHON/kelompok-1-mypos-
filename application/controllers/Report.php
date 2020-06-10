<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
// sebellum itu buatlah model untuk eksekusi sqlnya
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Sale_m', 'Sale');
    }

    public function online()
    {
        $data['row']  = $this->Sale->get_online_report();
        $this->template->load('template', 'transaction/report/report_data', $data);
    }

    public function sale()
    {
        $data['row']  = $this->Sale->get_sale();
        $this->template->load('template', 'report/sale_report', $data);
    }
    
}