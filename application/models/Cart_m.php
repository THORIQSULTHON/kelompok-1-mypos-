<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_m extends CI_Model {

    public function get_cart($user_params = null)
    {
        $user = $this->session->userdata('customerid');
        $qry = "SELECT `p_item`.*, `p_item`.`name` AS `item_name`, `cart`.*
        FROM `p_item` JOIN `cart`
        ON `p_item`.`item_id` = `cart`.`id_item` 
        WHERE customer_id = '$user'";
         if($user_params != null)
         {
             $this->db->where('customer_id', $user_params);
         }
        $qryy = $this->db->query($qry)->result_array();
        // $query = "SELECT * FROM cart";
        return $qryy;

    }

    public function add_cart($post)
    {
        $query = $this->db->query('SELECT * FROM cart');
		$tabel = $query->num_rows();
        $date = date('dm', time());
        $id_p = "IDC" . $tabel . $date;

        $params = [

            'id_cart'  =>  $id_p,
            'customer_id'  =>  $post['customer_id'],
            'id_item'  =>  $post['id_produk'],
            'qty_dibeli'  =>  $post['qty'],
            'total_berat'  =>  $post['ratrat'],
            'tgl_transaksi'  =>  date('Y-m-d H:i:s'),

        ];
        $this->db->insert('cart', $params);
    }

    public function delete($id)
    {
        $user = $this->session->userdata('customerid');
        $this->db->where('id_item', $id);
        $this->db->where('customer_id', $user);
        $this->db->delete('cart');
    }
    
    public function edit($post)
    {
        $params = 
        [
            'qty_dibeli' => $post['qty12'],
            'total_berat' => $post['qty12']*$post['beratrat'],
        ];
        $customer = $this->session->userdata('customerid');
        $this->db->where('id_item', $post['id_item']);
        $this->db->where('customer_id', $customer);
        $this->db->update('cart', $params);
    }

    public function get_detel_cart()
    {
        
    }
}