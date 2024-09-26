<?php
	// Initialize session
	session_start();
	if (!isset($_SESSION['manager']) && $_SESSION['manager'] !== false) {
		header('location: ../login.php');
		exit;
	}
 
// Include config file
require_once '../config/config.php';
 
// Define variables and initialize with empty values    
$new_password = $confirm_password = '';
$new_password_err = $confirm_password_err = '';
 
// Processing form data when form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    // Validate new password
    if(empty(trim($_POST['new_password']))){
        $new_password_err = 'Please enter the new password.';     
    } elseif(strlen(trim($_POST['new_password'])) < 6){
        $new_password_err = 'Password must have atleast 6 characters.';
    } else{
        $new_password = trim($_POST['new_password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST['confirm_password']))){
        $confirm_password_err = 'Please confirm the password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = 'Password did not match.';
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = 'UPDATE users SET password = ? WHERE id = ?';
        
        if($stmt = $mysql_db->prepare($sql)){
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $mysql_db->close();
    }
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
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
      <li><a href="welcome.php">Home</a></li>
      <li><a href="approve.php">Approve Reciver</a></li>
      <li><a href="add_delivery.php">Add Delivery</a></li>
      <li><a href="food.php">Assign Food</a></li>
	  <li><a href="assign_donation.php">Assign Donation</a></li>
	  <li class="active"><a href="password_reset.php">Reset Password</a></li>
	  <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
    <main class="container wrapper">
        <section>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-primary" value="Submit">
                    <a class="btn btn-block btn-danger" href="welcome.php">Cancel</a>
                </div>
            </form>
        </section>
    </main>    
</body>

</html>