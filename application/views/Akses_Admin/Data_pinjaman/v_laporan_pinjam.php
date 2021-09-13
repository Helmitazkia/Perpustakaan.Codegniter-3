<!DOCTYPE html>
<html><head>
    <title>Data Siswa</title>
</head><body>
    <h1 align="center"> Laporan Data Pinjaman</h1>
    <table align="center" border="1px">

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

            </tr>

            <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body></html>