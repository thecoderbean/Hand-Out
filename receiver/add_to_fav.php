<?php
	session_start();
    if (!isset($_SESSION['receiver']) && $_SESSION['receiver'] !== false) {
		header('location: ../login.php');
		exit;
	}
        require_once '../config/config.php';   
        $d_id = $_POST['d_id'];
        $r_id = $_SESSION['id'];
        $sql ="INSERT INTO `fav`(`r_id`, `d_id`) VALUES ('$r_id','$d_id')";
		$res = mysqli_query($mysql_db, $sql);
		if($res){
			$smsg = "Approved";
            header('location: welcome.php');
		}else{
			$fmsg = "Approval failed";
            header('location: welcome.php');
		}

?>