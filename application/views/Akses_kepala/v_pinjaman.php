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
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $title;  ?></li>
       
      </ol>
    </section>
	<section class="content-header">
    <h1>
       <?= $title;  ?>
        <!--<small>Control panel</small>-->
      </h1>
        <!--tombol Pencarian-->      
        <div class="navbar-form navbar-right">
            <?php echo form_open('Data/Cari_pinjaman_buku'); ?>
                <input type="text" name="keyword" placeholder="search" class="form-control">
            <button type="submit"  class="btn btn-primary">Cari</button>
            <?php echo form_close() ?> 
        </div> 
        <br>
        <div class="row">
            <div class="col-lg-12">
            <!---Menampilkan error-->
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
                        <th width="70x">Kode Pinjaman</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal kembali</th>
                        <th>Total pinjam</th>
                        <th>kode anggota</th>   
                        <th>Kode buku</th>
                        <th>status</th>
                    </tr>
                <?php $i = 1; ?>   
                <?php  foreach ($Pinjam as $PJM ):?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $PJM->kode_pinjam; ?></td>
                    <td><?php echo $PJM->tanggal_minjam; ?></td>
                    <td><?php echo $PJM->tanggal_kembali; ?></td>
                    <td><?php echo $PJM->total_pinjam; ?></td>
                    <td><?php echo $PJM->kode_anggota; ?></td>
                    <td><?php echo $PJM->kode_buku; ?></td>
                    <td><?php echo $PJM->status; ?></td>
                    </tr>
                
                <?php $i++; ?> 
                <?php endforeach; ?>
                </table>

                    </div>
                </div>
    </section>
</div>


	
</body>
</html>
