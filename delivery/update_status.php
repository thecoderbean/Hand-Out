<?php
	session_start();
    if (!isset($_SESSION['delivery']) && $_SESSION['delivery'] !== false) {
		header('location: ../login.php');
		exit;
	}
        require_once '../config/config.php';   
        $id = $_POST['id'];
        $status = $_POST['status'];
        $sql ="UPDATE donate SET status ='$status' WHERE id='$id'";
		$res = mysqli_query($mysql_db, $sql);
		if($res){
			$smsg = "Approved";
            header('location: welcome.php');
		}else{
			$fmsg = "Approval failed";
            header('location: welcome.php');
		}

?>