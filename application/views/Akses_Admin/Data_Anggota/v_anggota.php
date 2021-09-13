<html>

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
      <a href="<?php echo base_url() . 'Data/tambahanggota'; ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Add Book</a>
      <!--tombol Pencarian-->
      <div class="navbar-form navbar-right">
        <?php echo form_open('Data/Cari_anggota') ?>
        <input type="text" name="keyword" placeholder="search" class="form-control">
        <button type="submit" class="btn btn-primary">Cari</button>
        <?php echo form_close() ?>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-12">
          <!---Menampilkan inputan Berhasil-->
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
          <script>
            $(document).on('click', '.tombol-hapus', function(e) {
              e.preventDefault();
              const href = $(this).attr('href');
              Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data Anggota Akan di Hapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus!'
              }).then((result) => {
                if (result.value) {
                  document.location.href = href;

                }
              })


            });
          </script>

          <table class="table" border="4">
            <tr>
              <th>NO</th>
              <th width="70x">ID Anggota</th>
              <th>Nama</th>
              <th>Jenis kelamin</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Status</th>
              <th width="80px">Reaksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($Anggota as $agt) : ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $agt->id_anggota; ?></td>
                <td><?php echo $agt->nama; ?></td>
                <td><?php echo $agt->jenis_kel; ?></td>
                <td><?php echo $agt->email; ?></td>
                <td><?php echo $agt->telepon; ?></td>
                <td><?php echo $agt->alamat; ?></td>
                <td><?php echo $agt->status; ?></td>
                <td>
                  <a href="<?php echo base_url('Data/hapus_agt/' . $agt->id_anggota); ?>" class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                  <br>
                  <br>
                  <a href="<?php echo base_url('Data/edit_anggota/' . $agt->id_anggota); ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                  <br>
                </td>
              </tr>

              <?php $i++; ?>
            <?php endforeach; ?>
          </table>

        </div>
    </section>
  </div