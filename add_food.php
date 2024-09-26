<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
require_once 'config/config.php';
$item_name =$_POST['title'];
$item_discription = $_POST['discription'];
$pick_up = $_POST['address'];
$use_by = $_POST['use_by'];
$from_username = "ANONYMOUS";
$sql = "INSERT INTO food (item_name, item_discription, pick_up, use_by, from_username) VALUES ( '$item_name','$item_discription', '$pick_up', '$use_by', '$from_username')";
if ($mysql_db->query($sql)) {
    header('location: donate.php');
    exit;
}
?>