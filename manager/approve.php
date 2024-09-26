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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head>
<body>
	<main>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><?php echo $_SESSION['username']; ?></a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="welcome.php">Home</a></li>
      <li  class="active"><a href="approve_reciver.php">Approve Reciver</a></li>
      <li><a href="add_delivery.php">Add Delivery</a></li>
      <li><a href="food.php">Assign Food</a></li>
	  <li><a href="assign_donation.php">Assign Donation</a></li>
	  <li><a href="password_reset.php">Reset Password</a></li>
	  <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<?php
require_once "../config/config.php";
$id = $_SESSION['id'];
$sql = "SELECT * FROM receiver ";
$result = $mysql_db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">user_name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
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
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
      <?php
      if($row['approve']== '1')
      {?>
     <form action="reciver_acess.php" method="post">
     <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
     <input type="hidden" name="acess" value="<?php echo"0"; ?>">
     <button  type="submit" class="btn btn-danger">Deactivate</button>
     </form>
     <?php
      }
      else
      {
        ?>
     <form action="reciver_acess.php" method="post">
     <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
     <input type="hidden" name="acess" value="<?php echo"1"; ?>">
     <button action="activate.php" type="submit" class="btn btn-success"> Activate </button>
     </form>
  <?php  
    }
      ?></td>
      <?php
    }
}
    ?>	
      </tr>
     
  </tbody>
</table>
				
</div>
</main>
</body>
</html>
