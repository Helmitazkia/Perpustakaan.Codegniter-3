<!DOCTYPE html>
<html lang="en">

<head>

  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
    <div class="row">
      <div class="col-lg-12">

        <section class="content-header">

          <table class="table" border="4">
            <tr>
              <th>NO</th>
              <th>Kode Buku</th>
              <th>judul buku</th>
              <th>Pengarang Buku</th>
              <th>Penerbit Buku</th>
              <th>Tahun Buku</th>
              <th>Jumlah Buku</th>
              <th>Gambar</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($Buku as $book) : ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $book->kode_buku; ?></td>
                <td><?php echo $book->judul_buku; ?></td>
                <td><?php echo $book->pengarang_buku; ?></td>
                <td><?php echo $book->penerbit_buku; ?></td>
                <td><?php echo $book->tahun_buku; ?></td>
                <td><?php echo $book->jumlah_buku; ?></td>
                <td><img src=" <?= base_url('project/images/') . $book->image; ?>" width="80">
                </td>
              </tr>

              <?php $i++; ?>
            <?php endforeach; ?>
          </table>
      </div>
    </div>
  </div>






</body>

</html>