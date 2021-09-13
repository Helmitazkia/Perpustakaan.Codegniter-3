<?php
$tgl_pinjam = date('Y-m-d');
$tujuh_hari = mktime(0, 0, 0, date("n"), date("j") + 7, date("Y"));
$tgl_kembali = date('Y-m-d', $tujuh_hari);


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <!----link untuk sweet Alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <div class="content-wrapper">
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
      <a href="<?= base_url('Data/tambah_pinjaman_user') ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Add Pinjaman</a>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <?php if ($this->session->flashdata('message')) : ?>
            <script type="text/javascript">
              if (swal) {
                Swal.fire({
                  title: 'Data Berhasil',
                  text: "<?= $this->session->flashdata('message'); ?>",
                  icon: 'success'
                });
              }
            </script>
          <?php endif; ?>
          <table class="table" border="4">
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
            <?php foreach ($Pinjam as $PJM) : ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $PJM->kode_pinjam; ?></td>
                <td><?php echo $PJM->tanggal_minjam; ?></td>
                <td><?php echo $PJM->tanggal_kembali; ?></td>
                <td><?php echo $PJM->total_pinjam; ?></td>
                <td><?php echo $PJM->kode_anggota; ?></td>
                <td><?php echo $PJM->kode_buku; ?></td>
                <td><?php echo $PJM->status; ?></td>
                </td>
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