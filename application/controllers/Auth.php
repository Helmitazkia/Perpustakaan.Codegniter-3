<?php

class auth extends CI_Controller
{

    public function __construct()
    {
        //ini untuk membuat validasi dari sistemnya
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        //untuk Menendang user yang sudah login ingin logout tanpa mengklik tombol logout
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //index itu adalah nama method
        //title ini berfungsi untuk menamakan title url nya
        //Password dam Email Itu adalah nama aliyasnya
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Yang Anda Masukan Bukan Email',
            'required' => 'Email Harus di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password Harus di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul1'] = 'Perpustakaan Nasional';
            $this->load->view('template_lgn/header_login', $data);
            $this->load->view('v_lgn');
            $this->load->view('template_lgn/footer_login');
        } else {
            //jika validasinya lolos atau bener aliyas tidak ada yang salah 
            //row array yaitu mengambil satu baris saja
            $email =  $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('tabel_user', ['email' => $email])->row_array();
            //$user Mengambil semua data yang ada di tabel_user Berdasarkan email

            if ($user) {
                //jika usernya ada
                if ($user['is_active'] == 1) {
                    //Cek Password
                    if (password_verify($password, $user['password'])) {
                        //($password = input password
                        //$user['password'] = mangambil array dari $user
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']


                        ];
                        //nyimpan data di session ,Data (Email dan ID)
                        //nama methodnya userdata
                        $this->session->set_userdata($data);
                        if ($user['role_id'] == 1) {
                            redirect(base_url('admin/Halamanadmin'));
                        }
                        if ($user['role_id'] == 2) {
                            redirect(base_url('user'));
                        } else {
                            redirect(base_url('kepala'));
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password !
                    </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Email Ini Belom di Aktivasi !
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Registrasi !
                </div>');
                redirect('auth');
            }
        }
    }
    public function registration()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //Name dam Email Itu adalah nama aliyasnya
        //is_unique berfungsi email yang sudah di pakai
        //trim berfungsi untuk tidak ada spasi jika di simpan ke database
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tabel_user.email]', [
            'is_unique' => 'Email ini sudah Pernah di daftarkan',
            'valid_email' => 'Yang Anda Masukan Bukan Email'
        ]);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Konfirmasi password salah'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['judul1'] = 'Perpustakaan Nasional';
            $this->load->view('template_lgn/header_login', $data);
            $this->load->view('v_rgs');
            $this->load->view('template_lgn/footer_login');
        } else {
            $data =  [
                'name'     => htmlspecialchars($this->input->post('name', true)),
                'email'    => htmlspecialchars($this->input->post('email', true)),
                'image'    => 'default.Jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id'  => 2,
                'is_active' => 1,
                'date_create' => time()


            ];
            $this->db->insert('tabel_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Congratulation ! Your acount has been created please Login !
           </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
       Anda Berhasil Logout !
     </div>');
        redirect('auth');
    }
}
