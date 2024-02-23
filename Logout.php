 
<?php  
	  
session_start();
include("connection.php");
$logout_time=date("h:i:s");
$uid=$_SESSION['$uid'];
$work_date=date('Y-m-d');
//unset session 
unset($_SESSION['fullname']);
unset($_SESSION['sun']);
unset($_SESSION['spw']);
unset($_SESSION['srole']);

if( !isset($_SESSION['sun']) || !isset($_SESSION['spw'])||!isset($_SESSION['fullname'])||!isset($_SESSION['srole']))
{
$sql="update logfiletable  set logout_time='$logout_time' where userid='$uid' and date='$work_date' and logout_time='still at work' "; 
$updated=mysqli_query($con,$sql);
if($updated)
header("location:index.php");
else
echo" Make Error ".mysql_error();
}
?>  