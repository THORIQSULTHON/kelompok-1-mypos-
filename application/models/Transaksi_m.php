<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model 
{
    public function add($post)
    {
        $query = $this->db->query('SELECT * FROM transaksi');
		$tabel = $query->num_rows();
        $date = date('dm', time());
        $id_p = "IDC" . $tabel . $date;

        $params =
        [
            'id_transaksi' => $id_p,
            'user_id'      => 'Belum',
            'customer_id'  => $post['idcustomer'],
            'alamat_kirim' => $post['alamat'],
            'total_harga' => $post['final_total2'],
            'total_final' => $post['total_bayar'],
            'tgl_transaksi' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('transaksi', $params);
    }

    public function add_detail($row)
    {
        $this->db->insert_batch('dtl_transaksi', $row);
    }

    public function del_cart($params = null)
    {
        if($params != null)
        {
            $this->db->where($params);
        }
        $this->db->delete('cart');
    }

    public function get_transaksi($users_params = null)
    {
        $users = $this->session->userdata('customerid');
        $qry  = "SELECT * FROM `transaksi` WHERE customer_id = '$users";
        if ($users_params != null)
        {
            $this->db->where('customer_id', $users_params);
        }
        $querys = $this->db->query($qry);
        return $querys;
    }
}