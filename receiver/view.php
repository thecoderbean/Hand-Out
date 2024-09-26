<?php
session_start();
if (!isset($_SESSION['receiver']) && $_SESSION['receiver'] !== false) {
    header('location: ../login.php');
    exit;
}
$id = $_SESSION['id'];
$user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HandOut Donation Management System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

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
                        <a href="favorites.php" class="nav-item nav-link">Favorites</a>
                        <a href="view.php" class="nav-item nav-link">Donations</a>
                        <a href="need.php" class="nav-item nav-link">Need?</a>
                        <a href="account.php" class="nav-item nav-link  active">Account</a>
                        <a href="password_reset.php" class="nav-item nav-link">Password</a>
                        <a href="logout.php" class="nav-item nav-link">LogOut</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Content Start -->
    
    

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6>Donations can only bee requested so you should wait for conformation</h6>
                <h1>Quality Assured.</h1>
            </div>
            <div class="row">
            <?php
            require_once "../config/config.php";
            $status="0";
            $sql = "SELECT * FROM donate WHERE donate.to_id = '$status'";
            $result = $mysql_db->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
while ($row = $result->fetch_assoc()) {
    ?>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo $row['thump']; ?>" alt="">
                            <div class="team-social">
                                <form action="add_to_fav.php" method="POST">
                                <input type="submit" class="btn btn-outline-primary" value="FAV">
                                <input type="hidden" name="d_id" value="<?php  echo $row['id'] ?>">
                                </form>
                                <form action="add_request.php" method="POST">
                                <input type="hidden" name="r_id" value="<?php echo $id; ?>">
                                <input type="hidden" name="d_id" value="<?php  echo $row['id'] ?>">
                                <input type="hidden" name="user" value="<?php  echo $user ?>">
                                <input type="submit" class="btn btn-outline-warning" value="REQUEST">
                                </form>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate"><?php echo $row['name']; ?></h5>
                            <p class="m-0"><?php echo $row['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
}
            }
            ?>
            </div>
        </div>
    </div>
   






    <!-- Team End -->
    <!-- Content End -->


  


    
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
