<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>HR manager page</title>
<link  href="css/hrmanagermystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('d-m-Y');
$activity_type="update employee";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];	
?>
<div id="wrapper">

      <table width="100%" cellspacing="0px">
        <tr>
           <td>  
             <div id="header">
		    	 <?php
			      require("header.php");
			     ?>       <!--end of header -->
     		 </div>
		   </td>
		  </tr>

         <tr>
           <td>
    		  <div id="headermenu">

			   	   <?php
				    require("HRmanagerMenu.php");
				    echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px>( $fullname )</font>";
				   ?>        
      		  </div> 
		  </td>
		</tr>
	  </table>	
	    
	 	<div id="maincontent">   
         <table width="100%"> 
          <tr>
             <td>      
             		 <div id="ContentLeft">
<?php
					echo"<img src=$photo width=200px height=200px> <br>";
					?> 
			  		  </div>	   
				    </td>
				   <td>
				   
			           <div id="ContentCenter">
			           <br>
			           <?php
						if(isset($_GET["ID"]))
						{	
						$emp_id=$_GET['ID'];
						$sql="select * from employee where emp_id='$emp_id'";
						$recordfound=mysqli_query($con,$sql);
							if($row=mysqli_fetch_assoc($recordfound))
							?>
							<fieldset style="height: 370px;"><form action='' method=post><table>
							<tr><td colspan="4"><u><font style="color: #4b8ed1;margin: auto;"><h2><center>Update Employee Form</center></h2>
							</font></u></td></tr>
							<tr><td>Employee ID:</td><td><input type="text" name="emp_id" value="<?php echo $row["emp_id"]?>" readonly></td>
							    <td>Phone No:</td><td><input type="text" name="phoneno" value="<?php echo $row["phoneno"]?>"></td></tr>
							<tr><td>First Name:</td><td><input type="text" name="firstname" value="<?php echo $row["firstname"]?>" ></td>
							<td>Education Level:</td><td><input type="text" name="educationlevel"value="<?php echo $row["educationlevel"]?>"></td></tr>
							<tr><td>Father Name:</td><td><input type="text" name="fathername" value="<?php echo $row["fathername"]?>"></td>
							    <td>Office Number:</td><td><input type="text" name="officeno" value="<?php echo $row["officeno"]?>"></td></tr>
							<tr><td>G.Father Name:</td><td><input type="text" name="gfathername" value="<?php echo $row["gfathername"]?>"></td>
								<td>Email:</td><td><input type="text" name="email" value="<?php echo $row["email"]?>" ></td></tr>
							<tr><td>Sex:</td><td><select name="sex">
									         	<option selected="selected" value="<?php echo $row["sex"]?>"><?php echo $row["sex"]?></option>
									         	<option value="Male">Male</option>
									         	<option value="Female">Female</option></select>
												</td>
								<td>User Status:</td><td><select name="status">
									         	<option selected="selected" value="<?php echo $row["status"]?>"><?php echo $row["status"]?></option>
									         	<option value="Active">Active</option>
									         	<option value="Blocked">Blocked</option></select>
								</td></tr>
							<tr><td>Age:</td><td><input type="text" name="age" value="<?php echo $row["age"]?>" ></td>
							<td><input type="submit" name="update" value="update"></td><td><input type="reset" value="reset"></td></tr>
						    </table></form>
							<?php
							}
							
						//UPDATE
							if(isset($_POST["update"]))
							{
							$emp_id=$_POST["emp_id"];
							$firstname=$_POST["firstname"];
							$fathername=$_POST["fathername"];
							$gfathername=$_POST["gfathername"];
							$sex=$_POST["sex"];
							$age=$_POST["age"];
							$phoneno=$_POST["phoneno"];
							$educationlevel=$_POST["educationlevel"];
							$officeno=$_POST["officeno"];
							$email=$_POST["email"];
							$status=$_POST["status"];
							
							$activity="HR manager update employee[HRmanager:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
							
							$sql="update employee set firstname='$firstname',fathername='$fathername',gfathername='$gfathername',sex='$sex'
							,age='$age',phoneno='$phoneno',educationlevel='$educationlevel',officeno='$officeno',email='$email'
							,status='$status' where emp_id='$emp_id'";
							$updated=mysqli_query($con,$sql);
							if($updated)
							{
								$x='<script type="text/javascript">alert("Employee is update sucessfully !");
								window.location=\'HRmanagerUpdateEmployee.php\';</script>';
								echo $x;
								
							}
							else
							{
							$x='<script type="text/javascript">alert("Sory you are not update successfully !");
								window.location=\'HRmanagerUpdateEmployee.php\';</script>';
								echo $x;	
							}
							
							}
						echo" </fieldset>";
						?>

 </div> 
			           </div>
			           
			           
			           
				   </td>
				   <td>
			          <div id="ContentRight">
				             
			          </div>
			       </td>
			</tr>
		 </table>
	   </div> 			   
	  
	     <div id="footer">
			<?php
			require("footer.php");
			?>
         </div>

	<!--end of main wrapper-->

</div>
<?php
}
?>
</body>
</html>
