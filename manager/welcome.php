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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Income', 'Expenses'],
          ['2019',  1000,      400],
          ['2020',  1170,      460],
          ['2021',  660,       1120],
          ['2022',  1030,      540]
        ]);

        var options = {
          title: 'Weekly Revenue',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['count', 'usage', 'surf'],
          ['2019',  100,      40],
          ['2020',  17,      40],
          ['2021',  66,       10],
          ['2022',  30,      54]
        ]);

        var options = {
          title: 'System Usage',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart1'));

        chart.draw(data, options);
      }
    </script>
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
      <a class="navbar-brand" href="#">MANAGER</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="approve.php">Approve Reciver</a></li>
      <li><a href="add_delivery.php">Add Delivery</a></li>
      <li><a href="food.php">Assign Food</a></li>
	  <li><a href="assign_donation.php">Assign Donation</a></li>
	  <li><a href="password_reset.php">Reset Password</a></li>
	  <li><a href="logout.php">Sign Out</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">

					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart" style="width: 550px; height: 300px"></div>
						</div>

					</div>

					<div class="col-md-6">
						<div class="row">
							<div id="curve_chart1" style="width: 550px; height: 300px"></div>
						</div>

					</div>
</div>
</main>
</body>
</html>
