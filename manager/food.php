<?php
	// Initialize session
	session_start();
	if (!isset($_SESSION['manager']) && $_SESSION['manager'] !== false) {
		header('location: ../login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<main>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $_SESSION['username']; ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="welcome.php  ">Home</a></li>
      <li><a href="approve.php">Approve Reciver</a></li>
      <li><a href="add_delivery.php">Add Delivery</a></li>
      <li class="active"><a href="food.php">Assign Food</a></li>
	  <li><a href="assign_donation.php">Assign Donation</a></li>
	  <li><a href="password_reset.php">Reset Password</a></li>
	  <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<div class="container">
<?php
require_once "../config/config.php";
$id = $_SESSION['id'];
$sql = "SELECT * FROM donate WHERE to_id='0' ";
$result = $mysql_db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Discription</th>
      <th scope="col">Email</th>
      <th scope="col">Give TO</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i=0;
while ($row = $result->fetch_assoc()) {
    $i=$i+1;
    ?>
    <tr>
      <th scope="row"><?php echo $i;?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
    <?php
    $d_id = $row['id'];
    $sq = "SELECT * FROM request WHERE d_id ='$d_id'";
    $resul = $mysql_db->query($sq);
    if ($resul->num_rows > 0) {
        // output data of each row
        while ($r = $resul->fetch_assoc()) {
            ?>
     <form action="give_product.php" method="post">
     <input type="hidden" name="r_id" value="<?php echo $r['r_id']; ?>">
     <input type="hidden" name="d_id" value="<?php echo $d_id;?>">
     <button  type="submit" class="btn btn-danger"><?php echo $r['username']; ?> </button>
     </form>
     
  <?php
        }
    }
}
      ?>
  </td>
      <?php
    }
    ?>	
      </tr>
     
  </tbody>
</table>
	
					
</div>
</main>
</body>
</html>
