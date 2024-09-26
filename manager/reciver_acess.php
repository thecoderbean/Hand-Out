<?php
	session_start();
    if (!isset($_SESSION['manager']) && $_SESSION['manager'] !== false) {
		header('location: ../login.php');
		exit;
	}
        require_once '../config/config.php';   
        $id = $_POST['id'];
        $acess = $_POST['acess'];
        $sql ="UPDATE receiver SET approve ='$acess' WHERE id='$id'";
		$res = mysqli_query($mysql_db, $sql);
		if($res){
			$smsg = "Approved";
            header('location: approve.php');
		}else{
			$fmsg = "Approval failed";
            header('location: approve.php');
		}

?>