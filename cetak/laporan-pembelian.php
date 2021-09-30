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
      <h2>Laporan Pembelian Bahan Baku</h2>
      <h3>Pesanan : <?php echo $_GET['kode_pesanan'] ?></h3>
      <hr>
      <table width="100%" border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>Bahan Baku</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php  
          include '../main/koneksi.php';
          $no=1;
          $total=0;
          $q = mysqli_query($conn,"SELECT * FROM tbl_pembelian p JOIN tbl_bahan_baku b ON b.kode_bahan_baku = p.kode_bahan_baku WHERE kode_pesanan = '$_GET[kode_pesanan]'");
          while ($d = mysqli_fetch_assoc($q)) { 
          $total+=$d['total_harga'];
          ?>
          <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td><?php echo $d['nama_bahan_baku'] ?></td>
            <td align="center"><?php echo $d['jumlah'] ?></td>
            <td align="right">Rp.<?php echo number_format($d['harga']) ?></td>
            <td align="right">Rp.<?php echo number_format($d['total_harga']) ?></td>
          </tr>
          <?php }
          ?>
          <tr>
            <td colspan="4" align="center">Total Harga</td>
            <td align="right">Rp.<?php echo number_format($total) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </center>
</body>
</html>