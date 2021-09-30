<?php  
session_start();
include 'koneksi.php';
$tbl = 'tbl_users';
if (isset($_GET['m'])) {
	if ($_GET['m'] == 'login') {
		$pass = md5($_POST['password']);
		$q = mysqli_query($conn,"SELECT * FROM $tbl WHERE password = '$pass' AND username = '$_POST[username]'");
		if (mysqli_num_rows($q) > 0) {
			$data = mysqli_fetch_assoc($q);
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['username'] = $data['username'];
			$_SESSION['sisfo_kue'] = true;

			echo json_encode(
				array(
					'response' => true, 
				)
			);
		}else{
			echo json_encode(
				array(
					'response' => false,
					'message' => 'Kombinasi username dan password tidak sesuai ! '.mysqli_error($conn) 
				)
			);
		}

	}
}

?>