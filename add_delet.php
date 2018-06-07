<?php 
$connection = mysqli_connect("localhost", "root", "", "buronahodok");
mysqli_set_charset($connection,'utf8');


$result = mysqli_query($connection, "DELETE FROM ads WHERE id=".$_GET['id']);
	

header('location:myprofile.php');

?>