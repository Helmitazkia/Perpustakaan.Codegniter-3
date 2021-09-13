<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{


    public function __construct()
    {
        //ini untuk membuat validasi  dari sistem login yang tidak bisa di akses sebelum login
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function buku()
    {
        //mengambil nama user berdasarkan email Yang Ada di session
        $data['Buku'] = $this->m_mhs->tampil_data_buku();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Buku';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar');
        $this->load->view('Akses_Admin/Data_buku/v_buku', $data);
        $this->load->view('template/footer');
    }
    public function tambahbuku()
    {
        $data['Buku'] = $this->m_mhs->tampil_data_buku();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Buku';

        //Membuat Nomor otomatis
        $table = "tabel_buku";
        $field = "kode_buku";
        $lastkode = $this->m_mhs->getmax($table, $field);
        //Mengambil 4 karakter Dari Belakang(-4)
        $nourut = (int) substr($lastkode, -4, 4);
        $nourut++;
        //Untuk Mengembalikan integer ke string(s)
        $awalkode = "BK";
        $data['newkode'] =  $awalkode . sprintf('%04s', $nourut);


        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('Judul', 'judul', 'required');
        $this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('Jumlah', 'jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/saidbar');
            $this->load->view('Akses_Admin/Data_buku/v_input_book', $data);
            $this->load->view('template/footer');
        } else {

            $image =  $_FILES['userfile']['name'];

            $data['userfile'] = $image;

            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '10000';
            $config['upload_path'] = './project/images/';

            $this->load->library('upload', $config);
            // jika ada file yang di upload
            if (!$this->upload->do_upload('userfile')) {
                echo "gagal upload lurrr";
            } else {
                $image = $this->upload->data('file_name');
                $image = $data['userfile'];
                $kode =  $this->input->post('kode');
                $Judul =  $this->input->post('Judul');
                $pengarang =  $this->input->post('pengarang');
                $penerbit =  $this->input->post('penerbit');
                $tahun =  $this->input->post('tahun');
                $Jumlah =  $this->input->post('Jumlah');

                $tambah = array(
                    'kode_buku'      =>   $kode,
                    'judul_buku'     =>   $Judul,
                    'pengarang_buku' =>   $pengarang,
                    'penerbit_buku'  =>   $penerbit,
                    'tahun_buku'     =>   $tahun,
                    'jumlah_buku'    =>   $Jumlah,
                    'image'          =>   $image,
                );
            }





            $this->db->insert('tabel_buku', $tambah);
            $this->session->set_flashdata('message', 'DI TAMBAHKAN');
            redirect('Data/buku');
        }
    }
    public function caribuku()
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Buku';
        $keyword = $this->input->post('keyword');
        $data['Buku'] = $this->m_mhs->book_search($keyword);
        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar');
        $this->load->view('Akses_Admin/Data_buku/v_buku', $data);
        $this->load->view('template/footer');
    }


    public function hapus_buku($id)
    {
        $where = array('kode_buku' => $id);
        $this->m_mhs->hps_buku($where, 'tabel_buku');
        $this->session->set_flashdata('message', 'DI HAPUS');
        redirect(base_url('Data/buku'));
    }
    function edit($id)
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('kode_buku' => $id);
        $data['Buku'] = $this->m_mhs->edit_data_buku($where, 'tabel_buku')->result();
        $data['title'] = 'Edit Buku';


        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_buku/v_edit_buku', $data);
        $this->load->view('template/footer');
    }
    public function update_buku()
    {
        //$data['user'] untuk menampilkan nama yang login  di header dan saidbar
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_buku/v_edit_buku', $data);
        $this->load->view('template/footer');
        $data['Buku'] = $this->db->get_where('tabel_buku', ['kode_buku'])->row_array();


        $new_image =  $_FILES['file_foto']['name'];
        if ($new_image) {

            $config['allowed_types'] = 'gif|jpg';
            $config['max_size']     = '10000';
            $config['upload_path'] = './project/images/';

            $this->load->library('upload', $config);
            //jika berhasil di upload
            //Maka update Gambar yang lama dengan gambar yang baru
            //upload dan do_upload adalah element dari codegniter sendiri
            if ($this->upload->do_upload('image')) {

                $old_image = $this->input->post('old_image');
                //untuk menghapus gambar yang sudah di update di library nya
                //FCPATH untuk menghapus yang sebelumnya ada di folder setelah di edit
                if ($old_image !=  $old_image) {
                    unlink(FCPATH . './project/images/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
            } else {
                $old_image = $this->input->post('old_image');
            }
        }
        if ($new_image = $new_image) {
            $kode = $this->input->post('kode');
            $Judul = $this->input->post('Judul');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $Jumlah = $this->input->post('Jumlah');

            $data = array(
                'kode_buku'          => $kode,
                'judul_buku'         => $Judul,
                'pengarang_buku'      => $pengarang,
                'penerbit_buku'      => $penerbit,
                'tahun_buku'         => $tahun,
                'jumlah_buku'        => $Jumlah,
                'image'              => $new_image,

            );


            $where = array(
                'kode_buku' => $kode
            );
            $this->m_mhs->update_data_buku($where, $data, 'tabel_buku');
            $this->session->set_flashdata('message', 'DI UPDATE');
            redirect(base_url('Data/buku'));
        } else {
            $old_image = $this->input->post('old_image');
            $kode = $this->input->post('kode');
            $Judul = $this->input->post('Judul');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $Jumlah = $this->input->post('Jumlah');

            $data = array(
                'kode_buku'          => $kode,
                'judul_buku'         => $Judul,
                'pengarang_buku'      => $pengarang,
                'penerbit_buku'      => $penerbit,
                'tahun_buku'         => $tahun,
                'jumlah_buku'        => $Jumlah,
                'image'              => $old_image,

            );


            $where = array(
                'kode_buku' => $kode
            );
            $this->m_mhs->update_data_buku($where, $data, 'tabel_buku');
            $this->session->set_flashdata('message', 'DI UPDATE');
            redirect(base_url('Data/buku'));
        }




        //var_dump($data);
        //die;




    }


    //Data Anggota
    public function anggota()
    {
        $data['Anggota'] = $this->m_mhs->tampil_data_anggota();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Anggota';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar');
        $this->load->view('Akses_Admin/Data_Anggota/v_anggota', $data);
        $this->load->view('template/footer');
    }
    public function tambahanggota()
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Anggota';

        //Membuat Nomor otomatis
        $table = "tabel_anggota";
        $field = "id_anggota";
        $lastkode = $this->m_mhs->nomor_anggota($table, $field);
        //Mengambil 4 karakter Dari Belakang(-4)
        $nourut = (int) substr($lastkode, -4, 4);
        $nourut++;
        //Untuk Mengembalikan integer ke string(s)
        $awalkode = "AGT";
        $data['newkode'] =  $awalkode . sprintf('%04s', $nourut);

        $this->form_validation->set_rules('id_agt', 'ID', 'required');
        $this->form_validation->set_rules('nama_agt', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_agt', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tabel_user.email]', [
            'is_unique' => 'Email ini sudah Pernah di daftarkan',
            'valid_email' => 'Yang Anda Masukan Bukan Email'
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|is_unique[tabel_anggota.telepon]', [
            'is_unique' => 'Nomor ini sudah Pernah di daftarkan!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('status_agt', 'Status', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/saidbar');
            $this->load->view('Akses_Admin/Data_Anggota/v_input_agt', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'id_anggota' => $this->input->post('id_agt'),
                'nama' => $this->input->post('nama_agt'),
                'jenis_kel' => $this->input->post('jenis_agt'),
                'email' => $this->input->post('email'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status_agt'),



            ];

            $this->db->insert('tabel_anggota', $data);
            $this->session->set_flashdata('message', 'DI TAMBAHKAN');
            redirect('Data/anggota');
        }
    }
    public function Cari_anggota()
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Anggota';
        $keyword = $this->input->post('keyword');
        $data['Anggota'] = $this->m_mhs->get_keyword($keyword);
        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar');
        $this->load->view('Akses_Admin/Data_Anggota/v_anggota', $data);
        $this->load->view('template/footer');
    }
    public function hapus_agt($id)
    {
        //message adalah parameter untuk membuat pesan
        $where = array('id_anggota' => $id);
        $this->m_mhs->hps_agt($where, 'tabel_anggota');
        $this->session->set_flashdata('message', 'DI HAPUS');
        redirect('Data/anggota');
    }
    function edit_anggota($id)
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id_anggota' => $id);
        $data['Anggota'] = $this->m_mhs->edit_data_agt($where, 'tabel_anggota')->result();
        $data['title'] = 'EDIT DATA ANGGOTA';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_Anggota/v_edit_agt', $data);
        $this->load->view('template/footer');
    }
    public function update_agt()
    {
        //$data['user'] untuk menampilkan nama yang login  di header dan saidbar
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_Anggota/v_edit_agt', $data);
        $this->load->view('template/footer');

        $id = $this->input->post('id_agt');
        $nama = $this->input->post('nama_agt');
        $jenis = $this->input->post('jenis_agt');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $status = $this->input->post('status_agt');

        $data = array(
            'id_anggota'          => $id,
            'nama'               => $nama,
            'jenis_kel'             => $jenis,
            'email'              => $email,
            'telepon'            => $telepon,
            'alamat'             => $alamat,
            'status'             => $status,

        );

        $where = array(
            'id_anggota' => $id
        );
        $this->m_mhs->update_data_agt($where, $data, 'tabel_anggota');
        $this->session->set_flashdata('message', 'DI UPDATE');
        redirect(base_url('Data/anggota'));
    }
    //Data Pinjaman
    public function pinjam()
    {
        //mengambil nama user berdasarkan email Yang Ada di session
        $data['Pinjam'] = $this->m_mhs->tampil_pjm();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'DATA PINJAMAN';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_pinjaman/v_pinjam', $data);
        $this->load->view('template/footer');
    }
    public function tambah_pinjaman()
    {
        //mengambil nama user berdasarkan email Yang Ada di session
        $data['Anggota'] = $this->m_mhs->tampil_data_anggota();
        $data['Buku'] = $this->m_mhs->tampil_data_buku();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'DATA PINJAMAN';

        $this->form_validation->set_rules('kode', 'kode', 'required', [
            'required' => 'ID Harus Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('tanggal_m', 'Tanggal Pinjam', 'required', [
            'required' => 'Tanggal Pinjam Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('tanggal_k', 'Tanggal kembali', 'trim|required', [
            'required' => 'Tanggal kembali Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('pinjam', 'Total Pinjam', 'required', [
            'required' => 'Total Pinjam idak Boleh Kosong !'
        ]);

        $this->form_validation->set_rules('status_pinjam', 'status', 'required', [
            'required' => 'status Tidak Boleh Kosong !'
        ]);
        //Membuat Nomor otomatis
        $table = "tabel_pinjam";
        $field = "kode_pinjam";
        //05-22-2021 FORMAT TANGGAL
        $today = date('ymd');
        $frepix = "TR" . $today;
        $lastkode = $this->m_mhs->id_transaksi($frepix, $table, $field);
        $nourut = (int) substr($lastkode, -4, 4);
        $nourut++;
        //Untuk Mengembalikan integer ke string 04s(s)
        $data['newkode'] =  $frepix . sprintf('%04s', $nourut);


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/saidbar', $data);
            $this->load->view('Akses_Admin/Data_pinjaman/v_input_pinjam', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'kode_pinjam' => $this->input->post('kode'),
                'tanggal_minjam' => $this->input->post('tanggal_m'),
                'tanggal_kembali' => $this->input->post('tanggal_k'),
                'total_pinjam' => $this->input->post('pinjam'),
                'kode_anggota' => $this->input->post('kode_agt'),
                'kode_buku' => $this->input->post('kode_bk'),
                'status' => $this->input->post('status_pinjam'),
            ];

            $this->db->insert('tabel_pinjam', $data);
            //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            //enambahkan Data Berhasil
            //</div>');
            $this->session->set_flashdata('message', 'DI TAMBAHKAN');
            redirect('Data/pinjam');
        }
    }
    public function Cari_pinjaman()
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Pinjaman';
        $keyword = $this->input->post('keyword');
        $data['Pinjam'] = $this->m_mhs->cari_pjm($keyword);
        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar');
        $this->load->view('Akses_Admin/Data_pinjaman/v_pinjam', $data);
        $this->load->view('template/footer');
    }

    public function hapus_pinjam($id)
    {
        //message adalah parameter untuk membuat pesan
        $where = array('kode_pinjam' => $id);
        $this->m_mhs->hps_pinjam($where, 'tabel_pinjam');
        $this->session->set_flashdata('message', 'DI HAPUS');
        redirect('Data/pinjam');
    }
    function edit_pinjam($id)
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('kode_pinjam' => $id);
        $data['Pinjam'] = $this->m_mhs->edit_data_pinjam($where, 'tabel_pinjam')->result();
        $data['title'] = 'EDIT DATA PINJAMAN';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_pinjaman/v_edit_pinjam', $data);
        $this->load->view('template/footer');
    }
    public function update_pinjam()
    {
        //$data['user'] untuk menampilkan nama yang login  di header dan saidbar
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Admin/Data_pinjaman/v_edit_pinjam', $data);
        $this->load->view('template/footer');

        $kode = $this->input->post('kode');
        $tanggal1 = $this->input->post('tanggal_m');
        $tanggal2 = $this->input->post('tanggal_k');
        $total = $this->input->post('total');
        $kode_agt = $this->input->post('kode_agt');
        $kode_bk = $this->input->post('kode_bk');
        $status_pinjam = $this->input->post('status_pinjam');

        $data = array(
            'kode_pinjam'               => $kode,
            'tanggal_minjam'               => $tanggal1,
            'tanggal_kembali'             => $tanggal2,
            'total_pinjam'              => $total,
            'kode_anggota'              => $kode_agt,
            'kode_buku'                 => $kode_bk,
            'status'                    => $status_pinjam,

        );

        $where = array(
            'kode_pinjam' => $kode
        );
        $this->m_mhs->update_data_pinjam($where, $data, 'tabel_pinjam');
        $this->session->set_flashdata('message', 'DI UPDATE');
        redirect(base_url('Data/pinjam'));
    }

    public function report()
    {
        $data['Buku'] = $this->m_mhs->tampil_data_buku_report();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Buku';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_kepala/v_report', $data);
        $this->load->view('template/footer');
    }
    public function pinjaman()
    {
        //mengambil nama user berdasarkan email Yang Ada di session
        $data['Pinjam'] = $this->m_mhs->tampil_data_pinjam();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'DATA PINJAMAN';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_kepala/v_pinjaman', $data);
        $this->load->view('template/footer');
    }
    public function pinjamanuser()
    {
        //mengambil nama user berdasarkan email Yang Ada di session
        $data['Pinjam'] = $this->m_mhs->tampil_data_pinjam();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'DATA PINJAMAN';

        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar', $data);
        $this->load->view('Akses_Anggota/v_pinjaman_anggota', $data);
        $this->load->view('template/footer');
    }

    public function tambah_pinjaman_user()
    {
        //mengambil nama user berdasarkan email Yang Ada di session
        $data['Pinjam'] = $this->m_mhs->tampil_data_pinjam();
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'DATA PINJAMAN';

        $this->form_validation->set_rules('kode', 'kode', 'required', [
            'required' => 'ID Harus Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('tanggal_m', 'Tanggal Pinjam', 'required', [
            'required' => 'Tanggal Pinjam Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('tanggal_k', 'Tanggal kembali', 'trim|required', [
            'required' => 'Tanggal kembali Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required', [
            'required' => 'Email Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('kode_agt', 'kode Anggota', 'required', [
            'required' => 'kode Anggota Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('kode_bk', 'kode buku', 'required', [
            'required' => 'kode buku Tidak Boleh Kosong !'
        ]);
        $this->form_validation->set_rules('status_pinjam', 'status', 'required', [
            'required' => 'status Tidak Boleh Kosong !'
        ]);
        //Membuat Nomor otomatis
        $table = "tabel_pinjam";
        $field = "kode_pinjam";
        //2021-05-22
        $today = date('ymd');
        $frepix = "TR" . $today;
        $lastkode = $this->m_mhs->id_transaksi($frepix, $table, $field);
        $nourut = (int) substr($lastkode, -4, 4);
        $nourut++;
        //Untuk Mengembalikan integer ke string 04s(s)
        $data['newkode'] =  $frepix . sprintf('%04s', $nourut);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/saidbar', $data);
            $this->load->view('Akses_Anggota/v_input_pinjam', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'kode_pinjam' => $this->input->post('kode'),
                'tanggal_minjam' => $this->input->post('tanggal_m'),
                'tanggal_kembali' => $this->input->post('tanggal_k'),
                'total_pinjam' => $this->input->post('email'),
                'kode_anggota' => $this->input->post('kode_agt'),
                'kode_buku' => $this->input->post('kode_bk'),
                'status' => $this->input->post('status_pinjam'),
            ];

            $this->db->insert('tabel_pinjam', $data);
            $this->session->set_flashdata('message', 'DI TAMBAHKAN');
            redirect('Data/pinjamanuser');
        }
    }
    public function Cari_pinjaman_buku()
    {
        $data['user'] = $this->db->get_where('tabel_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Data Pinjaman';
        $keyword = $this->input->post('keyword');
        $data['Pinjam'] = $this->m_mhs->cari_pjm($keyword);
        $this->load->view('template/header', $data);
        $this->load->view('template/saidbar');
        $this->load->view('Akses_kepala/v_pinjaman', $data);
        $this->load->view('template/footer');
    }

    //lAPORAN PEMINJAMAN BUKU
    public function laporanpinjam()
    {
        $this->load->library('dompdf_gen');
        $data['Pinjam'] = $this->m_mhs->tampil_data_pinjam();


        $this->load->view('Akses_Admin/Data_pinjaman/v_laporan_pinjam', $data);

        $paper_size = 'A4';
        $orientation = 'lendscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        //convert ke pdf
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('Laporan_Peminjaman.pdf', array('attachement' => 0));
    }
}
