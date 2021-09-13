<!DOCTYPE html>
<html lang="en">
<head>
		
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

<div  class="content-wrapper">
<section class="content-header">
      <h1>
       <?= $title;  ?>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $title;  ?></li>
       
      </ol>
    </section>

	<section class="content-header">
    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>Add New Menu</button>
	<br>
	<br>
  <div class="row">
    <div class="col-lg-6">
        <!---Menampilkan inputan error-->
           <?= form_error('menu','<div class="alert alert-warning" role="alert">','</div>');?>
        <!---Menampilkan inputan Berhasil-->
           <?= $this->session->flashdata('message'); ?>
          <table class="table" border="4" >
            <tr>
                <th width="100px">NO</th>
                <th width="100px">ID</th>
                <th>MENU</th>
                <th width="80px">Reaksi</th>
            </tr>
          <?php $i = 1; ?>
              
          <?php  foreach ($Mahasiswa as $row ):?>
          <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row["id"] ?></td>
              <td><?php echo $row["menu"] ?></td>
              <td>
              <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
              <br>
              <br>
              <a href="#"class="btn btn-primary"><i class="fa fa-edit"></i></a>
              <br>
              </td>	
		     </tr>
        
        <?php $i++; ?> 
        <?php endforeach; ?>
        </table>

        </div>
  </div


			<!-- Modal Untuk Tambah Data -->
			<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h3 class="modal-title" id="myModalLabel">Form Input Menu</h3>
				</div>
				<div class="modal-body">
				<form method ="post" action ="<?php  echo base_url('Menu') ?>" >
						<?php echo form_open('Registration')?>
						<div class="form-group">
							<label for="menu" class="control-label">Menu:</label>
							<input type="text" class="form-control" name="menu" id="menu">
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
						<?php echo form_close()?>
					</div>
				</form>
			</div>
			</div>
		<!-- Akhir Modal Untuk Tambah Data -->
</div>


	
</body>
</html>
