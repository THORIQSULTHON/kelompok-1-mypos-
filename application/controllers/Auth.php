<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
		
	}
	public function process()
	{
									// parameter pertama adalah nama dari form yang ada di view(coba liat di login.php di view)
									// parameter kedua xxxfilter "Filter dari form"
		$post	=	$this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('user_m');
			$query	=	$this->user_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array (
					'userid'	=> $row->user_id,
					'level'		=> $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Selamat, Login Berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			} else {
				echo "<script>
					alert('Login Gagal');
					window.location='".site_url('auth/login')."';
				</script>";
			}
		} 
	}

	public function registrasi()
	{
		$this->load->model('Customer_m');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('customer_name', 'Nama', 'required');
		$this->form_validation->set_rules('phone', 'NomerHp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[customer.email_db]');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('pass1', 'Konfirmasi Password', 'required|matches[pass]');
		
		$this->form_validation->set_message('is_unique', '%s Username sudah di pakai, Silahkan gunakan Username Lainnya');
        $this->form_validation->set_message('matches', '%s Tidak Sama dengan Password');
        $this->form_validation->set_message('required', '%s Masih Kosong Silahkan Isi');
        $this->form_validation->set_message('min_length', '%s Silahkan Isi minimal 5 huruf/angka');

		$this->form_validation->set_error_delimiters('<span class="help-block" style="color: red;">', '</span>');

		if ($this->form_validation->run() == FALSE)
        {
			$this->load->view('registrasi');
		} 
		else
        {
		   $post = $this->input->post(null, TRUE);
		   
           $this->Customer_m->regis($post);
           if($this->db->affected_rows() > 0)
           {
                echo "<script>alert('data Berhasil Di simpan');</script>";
           }
           echo "<script>window.location='".site_url('Auth_user')."';</script>";
        }




	}
	public function logout()
	{
		$params		=	array('userid','level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}