<?php 

class Mahasiswa extends CI_Controller{

	public	function index(){
		$this->load->model('m_mhs');
		$data['Mahasiswa'] = $this->m_mhs->tampil_data();

        $this->load->view('template/header');
        $this->load->view('template/saidbar');
		$this->load->view('view_mhs',$data);
        $this->load->view('template/footer');		
	
	}

}



?>