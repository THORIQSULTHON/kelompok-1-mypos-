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
        $data['row'] = $this->Transaksi_m->get_transaksi();
        $this->template->load('template', 'order_pending/order_data', $data);
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($_POST['acc_tombol']))
        {
            $id_tr = $this->input->post('idr');
            $id = $this->input->post('id_barang');
            $tempo = $this->input->post('tempo');
            $jml_tmp = 0;

            $looping_idbrang = count($id);
            $looping_jumlah_tempo = count($tempo);

            if($looping_idbrang >= 1 && $looping_jumlah_tempo)
            {
                for ($i=0; $i <= $looping_idbrang ; $i++)
                {
                    if(isset($id[$i]) != '' && isset($tempo[$i]) != '')
                    {
                        $this->db->query("UPDATE dtl_transaksi SET jumlah_beli='$tempo[$i]', jml_dibeli_tmp='$jml_tmp' WHERE item_id = '$id[$i]' AND id_transaksi = '$id_tr'");
                    }
                }
            }

            $this->Transaksi_m->acc_trans($post);
        }

        if($this->db->affected_rows() > 0 )
        {
            echo "<script>alert('Data berhasil di Konfirmasi!');</script>";
        }
        echo "<script>window.location='".site_url('Order')."';</script>";
        // echo "<script>window.location='".site_url('Order')."';</script>";
    }
}