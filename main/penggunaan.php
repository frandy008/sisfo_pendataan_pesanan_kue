<?php  
include 'koneksi.php';
$tbl = 'tbl_penggunaan';
$k = 'kode_penggunaan';

if (isset($_GET['m'])) {
	if ($_GET['m'] == 'add') {
		$m = 'menambahkan';
		$sdbb = mysqli_query($conn,"SELECT * FROM tbl_bahan_baku");
		while ($dbb = mysqli_fetch_assoc($sdbb)) {
			$jumlah = $_POST['kode_bahan_baku'][$dbb['kode_bahan_baku']];
			$cek = mysqli_query($conn,"SELECT * FROM $tbl WHERE kode_bahan_baku = '$dbb[kode_bahan_baku]' AND kode_pesanan = '$_POST[kode_pesanan]'");
			if (mysqli_num_rows($cek) > 0) {
				$q = mysqli_query($conn,"UPDATE $tbl SET jumlah = '$jumlah' WHERE kode_bahan_baku = '$dbb[kode_bahan_baku]' AND kode_pesanan = '$_POST[kode_pesanan]'");
			}else{
        if ($jumlah != '' OR $jumlah != 0) {
          $q = mysqli_query($conn,"INSERT INTO $tbl(kode_pesanan,kode_bahan_baku,jumlah) VALUES('$_POST[kode_pesanan]','$dbb[kode_bahan_baku]','$jumlah')");
        }
			}
		}
	}elseif ($_GET['m'] == 'update') {
		$m = 'memperbarui';
		$sdbb = mysqli_query($conn,"SELECT * FROM tbl_bahan_baku");
		while ($dbb = mysqli_fetch_assoc($sdbb)) {
			$jumlah = $_POST['kode_bahan_baku'][$dbb['kode_bahan_baku']];
			$q = mysqli_query($conn,"UPDATE $tbl SET jumlah = '$jumlah' WHERE kode_bahan_baku = '$dbb[kode_bahan_baku]' AND kode_pesanan = '$_POST[kode_pesanan]'");	
		}
	}elseif ($_GET['m'] == 'delete') {
		$m = 'menghapus';
		$q = mysqli_query($conn,"DELETE FROM $tbl WHERE kode_pesanan = '$_POST[kode]'");		
	}
	if ($q) {
		echo json_encode(
			array(
				'response' => true,
				'message' => 'Berhasil '.$m.' data !' 
			)
		);
	}else{
		echo json_encode(
			array(
				'response' => false,
				'message' => 'Gagal '.$m.' data ! '.mysqli_error($conn) 
			)
		);
	}
}elseif (isset($_GET['s'])) {
	$q = mysqli_query($conn,"SELECT * FROM $tbl WHERE kode_pesanan = '$_POST[kode]'");
	if (mysqli_num_rows($q) > 0) {
		while ($data = mysqli_fetch_assoc($q)) {
			$d[] = $data;
		}
		echo json_encode(
			array(
				'response' => true,
				'data' => $d
			)
		);
	}else{
		echo json_encode(
			array(
				'response' => false,
				'message' => 'Tidak ada data !' 
			)
		);
	}

}elseif (isset($_GET['t'])) {
	$q = mysqli_query($conn,"SELECT * FROM $tbl p JOIN tbl_bahan_baku b ON b.kode_bahan_baku = p.kode_bahan_baku WHERE kode_pesanan = '$_POST[kode]'");
	while ($data = mysqli_fetch_assoc($q)) {
		$d[] = $data;
	}
	if (mysqli_num_rows($q) > 0) {
		echo json_encode(
			array(
				'response' => true,
				'data' => $d,
			)
		);
	}else{
		echo json_encode(
			array(
				'response' => false,
				'message' => 'Error : '.mysql_error($conn),
			)
		);
	}
}else{
	echo json_encode(
		array(
			'response' => true,
			'data' => 'Tidak ada data bosku !',
		)
	);
}
?>