<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan</title>
  <style>
    .kertas{
      width: 594px;
    }
    h1,h2{
      margin-bottom:-15px;
    }
    h3{
      margin-bottom:0px;
    }
    hr{
      border: 2px solid black;
    }
    table{
      border: 2px solid black;
      border-collapse: collapse;
      font-size: 13px;
    }
    th,td{
      padding: 5px;
    }
  </style>
</head>
<body>
  <center>
    <div class="kertas">
      <h1>Mama Ela Cake Banggai Laut</h1>
      <h2>Laporan Pesanan</h2>
      <h3>Periode : <?php echo date('d-m-Y', strtotime($_GET['tgl_awal'])) ?> Sampai <?php echo date('d-m-Y', strtotime($_GET['tgl_akhir'])) ?></h3>
      <hr>
      <table width="100%" border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          include '../main/koneksi.php';
          $no=1;
          $q = mysqli_query($conn,"SELECT *,DATE_FORMAT(tanggal,'%d-%m-%Y') AS tanggal FROM tbl_pesanan WHERE status != '0' AND tanggal BETWEEN '$_GET[tgl_awal]' AND '$_GET[tgl_akhir]'");
          while ($d = mysqli_fetch_assoc($q)) { ?>
          <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td><?php echo $d['kode_pesanan'] ?></td>
            <td><?php echo $d['tanggal'] ?></td>
            <td><?php echo $d['nama'] ?></td>
            <td><?php echo $d['keterangan'] ?></td>
            <td>Rp.
              <?php
              $th = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(harga) AS total FROM tbl_isi_pesanan WHERE kode_pesanan = '$d[kode_pesanan]'"));
              echo number_format($th['total']);
              ?>
            </td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </center>
</body>
</html>