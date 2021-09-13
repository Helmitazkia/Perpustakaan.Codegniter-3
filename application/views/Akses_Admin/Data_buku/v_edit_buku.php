<div class="content-wrapper">
	<section class="content">
		<h1>
			<?= $title; ?>
		</h1>
		<?php foreach ($Buku as $Buku) { ?>
			<form action="<?php echo base_url() . 'Data/update_buku'; ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label>Kode Buku:</label>
					<input type="text" name="kode" class="form-control" value="<?php echo $Buku->kode_buku  ?>" readonly>
				</div>
				<div class="form-group">
					<label>judul buku</label>
					<input type="text" name="Judul" class="form-control" value="<?php echo $Buku->judul_buku ?>" required>
					<?= form_error('Judul', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Pengarang Buku:</label>
					<input type="text" name="pengarang" class="form-control" value="<?php echo $Buku->pengarang_buku ?>" required>
					<?= form_error('pengarang', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Penerbit Buku:</label>
					<input type="text" name="penerbit" class="form-control" value="<?php echo $Buku->penerbit_buku ?>" required>
					<?= form_error('penerbit', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Tahun Buku:</label>
					<input type="number" name="tahun" class="form-control" value="<?php echo $Buku->tahun_buku ?>" required>
					<?= form_error('tahun', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label>Jumlah Buku:</label>
					<input type="number" name="Jumlah" class="form-control" value="<?php echo $Buku->jumlah_buku ?>" required>
					<?= form_error('Jumlah', '<small class="text-danger pl-2">', '</small>'); ?>
				</div>
				<div class="custom-file">
					<label>Gambar</label>
					<input type="file" name="file_foto" class="form-control">
					<input type="hidden" name="old_image" class="form-control" value="<?php echo $Buku->image ?>" required>

				</div>
				<br>
				<div style="text-align: left;">
					<img src="<?= base_url('project/images/') . $Buku->image; ?>" width="120" class="rounded float-left   ">
				</div>
				<br>
				<Button class="btn btn-primary">Simpan</Button>
				<a href="<?php echo base_url() . 'Data/buku'; ?>" class="btn btn-danger">Batal</a>
			</form>
		<?php } ?>


	</section>


</div>