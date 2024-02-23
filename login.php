
<?php
include("connection.php");
ob_start()
?>
  <html>
  <head>
  <title>
  	Login Page
  </title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 <script src="js/jquery-3.3.1.js" type="text/javascript"></script>
 <script src="js/login.js" type="text/javascript"></script>
  </head>
  <body>
   <table>
   <form action="" method="post">
   <tr><th><h1>Login <h1></th></tr>
    <img src="images/po.png" width="210px"height="95px" align="right">

	<tr><td><label>User Name:</label></td></tr>
	<tr><td><input type="text" name ="un" placeholder="Enter User Name" required
	 style="height:30px; width:180px;"></td></tr>
	<tr><td><label>Password:</label> <input type="password" name ="pass" required placeholder="*********" required
	 style="height:30px; width:180px;"></td></tr>
	 	<tr><td><label><div class="form-group">
        <p> Roles<sup style="color:red">*</sup><br>
            <select name="role" class="form-control">
                <option value="PreventivePolice">PreventivePolice</option>
                <option value="DetectiveOfficer">DetectiveOfficer</option>
                <option value="PoliceHead">PoliceHead</option>
                <option value="HRManager">HRManager</option>
                    <option value="Complaint">Complaint</option>
                        <option value="Adminstrator">Adminstrator</option>
            </select>
          </div></label>    
	 <style="height:30px; width:180px></td></tr>
	<tr><td><input type="submit"name="login"value="login" style="height:30px; width:80px;background-color:#c0cbcd">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="reset"value ="Reset"   style="height:30px; width:80px;background-color:#c0cbcd" a href="" style="height: 80px; width: 80px;">signup</a></td></tr>	
   </form>
   
   </table>
 	
<?php
/*function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}*/
	if(isset($_POST['login']))
{
$un=$_POST["un"];
$pass=$_POST["pass"];
$role=$_POST["role"];
$plaintext_password=$pass;
//$password=encryptpassword($plaintext_password);

	if($con)
	{
	$sql="select * from account where username='$un' and password='$pass'and role='$role'";
	$matchfound=mysqli_query($con, $sql);
$userexist=mysqli_num_rows($matchfound);
if($userexist>0)
{
		while($row=mysqli_fetch_assoc($matchfound))
		{
		//$username=$row['UName'];
		$userid=$row["userid"];
				$un=$row["username"];
				$pw=$row["password"];
				$role=$row["role"];
				$status=$row["status"];
				$pw_status=$row["password_status"];	
				$_SESSION['fullname']=$un;
		 }
	if($pw_status=="unchanged")
	{
	$_SESSION['userid']=$userid;
	$_SESSION['oldpassword']=$pass;
	header("location:change_password.php");			
	}
	else
	{
	$sqll="select * from employee where emp_id='$userid'";
	$matchfound1=mysqli_query($con,$sqll);
	$row1=mysqli_fetch_assoc($matchfound1);
	
	//session
	           $eid=$row1["emp_id"];
				$firstname=$row1["firstname"];
				$fathername=$row1["fathername"];
				$gfathername=$row1["gfathername"];
				$photo=$row1["photo"];
				$email=$row1["email"];
					$fullname=$firstname." ".$fathername;
					//$_SESSION['fullname']=$fullname;
					$_SESSION['sun']=$un;
					$_SESSION['spw']=$pw;
					$_SESSION['srole']=$role;
					$_SESSION['seid']=$eid;
					$_SESSION['sphoto']=$photo;
					$login_time = date("h:i:s");
					$_SESSION['login_time']=$login_time;
	
	                     if($role=="Adminstrator" &&  $status=="Active")
						  header("location:Adminstrator.php");
						else if($role=="PoliceHead" &&  $status=="Active")
						  header("location:PoliceHead.php");
						else if($role=="DetectiveOfficer" &&  $status=="Active")
						  header("location:DetectiveOfficer.php");
						else if($role=="PreventivePolice" &&  $status=="Active")
						  header("location:PreventivePolice.php");
						else if($role=="HRManager" &&  $status=="Active")
							header("location:HRManager.php");
						else if($role=="Complaint" &&  $status=="Active")
							header("location:Complaint.php");
					  }
	}
	else
	{
	$x='<script type="text/javascript">alert("Please Enter Correct Username and Password!");
							window.location=\'index.php\';</script>';
							echo $x;
	}
	}
	else
	echo "<div id=error>Connection Failed!!";		   
	}
	?>	
</body>
</html>