<?php
	session_start();
    if (!isset($_SESSION['manager']) && $_SESSION['manager'] !== false) {
		header('location: ../login.php');
		exit;
	}
        require_once '../config/config.php';   
        $r_id = $_POST['r_id'];
        $id = $_POST['d_id'];
        $sql ="UPDATE donate SET to_id ='$r_id' WHERE id='$id'";
		$res = mysqli_query($mysql_db, $sql);
		if($res){
			$smsg = "Approved";
            header('location: assign_donation.php');
		}else{
			$fmsg = "Approval failed";
            header('location: assign_donation.php');
		}

?>