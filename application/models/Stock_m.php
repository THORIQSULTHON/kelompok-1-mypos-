<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_m extends CI_Model {

    public function get($id = null)
    {
            $this->db->from('t_stock');
            if($id != null)
            {
                $this->db->where('stock_id', $id);
            }
          $query =  $this->db->get();
          return $query;
    }
    // pembukaan stock out
    public function del($id)
    {
        $this->db->where('stock_id', $id);
        $this->db->delete('t_stock');
    }
    public function get_stock_in()
    {
        // ini untuk joinnya
        $this->db->select('t_stock.stock_id, p_item.barcode, p_item.name as item_name, qty, date, detail, supplier.name as supplier_name, p_item.item_id');
        // from tabel induknya
        $this->db->from('t_stock');
        // lalu join kan dengan tabel lainnya, para meter pertama nama tabel , para meter ke 2 proses penjoinan
        $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
                                                                                // di tambahi left karena jika user tidak menambahkan supplier di tambah stock maka data yang tidak ada suppliernya tidak akan keluar karena tidak ada relasinya makanya di kasih parameter ketiga yaitu 'left' itu artinya leftjoin
        $this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id', 'desc');
        
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_in($post)
    {
        $params =  [
            //di sebelah kiri sebelum tanda "=>" adalah nama field di database mypos tabel t_stock, dan di sebelah kaanan setelah tanda "=>" adalah nama post yang di ambil dari nama name di setiap inputan
                'item_id'     => $post['item_id'],
                'type'        => 'in',
                'detail'      => $post['detail'],
                                                //ini menggunakan if di dalam line, kalo di baca "jika supplier kosong maka inputan di database kosong , dan jika inputan supplier ada maka inputan tersebut akan di masukan ke database
                'supplier_id' => $post['supplier'] == '' ? null : $post['supplier'],
                'qty'         => $post['qty'],
                'date'        => $post['date'],
                // mengambil data dari session yang terletak di Auth.php di dalam array bervariablekan $params
                'user_id'        => $this->session->userdata('userid')
                    ];
        // ini untuk query insert di dalam kurung tersebut ada 2 parameter, parameter pertama adalah tabel "t_stock", dan yang kedua adalah array param yang menampung data dari inputan dan akan di masukan ke tabel t_stock
        $this->db->insert('t_stock', $params);
    }
    // penutup Stock In



    // pembukaan stock Out
            // btw ini untuk proses yang akan di request oleh file controller biasanya di sini tempat query query db nya
    public function get_stock_out()
    {
        $this->db->from('t_stock');
        $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'desc');
        
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post)
    {
        $params =  [
                'item_id'     => $post['item_id'],
                'type'        => 'out',
                'detail'      => $post['detail'],
                'qty'         => $post['qty'],
                'date'        => $post['date'],
                'user_id'        => $this->session->userdata('userid')
                    ];
        $this->db->insert('t_stock', $params);
    }

}