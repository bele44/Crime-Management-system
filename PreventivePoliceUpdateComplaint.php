
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Complain Account page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
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
				    require("PreventivePoliceMenu.php");
				   ?>        <!--end of headermenu -->
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
			    				require("PreventivePoliceSideMenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>

			           <div id="ContentCenter">
			           <br>
			           <?php
	                if($con)
	                   {

                   if(isset($_GET['complaint_id']))
	                  {
   							$complaint_id=$_GET['complaint_id'];
							$sql="select * from Registercomplaint where complaint_id='$complaint_id'";  							                         						
								$recordfound=mysqli_query($con,$sql);
								while($row=mysqli_fetch_assoc($recordfound))
									{
									?>
			   	<fieldset><table>
				<form action="" method="post" enctype="multipart/form-data">
					<tr><td colspan="2"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u>Update Complaint form</u></h2></td></tr>
						<tr><td>  Complaint ID:</td><td><input type="text" name="complaint_id" value="<?php echo $row["complaint_id"] ?>"
									readonly="true" ></td>
							    <td> Education Status:</td><td><input type="text" name="educationlevel" value="<?php echo $row["educationlevel"] ?>">
							    	</td></tr>
						<tr><td>  First Name:</td><td><input type="text" name="firstname" value="<?php echo $row["firstname"] ?>"</td>
								<td>  Type of Job:</td><td><input type="text" name="job" value="<?php echo $row["job"] ?>"></td></tr>
						<tr><td>  Father Name:</td><td><input type="text" name="fathername" value="<?php echo $row["fathername"] ?>"></td>
								<td>  Work Place:</td><td><input type="text" name="workplace" value="<?php echo $row["workplace"] ?>"></td></tr>
						<tr><td>  G.Father Name:</td><td><input type="text" name="gfathername" value="<?php echo $row["gfathername"] ?>"></td>
								<td>  Kebele:</td><td><input type="text" name="kebele" value="<?php echo $row["kebele"] ?>" ></td></tr>
						<tr><td>  Sex:</td><td><select name="sex">
										         	<?php $sex=array("--Select Sex--","Male","Female");
										         	 foreach($sex as $i)echo"<option value=$i>$i</option>";
										         	 ?>
									         	 </select></td>
							  <td> User Status:</td><td><select name="status" value="<?php echo $row["status"] ?>">
									         	<?php $status=array("--SelectStatus--","Active","Blocked");
									         	 foreach($status as $i)echo"<option value=$i>$i</option>";?></select></td></tr>
						<tr><td>  Age:</td><td><input type="number" name="age" value="<?php echo $row["age"] ?>"></td>
								<td>  Email:</td><td><input type="email" name="email" value="<?php echo $row["email"] ?>"></td>
						</tr>
						<tr><td>  Phone No:</td><td><input type="number" name="phoneno" value="<?php echo $row["phoneno"] ?>"></td>
							<td>Description:</td><td><textarea name="description" rows="8" cols="25" >
							</textarea></td></tr>	
						<tr><td>  Photo:</td><td><input type="file" name="photo" ></td>
						<td>&nbsp;&nbsp;</td><td> <input type="submit" value="Update" name="Update"></td></tr>
						</form></table>
						<?php
					}
				}
				}
			?>
			  		<?php
					  if(isset($_POST['Update']))
						{	
						$complaint_id=($_POST["complaint_id"]);
						$firstname=($_POST["firstname"]);
						$fathername=($_POST["fathername"]);
						$gfathername=($_POST["gfathername"]);
						$sex=($_POST["sex"]);
						$age=($_POST["age"]);
						$phoneno=($_POST["phoneno"]);
						$educationlevel=($_POST["educationlevel"]);
						$job=($_POST["job"]);
						$workplace=($_POST["workplace"]);
						$kebele=($_POST["kebele"]);
						$status=$_POST['status'];
						$email=$_POST['email'];
						$description=$_POST["description"];
						$photo=$_POST['photo'];
							if($con)
								{
								$sql="update Registercomplaint set firstname='$firstname',fathername='$fathername',gfathername='$gfathername'
								,sex='$sex',age='$age',phoneno='$phoneno',educationlevel='$educationlevel',job='$job',workplace='$workplace'
								,kebele='$kebele',status='$status',email='$email',photo='$photo',description='$description'
								where complaint_id='$complaint_id'";
								$updated=mysqli_query($con,$sql);
								
								
								
								$sql1="update employee set firstname='$firstname',fathername='$fathername',gfathername='$gfathername'
								,sex='$sex',age='$age',phoneno='$phoneno',educationlevel='$educationlevel',officeno='0',email='$email',
								status='$status',photo='$photo'where emp_id='$complaint_id'";
								$updated1=mysqli_query($con,$sql1);
								
								
									if ($updated && $updated1 )
									{
										$x='<script type="text/javascript">alert(" sucessfully updated!!");
										window.location=\'ViewRegisteredComplaint.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("Failed to update!!!");
										window.location=\'ViewRegisteredComplaint.php\';</script>';
										echo $x;
									}
							}
							else
							die("Connection Failed:");	
							}
						?>	
				</fieldset>	
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=200px height=200px> <br>";
							echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px> $fullname </font>";
								
							}
							?>

				             		
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
