<?php
	session_start();
    if (!isset($_SESSION['receiver']) && $_SESSION['receiver'] !== false) {
		header('location: ../login.php');
		exit;
	}
	
	if ($_SESSION['key'] == "0") {
		echo '<script>alert("Not Authorized")</script>';
	} else {
		require_once '../config/config.php';
		$r_id = $_POST['r_id'];
		$d_id = $_POST['d_id'];
		$user = $_POST['user'];

		// Check if the entry already exists
		$sql_check = "SELECT * FROM `request` WHERE `d_id` = '$d_id' AND `r_id` = '$r_id' AND `username` = '$user'";
		$result_check = mysqli_query($mysql_db, $sql_check);
		$count_check = mysqli_num_rows($result_check);

		if ($count_check > 0) {
			echo '<script>alert("Duplicate entry! This request already exists.")</script>';
			header('location: view.php');
		} else {
			$sql = "INSERT INTO `request`(`r_id`, `username`, `d_id`) VALUES ('$r_id', '$user', '$d_id')";
			$res = mysqli_query($mysql_db, $sql);
			if ($res) {
				$smsg = "Approved";
				header('location: view.php');
			} else {
				$fmsg = "Approval failed";
				header('location: view.php');
			}
		}
	}
?>
