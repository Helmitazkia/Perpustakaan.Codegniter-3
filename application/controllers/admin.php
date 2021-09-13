<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		//ini untuk membuat validasi  dari sistem login yang tidak bisa di akses sebelum login
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}
	public function Halamanadmin()
	{
		//mengambil nama user berdasarkan email Yang Ada di session
		$data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'MY Profile';
		$kepo['Buku'] = $this->db->get('tabel_buku')->num_rows();
		$kepo['Anggota'] = $this->db->get('tabel_anggota')->num_rows();
		$kepo['pinjaman'] = $this->db->get('tabel_pinjam')->num_rows();
		$kepo['pengguna'] = $this->db->get('tabel_user')->num_rows();
		$this->load->view('template/header', $data);
		$this->load->view('template/saidbar', $data);
		$this->load->view('Akses_Admin/Home_admin', $kepo);
		$this->load->view('template/footer');
	}
}
