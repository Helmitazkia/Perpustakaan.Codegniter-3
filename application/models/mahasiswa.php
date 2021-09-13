

<?php 

class M_mhs extends CI_Model {
		public	function tampil_data ()
			{
			return	$this->db->get('tabel_mahasiswa')->result_array();
			}
		}




?>