<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();

        // code di baris 12 ini kalau di baca class ini meload folder model dan mengambil data dari file "item_m.php"  dan "supplier_m.php"
        $this->load->model(['item_m', 'supplier_m', 'stock_m']);
    }
// Bagian Stock in Data
    public function stock_in_data()
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
                                        // slice pertama (transaction) setelah koma adalah nama folder yang ada di view
                                        // slice kedua (stock_in)  nama folder di dalam folder transaction
                                        // slice ketiga (stock_in_data) adalah nama file di dalam folder stock_in tetapi memanggilnya tanpa menggunakan ekstensi apapun (kecuali kita membuat filenya)
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_add()
    {
        $item = $this->item_m->get()->result();
        $supplier = $this->supplier_m->get()->result();
        // buat array yang bervariable kan $data, lalu panggil di  bagian template load di bawah ini
                // string item ini mengambil dari variable $item di atas ini yang sedang get data
        $data = [
            'item'     => $item,
            'supplier' => $supplier
        ];
                                            // silahkan liat petunjuk di atas
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }
    public function stock_in_del()
    {
                            // hitungnagndari mypos(segment ke 0)/stock( segment ke 1)/in(segment ke2)/del(segmen ke3)/stock_id(segment ke4)/item_id(segment 5)
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
                                        // row kalau cuma 1 data, kalau banyak pakai result
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
                // ini memakai 2 sql manual versi ci
                // ini logika kalau kita menghapus stock in qty yang ada di stock in akan di kurangi ke qty di tabel item
                $this->item_m->update_stock_out($data); // mengambil variable data yang si buat di dalam function stock_in_del  
                $this->stock_m->del($stock_id);
                if($this->db->affected_rows() > 0)
                {
                   $this->session->set_flashdata('success', 'Data Stock-masuk Berhasil di hapus!');
                }
                redirect('stock/in');
    }
// penutup Stok in data


    // pembukaan function Proses
    public function process()
    {
        // pembukaan set logika tombol di stock_in_form
        if(isset($_POST['in_add']))
        {
            // menyimpan semua inputan inputan yan ada di form
             $post = $this->input->post(null, TRUE);   
            //Class Stock yang ada di controller itu memanggil file stock_m.php di dalam folder model, lalu mengambill function "add_stock_in" di dalam file Stock_m.php
             $this->stock_m->add_stock_in($post); 
             $this->item_m->update_stock_in($post);
             if($this->db->affected_rows() > 0)
             {
                $this->session->set_flashdata('success', 'Data Stock-masuk Berhasil di simpan!');
             }
             redirect('stock/in');
        }
        // penutupan set logika tombol di stock_in_form

        // pembukaan set logika tombol di stock_out_form
        else if(isset($_POST['out_add']))
        {
            // menyimpan semua inputan inputan yan ada di form
             $post = $this->input->post(null, TRUE);
            //  membuat variabel untuk ,menampung query item_id di table p_item 
             $row_item = $this->item_m->get($this->input->post('item_id'))->row();
                // lalu panggil di dalamnya memanggil variabel $row_item dan memanggil kolom stock  di dalam tabel p_item
                // jika di baca akan menjadi "jika kolom stock di tabel p_item lebih kecil dari pada inputan qty di form stock out 
             if ($row_item->stock < $this->input->post('qty'))
             {
                $this->session->set_flashdata('error', 'Data Qty Melebihi Stock Barang, maksimal jumlah Qty adalah sesuai / setara dengan Stock');
                redirect('stock/out/add');
             }
             else
             {
                 //Class Stock yang ada di controller itu memanggil file stock_m.php di dalam folder model, lalu mengambill function "add_stock_in" di dalam file Stock_m.php
                  $this->stock_m->add_stock_out($post); 
                  $this->item_m->update_stock_out($post);
                  if($this->db->affected_rows() > 0)
                  {
                     $this->session->set_flashdata('success', 'Data Stock-keluar Berhasil di simpan!');
                  }
                  redirect('stock/out');
             }

        }
        // penutupan set logika tombol di stock_out_form

    }
    // penutupan function proses

    // pembukaan stock Out 
    public function stock_out_data()
    {
                        
        $data['row'] = $this->stock_m->get_stock_out()->result();
            //stelah this ada template ini mengambil dari folder helper   // liat di baris koding 17 sampe 20 di  bagian komen
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_out_add()
    {
        $item = $this->item_m->get()->result();
        $data = ['item' => $item];
                                            // liat di baris koding 17 sampe 20 di  bagian komen
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }
    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
                // ini logika kalau kita menghapus stock out qty yang ada di stock out akan di tambahkan ke qty di tabel item
                $this->item_m->update_stock_in($data);
                $this->stock_m->del($stock_id);
                if($this->db->affected_rows() > 0)
                {
                   $this->session->set_flashdata('success', 'Data Stock-keluar Berhasil di hapus!');
                }
                redirect('stock/out');
    }
    // penutupan stock out
}