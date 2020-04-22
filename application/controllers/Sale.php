<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {
// sebellum itu buatlah model untuk eksekusi sqlnya
	function __construct()
    {
        parent::__construct();
        check_not_login();
		$this->load->model('sale_m');

    }

	public function index()
	{
		$this->load->model(['customer_m', 'item_m']);
		$customer = $this->customer_m->get()->result();
		$item = $this->item_m->get()->result();
		$cart = $this->sale_m->get_cart();
		$data = array (
			'customer'	=> $customer,
			'item'	    => $item,
			'cart'	    => $cart,
			'invoice'	=> $this->sale_m->invoice_no(),
		);
		$this->template->load('template', 'transaction/sale/sale_form', $data);
	}

	public function process()
	{
			// variable data adalah berfungsi menampung post dari inputan inputannya
		$data = $this->input->post(null, TRUE);
		// Pembukaan proses add data jika tombol dengan id "add_cart" di pencet / di klik
		if(isset($_POST['add_cart'])) 
		{
											// sesaikan dengan nama inputan yang di deklarasikan menggunakan javascript
			$item_id  = $this->input->post('item_id');
			$check_cart = $this->sale_m->get_cart(['t_cart.item_id' => $item_id])->num_rows();
				// tidak usah di numrows soalnya udah di num rows di bagian line pembuatan variable $check_cart
			if($check_cart > 0) 
			{
				// ini meload fungsi di dalam file model yang bernama sale_m.php di dalam folder model
				$this->sale_m->update_cart_qty($data);
			} 
			else 
			{

				$this->sale_m->add_cart($data);
			}

		if($this->db->affected_rows() > 0) {
			$params = array ("success" => true);
		} 
		else 
		{
			$params = array ("success" => false);
		}
		echo json_encode($params);
	  }
	  // Penutupan proses add data

	//   Pembukaan Proses Edit Data jika tombol dengan id "edit_cart" di pencet / di klik
	  if(isset($_POST['edit_cart']))
	  {

		$this->sale_m->edit_cart($data);

		if($this->db->affected_rows() > 0) {
			$params = array ("success" => true);
		} 
		else 
		{
			$params = array ("success" => false);
		}
		echo json_encode($params);
	  }

	//   Proses Eksekusi Belanjaan
	  if(isset($_POST['process_payment']))
	  {
		//   dengeri penjelasannya di eps 55 di menit ke 14:45
		$sale_id = $this->sale_m->add_sale($data);
		$cart    = $this->sale_m->get_cart()->result();
		$row     = [];
		foreach($cart as $c => $value)
		{
			array_push($row, array(
					'sale_id' 			=> $sale_id,
					'item_id'			=> $value->item_id,
					// yang kiri adalah field di tabel t_sale_detail yang ingin  kita insert, dan yang kanan adalah di ambil dari field atau kolom di t_cart
					'price'	  			=> $value->price,
					'qty'	  			=> $value->qty,
					'discount_item'		=> $value->discount_item,
					'total'				=> $value->total,
				)
			);
		}
		$this->sale_m->add_sale_detail($row);
		$this->sale_m->del_cart(['user_id' => $this->session->userdata('userid')]);

		if($this->db->affected_rows() > 0) {
			$params = array ("success" => true, "sale_id" => $sale_id);
		} 
		else 
		{
			$params = array ("success" => false);
		}
		echo json_encode($params);

	  }

	}

	function cart_data()
	{
		// ini untuk mengauto load membuat function baru di model
		// laluu varia bel cart menampung baris kode di mana baris kodenya class ini memanggil file sale_m.php di folder model lalu mengambil function add_cart nya
		$cart = $this->sale_m->get_cart();
		$data['cart'] = $cart;
		$this->load->view('transaction/sale/cart_data', $data);
	}
//  membuat fungsi delete pada cartnya
	public function cart_del()
	{
		if(isset($_POST['cancel_payment'])){
			$this->sale_m->del_cart(['user_id' => $this->session->userdata('userid')]);
		}else {
			// me load atau menampung dari inputan yanng mempunyai id "cart_id" , kalau dari orang variable $cart_id dari post ajax tadi
		$cart_id = $this->input->post('cart_id');
		// meload fungsi del_cart di dalam file sale_m.php, lalu di beri parameter berbentuk array yang mengambil kolom cart_id lalu di cocokan pada variable $cart_id yang menampung inputan dari cart_id
		$this->sale_m->del_cart(['cart_id' => $cart_id]);

		}
		// pengecekan di database apakah cart_id yang di maksud ada atau tidak
		if($this->db->affected_rows() > 0) {
			// jika ada maka tampilkan true dan di lempar ke dalam sale_form.php di baris 357
			$params = array ("success" => true);
		} else {
			// jika kosong maka tampilkan false dan di lempar ke dalam sale_form.php di baris 361
			$params = array ("success" => false);
		}
		echo json_encode($params);
	}

	public function cetak($id)
	{
		$data = array (
			'sale' => $this->sale_m->get_sale($id)->row(),
			'sale_detail' => $this->sale_m->get_sale_detail($id)->result(),
		);
		$this->load->view('transaction/sale/receipt_print', $data);

	}
}