<div class="content-wrapper">
	<section class="content">
		<div class="col-lg-7">
			<div class="box">
				<h1 style="padding: 10px;">
					<?= $title;  ?>
				</h1>
				<div class="box-body">
					<?php foreach ($Anggota as $agt) { ?>
						<form action="<?php echo base_url() . 'Data/update_agt'; ?>" method="POST">
							<div class="form-group">
								<label>ID ANGGOTA</label>
								<input type="text" name="id_agt" class="form-control" value="<?php echo $agt->id_anggota ?>" readonly>
							</div>
							<div class="form-group">
								<label>NAMA ANGGOTA</label>
								<input type="text" name="nama_agt" class="form-control" value="<?php echo $agt->nama ?>" required>
								<?= form_error('nama_agt', '<small class="text-danger pl-2">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>JENIS KELAMIN</label>
								<input type="text" name="jenis_agt" class="form-control" value="<?php echo $agt->jenis_kel ?>" required>
								<?= form_error('jenis_agt', '<small class="text-danger pl-2">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<input type="text" name="email" class="form-control" value="<?php echo $agt->email ?>" required max="12" min="5">
								<?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>TELEPON</label>
								<input type="number" name="telepon" class="form-control" value="<?php echo $agt->telepon ?>" required>
								<?= form_error('telepon', '<small class="text-danger pl-2">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>ALAMAT</label>
								<input type="text" name="alamat" class="form-control" value="<?php echo $agt->alamat ?>" required>
								<?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label>STATUS</label>
								<input type="text" name="status_agt" class="form-control" value="<?php echo $agt->status ?>" required>
								<?= form_error('status_agt', '<small class="text-danger pl-2">', '</small>'); ?>
							</div>
							<Button class="btn btn-primary">Simpan</Button>
							<a href="<?php echo base_url() . 'Data/anggota'; ?>" class="btn btn-danger">Batal</a>
						</form>
					<?php } ?>

				</div>
			</div>
		</div>
	</section>
</div>