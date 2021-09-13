<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{


	public function __construct()
	{
		//ini untuk membuat validasi  dari sistem login yang tidak bisa di akses sebelum login
		parent::__construct();
		if (!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	public function index()
	{

		//mengambil nama user berdasarkan email Yang Ada di session
		// untuk Menampilkan semua data user berasarkan Yang Login Menggunakan Email
		$data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Hallo user';
		$this->load->view('template/header', $data);
		$this->load->view('template/saidbar', $data);
		$this->load->view('v_user', $data);
		$this->load->view('template/footer');
	}

	public function edit()
	{
		//mengambil nama user berdasarkan email Yang Ada di session
		// untuk Menampilkan semua data user berasarkan Yang Login Menggunakan Email
		$data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Profile';

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/saidbar', $data);
			$this->load->view('v_edit_profil', $data);
			$this->load->view('template/footer', $data);
		} else {

			$name = $this->input->post('name');
			$email = $this->input->post('email');

			//Cek Jika ada gambar yang akan di upload
			//image adalah nama inputan yang ada di v_edit_profile
			//name adalah nama samaran doang
			$upload_image = $_FILES['image']['name'];
			//jika user mengupload
			if ($upload_image) {

				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './asset/img/profile/';

				$this->load->library('upload', $config);
				//jika berhasil di upload
				//Maka update Gambar yang lama dengan gambar yang baru
				//upload dan do_upload adalah element dari codegniter sendiri
				if ($this->upload->do_upload('image')) {

					$old_image = $data['user']['image'];
					//untuk menghapus gambar yang sudah di update di library nya
					//FCPATH untuk menghapus yang sebelumnya ada di folder setelah di edit
					if ($old_image != 'default.Jpg') {
						unlink(FCPATH . 'asset/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}




			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('tabel_user');

			$this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
            Edit Profile Berhasil
            </div>');
			redirect('user/edit');
		}
	}

	public function cangedpassword()
	{


		$data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Change Password';

		//matches untuk memvalidasi supaya new password harus sama dengan konfirmasi password

		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|matches[new_password1]', [
			'matches' => 'konfirmasi password salah !'

		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/saidbar', $data);
			$this->load->view('v_canged_password', $data);
			$this->load->view('template/footer', $data);
		} else {

			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Password Sebelumnya salah !
				</div>');
				redirect('user/cangedpassword');
			} else {

				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password Baru Tidak Boleh Sama dengan Password yang Lama !
					</div>');
					redirect('user/cangedpassword');
				} else {

					// password Nya sudak Bener aliyas validasi yang di atas sudah lulus, maka  Pasword yang di inpukan akan di hash
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('tabel_user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					ubah Password Berhasil  !
					</div>');
					redirect('user/cangedpassword');
				}
			}
		}
	}
}
