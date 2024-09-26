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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                    <p><i class="fa fa-envelope mr-2"></i>info@handout.com</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 7356135610</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-primary px-3" href="https://instagram.com/bestin_s_jorly?igshid=ZDc4ODBmNjlmNQ=="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-primary px-3" href="https://twitter.com/bestin_s_j?t=PhxUyV2tIvYxARQ49C1f8A&s=09">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-primary px-3" href="https://www.linkedin.com/in/bestin-s-j-791b07251">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-primary px-3" href="https://instagram.com/bestin_s_jorly?igshid=ZDc4ODBmNjlmNQ==">
                            <i class="fab fa-instagram"></i>
                        </a>
                        
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
                <h1 class="m-0 text-primary"><span class="text-dark">HAND</span>OUT</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="donate.php" class="nav-item nav-link active">Donate</a>
                        <a href="needs.php" class="nav-item nav-link">Needs</a>
                        <a href="login.php" class="nav-item nav-link">LogIn</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Donate</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Donate</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Food</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
  <!-- Booking Start -->
<form action="add_food.php" method="post" enctype="multipart/form-data" >
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                <div class="date" id="date2" >
                                        <input type="text" name="title" class="form-control p-4" placeholder="Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                <div class="date" id="date2" >
                                        <input type="text" name="discription" class="form-control p-4" placeholder="Discription" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                <div class="date" id="date2" >
                                        <input type="text"  name="address" class="form-control p-4" placeholder="Pickup Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="date" name="use_by" class="form-control p-4 datetimepicker-input" placeholder="Use By" data-target="#date1" data-toggle="datetimepicker" required>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;" type="submit" value="Upload Image">Submit form</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Packages Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">FOOD</h6>
                <h1>Donated food products are shown here</h1>
            </div>
            <div class="row">

                        <?php
            require_once "config/config.php";
            $sql = "SELECT * FROM `food`";
            $result = $mysql_db->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
            ?>


                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="img/package-1.jpg" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>Kollam</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i><?php echo $row['use_by']; ?></small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i><?php echo $row['from_username']; ?></small>
                            </div>
                            <a class="h5 text-decoration-none" href=""><?php echo $row['item_name']; ?></a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"></i><small><?php echo $row['item_discription']; ?></small></h6>
                                </div>
                            </div>
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
    <!-- Packages End -->



   

    <!-- Footer Start -->
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