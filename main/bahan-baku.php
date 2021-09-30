<?php  
include 'koneksi.php';

$tbl = 'tbl_bahan_baku';
$k = 'kode_bahan_baku';
if (isset($_GET['m'])) {
	if ($_GET['m'] == 'add') {
		$q = mysqli_query($conn,"INSERT INTO $tbl(nama_bahan_baku) VALUES('$_POST[nama_bahan_baku]')");
		$m = 'menambahkan';
	}elseif ($_GET['m'] == 'update') {
		$q = mysqli_query($conn,"UPDATE $tbl SET nama_bahan_baku = '$_POST[nama_bahan_baku]' WHERE $k = '$_POST[kode]'");
		$m = 'memperbarui';
	}elseif ($_GET['m'] == 'delete') {
		$q = mysqli_query($conn,"DELETE FROM $tbl WHERE $k = '$_POST[kode]'");
		$m = 'menghapus';
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
	$q = mysqli_query($conn,"SELECT * FROM $tbl WHERE $k = '$_POST[kode]'");
	$data = mysqli_fetch_assoc($q);

	echo json_encode(
		array(
			'response' => true,
			'data' => $data 
		)
	);
}else{
	$q = mysqli_query($conn,"SELECT * FROM $tbl");
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
				'message' => 'Tidak ada data ! '.mysqli_error($conn) 
			)
		);
	}
}

function buat_kode(){
	include 'koneksi.php';
	$query = mysqli_query($conn, "SELECT max(kode_kue) as kodeTerbesar FROM tbl_kue");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 4, 3);
	$urutan++;
	$huruf = "KUE-";
	$kodeBarang = $huruf . sprintf("%03s", $urutan);
	return $kodeBarang;
}
?>