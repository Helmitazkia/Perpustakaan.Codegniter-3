<?php
$tgl_pinjam = date('Y-m-d');
$tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$tgl_kembali = date('Y-m-d', $tujuh_hari);


?>


<div class="content-wrapper">
	<section class="content">
		<h1>
			<?= $title;  ?>
		</h1>
		<form method="post" action="<?php echo base_url('Data/tambah_pinjaman') ?>">
			<div class="form-group">
				<label>Kode:</label>
				<input type="text" name="kode" class="form-control" value="<?php echo $newkode; ?>" readonly>
				<?= form_error('kode', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Pinjan</label>
				<input type="text" name="tanggal_m" class="form-control" value="<?php echo $tgl_pinjam ?>">
				<?= form_error('tanggal_m', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal kembali</label>
				<input type="text" name="tanggal_k" class="form-control" value="<?php echo $tgl_kembali ?>">
				<?= form_error('tanggal_k', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Total Pinjam</label>
				<input type="number" name="pinjam" class="form-control">
				<?= form_error('pinjam', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Nama Anggota</label>
				<select class="form-control" name="kode_agt" style="width: 50%;">
					<option value=""></option>
					<?php
					foreach ($Anggota as $row) {
						echo '<option value="' . $row->id_anggota . '">' . $row->nama . '</option>';
					}
					?>
				</select>
				<?= form_error('kode_agt', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Nama Buku:</label>
				<select class="form-control" name="kode_bk" style="width: 50%;">
					<option value=""></option>
					<?php
					foreach ($Buku as $row) {
						echo '<option value="' . $row->kode_buku . '">' . $row->judul_buku . '</option>';
					}
					?>
				</select>

			</div>
			<div class="form-group">
				<label for="status_pinjam">Status</label>
				<select class="form-control" name="status_pinjam" id="status_pinjam">
					<option>Kembali</option>
					<option>Pinjam</option>
				</select>

			</div>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo base_url() . 'Data/buku'; ?>" class="btn btn-danger">Batal</a>
		</form>

	</section>


</div>