<?php
// Initialize the session

 
// Check if the user is logged in, if not then redirect to login page
session_start();
if (!isset($_SESSION['receiver']) && $_SESSION['receiver'] !== false) {
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
    <meta charset="utf-8">
    <title>HandOut Donation Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha384-qdQEsAI45WFCO5QwXBelBe1rR9Nwiss4rGEqiszC+9olH1ScrLrMQr1KmDR964uZ" crossorigin="anonymous">
    <style type="text/css">
        .wrapper{ 
            width: 500px; 
            padding: 20px; 
        }
        .wrapper h2 {text-align: center}
        .wrapper form .form-group span {color: red;}
    </style>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="m-0 text-primary"><span class="text-dark">HAND OUT</span>RECIVER</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="welcome.php" class="nav-item nav-link">Home</a>
                        <a href="view.php" class="nav-item nav-link">Donations</a>
                        <a href="need.php" class="nav-item nav-link">Need?</a>
                        <a href="account.php" class="nav-item nav-link">Account</a>
                        <a href="password_reset.php" class="nav-item nav-link  active">Password</a>
                        <a href="logout.php" class="nav-item nav-link">LogOut</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <main class="container wrapper">
        <section>
            <h2>Reset Password</h2>
            <p>Please fill out this form to reset your password.</p>
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
                    <a class="btn btn-block btn-link bg-light" href="welcome.php">Cancel</a>
                </div>
            </form>
        </section>
    </main> 
    <!-- Carousel End -->


  


    
    <!-- footer start -->
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Domain</a>. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Designed by <a href="mailto:bestin.s.jorly@gmail.com?subject=HandOut donation managemant system" target="_blank">bestin</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>