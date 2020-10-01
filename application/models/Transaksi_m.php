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
        
        // $qry  = "SELECT * FROM `transaksi`";
        // $this->db->select('transaksi.*, user.name as user_name, customer.name as customer_name');
        $this->db->select('transaksi.*, user.name as user_name, customer.name as customer_name');
        $this->db->from('transaksi');
        $this->db->join('user', 'transaksi.user_id = user.user_id');
        $this->db->join('customer', 'transaksi.customer_id = customer.customer_id');

        if ($users_params != null)
        {
            $this->db->where('customer_id', $users_params);
        }
        $querys = $this->db->get();
        return $querys;
    }

    public function get($id = null)
    {
        $this->db->from('transaksi');
        if($id !=  null)
        {
            $this->db->where('id_transaksi', $id);
        }
        $query = $this->db->get();
        return $query;

    }

    public function edit_bukti($post)
    {
        $params = 
        [
            'no_rek'  => $post['norek']
        ];

        if($post['upload_foto'] != null)
        {
            $params['bukti_transfer'] = $post['upload_foto'];
        }

        $this->db->where('id_transaksi', $post['id_trans']);
        $this->db->update('transaksi', $params);
    }

    public function edit_buktinya($post)
    {
        $params = 
        [
            'no_rek'  => $post['norek']
        ];

        if($post['batal_foto'] != null)
        {
            $params['bukti_transfer'] = $post['batal_foto'];
        }

        $this->db->where('id_transaksi', $post['id_trans']);
        $this->db->update('transaksi', $params);
    }

    public function acc_trans($post)
    {
        $kasir = $this->session->userdata('userid');
        $params  = [
            'user_id' => $kasir,
            'tgl_kirim' => date('ymd'),
            'status_bayar' => 1,
            'status_kirim' => 1
        ];
        $this->db->where('id_transaksi', $post['idr']);
        $this->db->update('transaksi', $params);
    }
    public function batal($post)
    {
        $kasir = $this->session->userdata('userid');
        $params  = [
            'user_id' => $kasir,
            'tgl_kirim' => date('ymd'),
            'status_bayar' => 2
        ];
        $this->db->where('id_transaksi', $post['idr']);
        $this->db->update('transaksi', $params);
    }
}