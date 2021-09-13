<?php


class M_mhs extends CI_Model
{
	public	function tampil_user_role()
	{
		return	$this->db->get('user_menu')->result_array();
	}
	public	function tampil_submenu()
	{
		// $query untuk Menampilkan Nama Menu Yang Berupa Angka 
		$query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
				 FROM `user_sub_menu` JOIN `user_menu` 
				 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
				 ";
		return $this->db->query($query)->result_array();
	}
	public function hps_sub_menu($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	//Data Buku
	public function tampil_data_buku()
	{
		return	$this->db->get('tabel_buku')->result();
	}
	//cari buku
	public function book_search($keyword)
	{
		$this->db->select('*');
		$this->db->from('tabel_buku');
		$this->db->like('judul_buku', $keyword);
		$this->db->or_like('pengarang_buku', $keyword);
		return $this->db->get()->result();
	}
	public function hps_buku($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_data_buku($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function update_data_buku($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function tampil_data_buku_report()
	{
		return	$this->db->get('tabel_buku')->result();
	}
	function detail_data_buku($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	//Membuat Nomor otomatis
	function getmax($table = null, $field = null)
	{
		$this->db->select_max($field);
		return $this->db->get($table)->row_array()[$field];
	}



	//Data Anggota
	public function tampil_data_anggota()
	{
		return	$this->db->get('tabel_anggota')->result();
	}
	public function hps_agt($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_data_agt($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function update_data_agt($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	//cari anggota
	public function get_keyword($keyword)
	{
		$this->db->select('*');
		$this->db->from('tabel_anggota');
		$this->db->like('nama', $keyword);
		$this->db->or_like('jenis_kel', $keyword);
		return $this->db->get()->result();
	}
	//Membuat Nomor otomatis
	function nomor_anggota($table = null, $field = null)
	{
		$this->db->select_max($field);
		return $this->db->get($table)->row_array()[$field];
	}


	//data Pinjam
	public function tampil_data_pinjam()
	{
		return	$this->db->get('tabel_pinjam')->result();
	}
	function tampil_pjm()
	{

		$this->db->select('tabel_pinjam.kode_pinjam , tabel_pinjam.tanggal_minjam,tabel_pinjam.tanggal_kembali,tabel_pinjam.total_pinjam,tabel_anggota.nama,tabel_buku.judul_buku,tabel_pinjam.status');
		$this->db->from('tabel_pinjam');
		$this->db->join('tabel_buku', 'tabel_buku.kode_buku = tabel_pinjam.kode_buku');
		$this->db->join('tabel_anggota ', 'tabel_anggota.id_anggota = tabel_pinjam.kode_anggota');
		$query = $this->db->get();
		return $query->result();
	}
	public function hps_pinjam($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	function edit_data_pinjam($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function update_data_pinjam($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function tampil_data_buku_koleksi()
	{
		return	$this->db->get('tabel_buku')->result_array();
	}
	public function cari_pjm($keyword)
	{
		$this->db->select('*');
		$this->db->from('tabel_pinjam');
		$this->db->like('status', $keyword);
		$this->db->or_like('total_pinjam', $keyword);
		return $this->db->get()->result();
	}
	function id_transaksi($frepix = null, $table = null, $field = null)
	{
		// after = % untuk menentukan like dari depan (0001)
		$this->db->select($field);
		$this->db->like($field, $frepix, 'after');
		$this->db->order_by($field, 'desc');
		$this->db->limit(1);

		return $this->db->get($table)->row_array()[$field];
	}
}
