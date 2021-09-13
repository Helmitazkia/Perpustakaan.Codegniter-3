<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['judul1'] = 'Perpustakaan Nasional';
		$this->load->view('v_home', $data);
	}
	public function Colection()
	{
		$data['Buku'] = $this->m_mhs->tampil_data_buku_koleksi();
		$data['judul1'] = 'Perpustakaan Nasional';
		$this->load->view('template_lgn/header_login', $data);
		$this->load->view('koleksi_buku/v_tampil_buku', $data);
		$this->load->view('template_lgn/footer_login');
	}
	public function about()
	{
		$data['judul1'] = 'Perpustakaan Nasional';
		$this->load->view('template_lgn/header_login', $data);
		$this->load->view('v_about');
		$this->load->view('template_lgn/footer_login');
	}
	public function Detail($id)
	{
		//Mengambil Detail Buku Sesuai dengan Database
		$where = array('kode_buku' => $id);
		$data['Buku'] = $this->m_mhs->detail_data_buku($where, 'tabel_buku')->result();
		$data['judul1'] = 'Perpustakaan Nasional';
		$data['title'] = 'Detail Book';
		$this->load->view('template_lgn/header_login', $data);
		$this->load->view('koleksi_buku/v_detail_buku', $data);
		$this->load->view('template_lgn/footer_login');
	}
}
