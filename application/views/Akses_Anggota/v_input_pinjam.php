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
		<form method="post" action="<?php echo base_url('Data/tambah_pinjaman_user') ?>">
			<div class="form-group">
				<label>Kode:</label>
				<input type="text" name="kode" class="form-control" value="<?php echo $newkode; ?>" readonly>
				<?= form_error('kode', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Masuk</label>
				<input type="text" name="tanggal_m" class="form-control" value="<?php echo $tgl_pinjam ?>" readonly>
				<?= form_error('tanggal_m', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Tanggal Keluar</label>
				<input type="text" name="tanggal_k" class="form-control" value="<?php echo $tgl_kembali ?>" readonly>
				<?= form_error('tanggal_k', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Total Pinjam</label>
				<input type="text" name="email" class="form-control">
				<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kode Anggota</label>
				<input type="text" name="kode_agt" class="form-control">
				<?= form_error('kode_agt', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Kode Buku:</label>
				<input type="text" name="kode_bk" class="form-control">
				<?= form_error('kode_bk', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" name="status_pinjam" class="form-control">
				<?= form_error('status_pinjam', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo base_url('user'); ?>" class="btn btn-danger">Batal</a>
		</form>

	</section>


</div>