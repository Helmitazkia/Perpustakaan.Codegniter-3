<div class="content-wrapper">
	<section class="content">
		<h1>
			<?= $title;  ?>
		</h1>
		<form method="post" action="<?php echo base_url('Data/tambahanggota') ?>">
			<div class="form-group">
				<label>Kode:</label>
				<input type="text" name="id_agt" class="form-control" value="<?php echo $newkode; ?>" readonly>
				<?= form_error('id_agt', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama_agt" class="form-control">
				<?= form_error('nama_agt', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>jenis Kelamin</label>
				<input type="text" name="jenis_agt" class="form-control">
				<?= form_error('jenis_agt', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="text" name="email" class="form-control">
				<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Telepon</label>
				<input type="text" name="telepon" class="form-control" max="12" min="5">
				<?= form_error('telepon', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Alamat:</label>
				<input type="text" name="alamat" class="form-control">
				<?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" name="status_agt" class="form-control">
				<?= form_error('status_agt', '<small class="text-danger pl-2">', '</small>'); ?>
			</div>
			<button class="btn btn-primary">Simpan</button>
			<a href="<?php echo base_url() . 'Data/buku'; ?>" class="btn btn-danger">Batal</a>
		</form>

	</section>


</div>