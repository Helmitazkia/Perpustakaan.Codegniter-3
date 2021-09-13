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
    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>Add New Sub Menu</button>
	<br>
	<br>
  <div class="row">
    <div class="col-lg-12">
        <?php if (validation_errors()):?>
            <div class="alert alert-warning" role="alert">
                <?= validation_errors(); ?>
            </div>
         <?php endif; ?>
        <!---Menampilkan inputan Berhasil-->
           <?= $this->session->flashdata('message'); ?>
          <table class="table" border="4" >
            <tr>
                <th width="70px">NO</th>
                <th width="70x">ID</th>
                <th>Menu</th>
                <th>Title</th>
                <th>Url</th>
                <th>Icon</th>
                <th>Is Active</th>
                <th width="80px">Reaksi</th>
            </tr>
          <?php $i = 1; ?>
          <!---$sm["menu_id"] Jadi $sm["menu"] -->
          <!---Karna Sudah di Join antara tabel user_sub_menu dengan tabel user_menu di model (m_mhs) -->  
          <!--Jadi yang tampil Berupa Hurup bukan angka lagi-->   
          <?php  foreach ($Submenu as $sm ):?>
          <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $sm["id"] ?></td>
              <td><?php echo $sm["menu"] ?></td>
              <td><?php echo $sm["title"] ?></td>
              <td><?php echo $sm["url"] ?></td>
              <td><?php echo $sm["icon"] ?></td>
              <td><?php echo $sm["is_active"] ?></td>
              <td>
              <a href="<?php  echo base_url('Menu/hapus_sub_menu/'.$sm['id']); ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
					<h3 class="modal-title" id="myModalLabel">Form Input sub Menu</h3>
				</div>
				<div class="modal-body">
				<form method ="post" action ="<?php  echo base_url('Menu/submenu') ?>" >
					<?php echo form_open('Registration')?>
						<div class="form-group">
							<label for="menu" class="control-label">Title:</label>
							<input type="text" class="form-control" name="title" id="title">
						</div>
                <div class="form-group">
                    <!--Membuat Combobox-->
                  <select name="menu_id" id="menu_id" class="form-control" >
                        <option value=""></option>
                        <?php foreach ($menu as $m):  ?>
                        <option value="<?= $m['id'];?>"><?= $m['menu'];?></option>
                        <?php  endforeach;  ?>
                  </select>
						</div>
              <div class="form-group">
							<label for="menu" class="control-label">url:</label>
							<input type="text" class="form-control" name="url" id="url">
						</div>
            <div class="form-group">
							<label for="menu" class="control-label">icon:</label>
							<input type="text" class="form-control" name="icon" id="icon">
						</div>
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value ="1" checked>
                    <label for="menu" class="form-check-label">is Active</label>
               </div>
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
