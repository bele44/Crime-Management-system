<?php
$server="localhost";
$dbuser="root";
$dbpass="";
$dbname="crimerecordsystem";
$con=mysqli_connect($server,$dbuser,$dbpass) or die(mysql_error($con));
mysqli_select_db($con, $dbname) or die(mysql_error($con));
?>