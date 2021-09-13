<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kepala extends CI_Controller {

	public function __construct()
    {
        //ini untuk membuat validasi  dari sistem login yang tidak bisa di akses sebelum login
        parent:: __construct();
        if(!$this->session->userdata('email')){
			redirect('auth');
		}
    }
	public function index()
	{
		//mengambil nama user berdasarkan email Yang Ada di session
		$data['user'] = $this->db->get_where('tabel_user',['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Welcome To Petugas';
		$this->load->view('template/header',$data);
		$this->load->view('template/saidbar',$data);
		$this->load->view('v_kepala',$data);
		$this->load->view('template/footer');


		

		
	}
}
