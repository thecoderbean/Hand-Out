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
    <style>
  /* style the pop up element */
  .pop-up {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  /* style the pop up content */
  .pop-up-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px black;
  }
</style>
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
    <?php
require_once "../config/config.php";
// get the current date and time
$now = date('Y-m-d H:i:s');
// select the food items that have not expired
$sql = "SELECT * FROM food WHERE use_by > '$now'";
$result = $mysql_db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row as a pop up
    while ($row = $result->fetch_assoc()) {
        ?>
<div class="pop-up">
  <div class="pop-up-content">
    <h3>Food available</h3>
    <p>Item name: <?php echo $row['item_name']; ?></p>
    <p>Item description: <?php echo $row['item_discription']; ?></p>
    <p>Pick up: <?php echo $row['pick_up']; ?></p>
    <p>Use by: <?php echo $row['use_by']; ?></p>
    <button class="close">Close</button>
  </div>
</div>
<script>
  // get the pop up element
  var popUp = document.querySelector(".pop-up");
  // get the close button
  var close = document.querySelector(".close");
  // add a click event listener to the close button
  close.addEventListener("click", function() {
    // hide the pop up element
    popUp.style.display = "none";
  });
</script>

<?php
    }
}
?>



    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Needs</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href=""></a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Needs</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Needs</h6>
                <h1>View Needs Of The Most Needy</h1>
            </div>
            <div class="row">
            <div class="container">
            <?php
require_once "../config/config.php";
// join the fav and donate tables on the d_id column
$sql = "SELECT fav.d_id, donate.name, donate.description, donate.status FROM fav INNER JOIN donate ON fav.d_id = donate.id WHERE fav.r_id = $id";
$result = $mysql_db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
    while ($row = $result->fetch_assoc()) {
        ?>
    <tr>
      <td><?php echo $row['d_id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['description']; ?></td>
      <td><?php echo $row['status']; ?></td>
    </tr>
    <?php
    }
}
    ?>
  </tbody>
</table>

				
</div>
            </div>

        </div>
    </div>
    <!-- Destination Start -->


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