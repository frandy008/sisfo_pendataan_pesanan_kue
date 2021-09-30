<?php  
include 'koneksi.php';
session_start();

$tbl = 'tbl_isi_pesanan';
$k = 'kode';

if (isset($_GET['m'])) {
	if ($_GET['m'] == 'add') {
		$m = 'menambahkan';
		$sdpp = mysqli_query($conn,"SELECT * FROM tbl_pesanan WHERE status = '0' ORDER BY kode_pesanan DESC");
		if (mysqli_num_rows($sdpp) > 0) {
			$dpp = mysqli_fetch_assoc($sdpp);
			$kode = $dpp['kode_pesanan'];
		}else{
			$kode = buat_kode();
			$tgl = date('Y-m-d');
			mysqli_query($conn,"INSERT INTO tbl_pesanan(kode_pesanan,tanggal) VALUES('$kode','$tgl')");
		}
		$sk = mysqli_query($conn,"SELECT * FROM $tbl WHERE kode_kue = '$_POST[kode_kue]' AND kode_pesanan = '$kode'");
		$kue = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tbl_kue WHERE kode_kue = '$_POST[kode_kue]'"));
		if (mysqli_num_rows($sk) > 0) {
			$dk = mysqli_fetch_assoc($sk);
			$jumlah_awal = $dk['jumlah'];
			$total_jumlah = $jumlah_awal+$_POST['jumlah'];
			$harga = $kue['harga']*$total_jumlah;
			$q = mysqli_query($conn,"UPDATE $tbl SET jumlah = '$total_jumlah', harga = '$harga' WHERE $k = '$dk[kode]'");
		}else{
			$harga = $kue['harga']*$_POST['jumlah'];
			$q = mysqli_query($conn,"INSERT INTO $tbl(kode_kue,jumlah,kode_pesanan,harga) VALUES('$_POST[kode_kue]','$_POST[jumlah]','$kode','$harga')");
		}
	}elseif ($_GET['m'] == 'update') {
		$m = 'memperbarui';
		//$q = mysqli_query($conn,"UPDATE $tbl SET nama_pelanggan = '$_POST[nama]', alamat = '$_POST[alamat]', no_hp = '$_POST[no_hp]' WHERE $k = '$_POST[kode]'");
	}elseif ($_GET['m'] == 'delete') {
		$m = 'menghapus';
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
	$q = mysqli_query($conn,"SELECT tbl_ikan.nama_ikan,tbl_ikan.harga,$tbl.jumlah,$tbl.kode_pembelian FROM $tbl,tbl_ikan WHERE kode_pembelian = '$_POST[kode]'");
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
}elseif (isset($_GET['t'])) {
	$q = mysqli_query($conn,"SELECT * FROM $tbl i JOIN tbl_kue k ON k.kode_kue = i.kode_kue WHERE kode_pesanan = '$_POST[kode]'");
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
}
else{
	$q = mysqli_query($conn,"SELECT * FROM tbl_pesanan WHERE status = '0'");
	if (mysqli_num_rows($q) > 0) {
		$d = mysqli_fetch_assoc($q);
		$isi_pesanan = mysqli_query($conn,"SELECT * FROM tbl_isi_pesanan kr JOIN tbl_kue k ON k.kode_kue = kr.kode_kue WHERE kode_pesanan = '$d[kode_pesanan]'");
		if (mysqli_num_rows($isi_pesanan) > 0) {
			while ($data = mysqli_fetch_assoc($isi_pesanan)) {
				$dat[] = $data;
			}
			echo json_encode(
				array(
					'response' => true,
					'data' => $dat,
					'kode_pesanan' => $d['kode_pesanan']
				)
			);
		}else{
			echo json_encode(
				array(
					'response' => false,
					'message' => 'Tidak ada data !',
					'kode_pesanan' => ''
				)
			);
		}
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
	$query = mysqli_query($conn, "SELECT max(kode_pesanan) as max_id FROM tbl_pesanan WHERE kode_pesanan LIKE '{$char}%' ORDER BY kode_pesanan DESC LIMIT 1");
	$data = mysqli_fetch_assoc($query);
	$getId = $data['max_id'];
	$no = substr($getId, -4, 4);
	$no = (int) $no;
	$no += 1;
	$newId = $char . sprintf("%04s", $no);
	return $newId;
}
?>