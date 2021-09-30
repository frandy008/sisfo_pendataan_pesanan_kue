<?php  
include 'koneksi.php';
session_start();

$tbl = 'tbl_pesanan';
$k = 'kode_pesanan';

if (isset($_GET['m'])) {
	if ($_GET['m'] == 'add') {
		$m = 'menambahkan';
		
	}elseif ($_GET['m'] == 'update') {
		$m = 'memperbarui';
		$q = mysqli_query($conn,"UPDATE $tbl SET nama = '$_POST[nama]', keterangan = '$_POST[keterangan]', status = '1' WHERE $k = '$_POST[kode]'");
	}elseif ($_GET['m'] == 'delete') {
		$m = 'menghapus';
		$sdk = mysqli_query($conn,"SELECT * FROM tbl_isi_pesanan WHERE $k = '$_POST[kode]'");
		if (mysqli_num_rows($sdk) > 0) {
			mysqli_query($conn,"DELETE FROM tbl_isi_pesanan WHERE $k = '$_POST[kode]'");
		}
		$q = mysqli_query($conn,"DELETE FROM $tbl WHERE $k = '$_POST[kode]'");
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
				'message' => 'Error: '.mysqli_error($conn) 
			)
		);
	}
}elseif (isset($_GET['s'])) {
	$q = mysqli_query($conn,"SELECT * FROM $tbl WHERE $k = '$_POST[kode]'");
	if (mysqli_num_rows($q) > 0) {
		$data = mysqli_fetch_assoc($q);
		echo json_encode(
			array(
				'response' => true,
				'data' => $data 
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
}else{
	$q = mysqli_query($conn,"SELECT *,DATE_FORMAT(tanggal,'%d-%m-%Y') AS tanggal FROM $tbl WHERE status != '0'");
	if (mysqli_num_rows($q) > 0) {
		while ($data = mysqli_fetch_assoc($q)) {
			$sk = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(harga) AS harga FROM tbl_isi_pesanan WHERE kode_pesanan = '$data[kode_pesanan]'"));
			$dat[] = $data;
			$harga[] = $sk;
		}
		echo json_encode(
			array(
				'response' => true,
				'data' => $dat,
				'harga' => $harga
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
	$today = date('ymd');
	$char = 'B' . $today;
	$query = mysqli_query($conn, "SELECT max(kode_pembelian) as max_id FROM tbl_pembelian WHERE kode_pembelian LIKE '{$char}%' ORDER BY kode_pembelian DESC LIMIT 1");
	$data = mysqli_fetch_assoc($query);
	$getId = $data['max_id'];
	$no = substr($getId, -4, 4);
	$no = (int) $no;
	$no += 1;
	$newId = $char . sprintf("%04s", $no);
	return $newId;
}
?>