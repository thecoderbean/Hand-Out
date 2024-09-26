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
        <a href="welcome.php" class="btn btn-block btn-outline-danger">Back</a>
		<div class="container">
<?php
require_once "../config/config.php";
$id = $_SESSION['id'];
$sql = "SELECT * FROM donate WHERE d_id = '$id'";
$result = $mysql_db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
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
      <th>
      <form action="view_profile.php" method="post">
      <input type="hidden" name="id" value="<?php echo $row['to_id'];?>">
      <button  type="submit" class="btn btn-warning">Address</button>
      </form>
      </th>
      <td><?php echo $row['phone']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
    <form action="update_status.php" method="post">
    <select name="status" id="status">
    <option value="Dispached">Dispached</option>
    <option value="Delivered">Delivered</option>
    </select>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <button  type="submit" class="btn btn-warning">Update</button>
    </form></td>
     
  <?php  
    }
    }
    ?>	
      </tr>
     
  </tbody>
</table>
				
</div>
		</section>
	</main>
</body>
</html>