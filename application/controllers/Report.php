<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
// sebellum itu buatlah model untuk eksekusi sqlnya
	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Sale_m');
    }

    public function index()
    {
        $data['row']  = $this->Sale_m->get_report();
        $this->template->load('template', 'transaction/report/report_data', $data);
    }
    
}