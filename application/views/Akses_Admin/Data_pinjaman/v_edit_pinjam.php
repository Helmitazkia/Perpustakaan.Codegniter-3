<div class="content-wrapper">
	<section class="content">
		<h1>
			<?= $title;  ?>
		</h1>
		<?php foreach ($Pinjam as $PJM) { ?>
			<form action="<?php echo base_url() . 'Data/update_pinjam'; ?>" method="POST">
				<div class="form-group">
					<label>Kode pinjaman</label>
					<input type="text" name="kode" class="form-control" value="<?php echo $PJM->kode_pinjam  ?>" readonly>
				</div>
				<div class="form-group">
					<label>Tanggal pinjam</label>
					<input type="text" name="tanggal_m" class="form-control" value="<?php echo $PJM->tanggal_minjam ?>">
					<?= form_error('nama_agt', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Tanggal kembali</label>
					<input type="text" name="tanggal_k" class="form-control" value="<?php echo $PJM->tanggal_kembali ?>">
					<?= form_error('jenis_agt', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Total Pinjam</label>
					<input type="number" name="total" class="form-control" value="<?php echo $PJM->total_pinjam ?>">
					<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Kode Anggota</label>
					<input type="text" name="kode_agt" class="form-control" value="<?php echo $PJM->kode_anggota ?>">
					<?= form_error('telepon', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Kode Buku</label>
					<input type="text" name="kode_bk" class="form-control" value="<?php echo $PJM->kode_buku ?>">
					<?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Status</label>
					<input type="text" name="status_pinjam" class="form-control" value="<?php echo $PJM->status ?>">
					<?= form_error('status_agt', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<Button class="btn btn-primary">Simpan</Button>
				<a href="<?php echo base_url() . 'Data/pinjam'; ?>" class="btn btn-danger">Batal</a>
			</form>
		<?php } ?>



	</section>


</div>