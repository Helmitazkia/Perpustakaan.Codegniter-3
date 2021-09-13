<div class="content-wrapper">
	<section class="content">
		<h1>
			<?= $title;  ?>
		</h1>
		<?= form_open_multipart('Data/tambahbuku'); ?>
		<div class="form-group">
			<label>Kode:</label>
			<input type="text" name="kode" class="form-control" value="<?php echo $newkode; ?>" readonly>
			<?= form_error('kode', '<small class="text-danger pl-2">', '</small>');  ?>
		</div>
		<div class="form-group">
			<label>judul Buku</label>
			<input type="text" name="Judul" class="form-control">
			<?= form_error('Judul', '<small class="text-danger pl-2">', '</small>'); ?>
		</div>
		<div class="form-group">
			<label>Pengarang:</label>
			<input type="text" name="pengarang" class="form-control">
			<?= form_error('pengarang', '<small class="text-danger pl-2">', '</small>'); ?>
		</div>
		<div class="form-group">
			<label>Penerbit:</label>
			<input type="text" name="penerbit" class="form-control">
			<?= form_error('penerbit', '<small class="text-danger pl-2">', '</small>'); ?>
		</div>
		<div class="form-group">
			<label>Tahun</label>
			<input type="number" name="tahun" class="form-control">
			<?= form_error('tahun', '<small class="text-danger pl-2">', '</small>'); ?>
		</div>
		<div class="form-group">
			<label>Jumlah Buku:</label>
			<input type="number" name="Jumlah" class="form-control">
			<?= form_error('Jumlah', '<small class="text-danger pl-2">', '</small>'); ?>
		</div>
		<div class="custom-file">
			<label>Gambar</label>
			<input type="file" name="userfile" class="image" id="image">
		</div>
		<br>
		<button class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url() . 'Data/buku'; ?>" class="btn btn-danger">Batal</a>
		</form>


	</section>


</div>