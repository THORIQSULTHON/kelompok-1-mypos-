<?php

Class Fungsi {
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();

    }

    function user_login()
    {
        $this->ci->load->model('user_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->user_m->get($user_id)->row();
        return $user_data;
    }

    function PdfGenerator($html, $filename, $paper, $orientation) 
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // gak wajib , soalnya di librarynya bagian ini untuk menseting format text pdf yang akan di buat
        $dompdf->setPaper($paper, $orientation);
        // rendering html di pdfnya
        $dompdf->render();
        // output atau hasil generator dari pdf ke browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    public function count_item()
    {
        $this->ci->load->model('item_m');
                //class ini meload ci, setelah itu meload file item_m.php, lalu mengambil function get yang ada di dalam folder item_m.php, dan setelah itu function get isinya berisi tentang memanggil semua data yang ada di dalam table "p_item" lalu setelah itu menggunakan fungsi(num_rows) yang berguna untuk menghitung jumlah baris yang ada di dalamnya 
        return $this->ci->item_m->get()->num_rows();
    }

    public function count_supplier()
    {
        $this->ci->load->model('supplier_m');
                //class ini meload ci, setelah itu meload file supplier_m.php, lalu mengambil function get yang ada di dalam folder supplier_m.php, dan setelah itu function get isinya berisi tentang memanggil semua data yang ada di dalam table "p_supplier" lalu setelah itu menggunakan fungsi(num_rows) yang berguna untuk menghitung jumlah baris yang ada di dalamnya 
        return $this->ci->supplier_m->get()->num_rows();
    }

    public function count_customer()
    {
        $this->ci->load->model('customer_m');
                //class ini meload ci, setelah itu meload file customer_m.php, lalu mengambil function get yang ada di dalam folder customer_m.php, dan setelah itu function get isinya berisi tentang memanggil semua data yang ada di dalam table "p_customer" lalu setelah itu menggunakan fungsi(num_rows) yang berguna untuk menghitung jumlah baris yang ada di dalamnya 
        return $this->ci->customer_m->get()->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('user_m');
                //class ini meload ci, setelah itu meload file user_m.php, lalu mengambil function get yang ada di dalam folder user_m.php, dan setelah itu function get isinya berisi tentang memanggil semua data yang ada di dalam table "p_user" lalu setelah itu menggunakan fungsi(num_rows) yang berguna untuk menghitung jumlah baris yang ada di dalamnya 
        return $this->ci->user_m->get()->num_rows();
    }
}