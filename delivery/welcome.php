<?php
	// Initialize session
	session_start();

	if (!isset($_SESSION['delivery']) && $_SESSION['delivery'] !== false) {
		header('location: ../login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
	<style>
        .wrapper{ 
        	width: 500px; 
        	padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
	</style>
</head>
<body>
	<main>
		<section class="container wrapper">
			<div class="page-header">
				<h2 class="display-5">Welcome DELIVERY BOY  <?php echo $_SESSION['username']; ?></h2>
			</div>

			<a href="takeorder.php" class="btn btn-block btn-outline-success">Take Order</a>
			<a href="view_delivery.php" class="btn btn-block btn-outline-primary">View Deliver</a>
			<a href="delivered.php" class="btn btn-block btn-outline-dark">Delivered</a>
			<a href="password_reset.php" class="btn btn-block btn-outline-warning">Reset Password</a>
			<a href="logout.php" class="btn btn-block btn-outline-danger">Sign Out</a>
		</section>
	</main>
</body>
</html>