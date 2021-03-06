<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item_m extends CI_Model {

    // start datatables
    var $column_order = array(null, 'barcode', 'p_item.name', 'category_name', 'unit_name', 'price', 'stock', 'image'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'p_category.name', 'p_unit.name', 'p_item.name', 'price'); //set column field database for datatable searchable
    var $order = array('item_id' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    // ini di pake di bagian control table "Item.php" di bagian get ajax
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('p_item');
        return $this->db->count_all_results();
    }
    // end datatables

    public function get($id = null)
    {
            // fungsi select lebih spesifik sekaligus memberi alias karena semua tabel hampir menggunakan kata name untuk nama kategori, unit, maupun namanya  makanya kita butuh pemberian alias lalu alias tersebut di panggil di item_data.php dan di panggil nama aliasnya sesuai degan nama filed di htmlnya
            $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
            // select tabel gabungan dulu dari kategory dan unit yaitu item yang memounyaoi category_id dan unit_id
            $this->db->from('p_item');
            //  setlah itu di join dari p_category di petik pertama, setalh itu yang ke dua di select p_category menselect ata memilih primary key yaitu category_id
            $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
            //  setlah itu di join dari p_unit di petik pertama, setalh itu yang ke dua di select p_unit menselect ata memilih primary key yaitu unit_id
            $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
            if($id != null)
            {
                $this->db->where('item_id', $id);
            }
            $this->db->order_by('barcode', 'asc');
            $query = $this->db->get();
            return $query;
    }
    public function add($post)
    {
        $params     =   [
        // name ini sesuai dengan di database, dan post[] sesuai dengan nama inputan di form item
            'barcode'               =>   $post['barcode'],
            'name'                  =>   $post['product_name'],
            'category_id'           =>   $post['category'],
            'unit_id'               =>   $post['unit'],
            'price'                 =>   $post['price'],
            'berat'                 =>   $post['berat'],
            'deskripsi'             =>   $post['deskripsi'],
            'image'                 =>   $post['image'],
        ];
        $this->db->insert('p_item', $params);
    }    
    
    // ini function untuk edit
    public function edit($post)
    {
        $params     =   [
        // name ini sesuai dengan di database, dan post[] sesuai dengan nama inputan di form item
        'barcode'               =>   $post['barcode'],
        'name'                  =>   $post['product_name'],
        'category_id'           =>   $post['category'],
        'unit_id'               =>   $post['unit'],
        'price'                 =>   $post['price'],
        'berat'                 =>   $post['berat'],
        'deskripsi'             =>   $post['deskripsi'],
            'updated'       =>   date('Y-m-d H:i:s')
        ];
        // ini membuat validasi atau logika jika foto memang tidak kosong alias ada isinya maka di update fotonya dengan yang baru, tidak usah pakai else, jadi kalau kita gak mengganti fotonya maka update di fotonya tetap menggunakan foto yang lama
        if ($post['image'] != null)
        {
            $params['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
    }
    public function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if ($id != null)
        {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id  = $data['item_id'];
            // membuat query seperti biasa ini untuk menambah qty
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
    // pembukaan logika update stock out yang akan di load di dalam controller Stock.php 
    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id  = $data['item_id'];
            // membuat query seperti biasa ini untuk mengurangi qty
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);
    }
    // penutupan logika update stock out yang akan di load di dalam controller Stock.php 
}