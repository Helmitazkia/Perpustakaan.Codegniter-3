<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    
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
        $this->load->model('m_mhs');
        $data['Mahasiswa'] = $this->m_mhs->tampil_user_role();
		$data['user'] = $this->db->get_where('tabel_user',['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Menu Management'; 
        //$data ['menu'] Menampilkan tabel user_menu
        $data['menu'] = $this->db->get('user_menu')->result_array();
        //'menu' adalah name/nama inputanya
        $this->form_validation->set_rules('menu','Menu','required');
        if ($this->form_validation->run()== false){

            $this->load->view('template/header',$data);
            $this->load->view('template/saidbar',$data);
            $this->load->view('menu/index',$data);
            $this->load->view('template/footer');
        }else{
            //jika berhasil, Maka tambahkan data baru
            $this->db->insert('user_menu',['menu'=>$this->input->post('menu')]);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Menambahkan Data Berhasil
            </div>');
            redirect('Menu');
             }   
	}

    public function submenu(){
		$data['user'] = $this->db->get_where('tabel_user',['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Sub Menu Management';

        $this->load->model('m_mhs');
        $data['Submenu'] = $this->m_mhs->tampil_submenu();
        // $data['menu'] Untuk Menampilkan Nama Menu di v_submenu Menggunakan combobox
        $data['menu']=$this->db->get('user_menu')->result_array(); 

        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('menu_id','Menu','required');
        $this->form_validation->set_rules('icon','Icon','required');
        $this->form_validation->set_rules('is_active','Is_active','required');

        if($this->form_validation->run() == false){

            $this->load->view('template/header',$data);
            $this->load->view('template/saidbar',$data);
            $this->load->view('menu/v_submenu',$data);
            $this->load->view('template/footer');
        }else{

            $data = [
                'title'=>$this->input->post('title'),
                'menu_id'=>$this->input->post('menu_id'),
                'url'=>$this->input->post('url'),
                'icon'=>$this->input->post('icon'),
                'is_active'=>$this->input->post('is_active'),



            ];
            $this->db->insert('user_sub_menu',$data);
            $this->session->set_flashdata('message','<div class="alert alert-warning" role="alert">
            Menambahkan Data Berhasil
            </div>');
            redirect('Menu/submenu');
             }
        }

        public function hapus_sub_menu($id){
            $where = array ('id' => $id);
            $this->m_mhs->hps_sub_menu($where,'user_sub_menu');
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
            Data Berhasil DI Hapus
            </div>');
            redirect (base_url('Menu/submenu'));
    
            
        }
      


    }
