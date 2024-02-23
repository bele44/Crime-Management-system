
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Police Head page</title>
<link  href="css/policeheadmystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("PoliceHeadMenu.php");
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
              			<h1>Side Menu</h1>
		   	   				 <?php
			    				require("PoliceHeadSide.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			 			<br>
			           <?php
	                if($con)
	                   {

                   if(isset($_GET['MP_Id']))
	                  {
   							$MP_Id=$_GET['MP_Id'];
							$sql="select * from misssingperson where MP_Id='$MP_Id'";  							                         						
								$recordfound=mysqli_query($con,$sql);
								while($row=mysqli_fetch_assoc($recordfound))
									{
										$photo='$row["photopath"]';
									?>
			   	<fieldset><table>
				<form action="" method="post" enctype="multipart/form-data">
				<tr><td colspan="4"><h2 style="font-size:25px;text-align:center;color:#2572da;"><u>Update Missing Criminal Status</u></h2></td></tr>
						<tr><td>  Persons ID:</td><td><input type="text" name="MP_Id" value="<?php echo $row["MP_Id"]?>"readonly="true" ></td>
									<td>  Woreda:</td><td><input type="text" name="wereda" value="<?php echo $row["wereda"]?>" readonly></td></tr>
						<tr><td>  First Name:</td><td><input type="text" name="firstname" value="<?php echo $row["firstname"]?>" readonly></td>
								<td>  Kebele:</td><td><input type="text" name="kebele" value="<?php echo $row["kebele"]?>"readonly ></td></tr>
						<tr><td>  Father Name:</td><td><input type="text" name="fathername" value="<?php echo $row["fathername"]?>"readonly></td>
								<td> Lost_date:</td><td><input type="text" name="lostdate" value="<?php echo $row["lostdate"]?>" readonly></td></tr>
						<tr><td>  Sex:</td><td><select name="sex">
										<option selected="selected" value="<?php echo $row["sex"] ?>"><?php echo $row["sex"]?></option>
									    <option value="male">Male</option><option value="female">Female</option></select></td>
								<td>  Post_date:</td><td><input type="text" name="postdate" value="<?php echo $row["postdate"]?>" readonly></td></tr>
						<tr><td>  Age:</td><td><input type="number" name="age" value="<?php echo $row["age"]?>" readonly></td>
								<td> User Status:</td><td><select name="status">
									         	<option selected="selected" value="<?php echo $row["status"]?>">Lost</option>
									         	<option value="get">Get</option></select></td></tr>
						<tr><td>Posting Reason:</td><td><input type="text" name="posting_type" value="<?php echo $row["posting_type"]?>" readonly></td>
							  <td>Description:</td><td><textarea name="description" rows="8" cols="25" ></textarea></td></tr>
						<tr><td>&nbsp;&nbsp;</td><td> <input type="submit" value="Update" name="Update">
						 <input type="reset" value="Reset" name="Update"></td>
						<td></td><td><input type="text" name="photo" value="<?php echo $row["photopath"]?>" hidden=""></td></tr>
						</form></table>
						<?php
					}
				}
				}
			?>
			  		<?php
					  if(isset($_POST['Update']))
						{	
						$MP_Id=($_POST["MP_Id"]);
						$firstname=($_POST["firstname"]);
						$fathername=($_POST["fathername"]);
						$sex=($_POST["sex"]);
						$age=($_POST["age"]);
						$posting_type=($_POST["posting_type"]);
						$wereda=($_POST["wereda"]);
						$kebele=($_POST["kebele"]);
						$lostdate=($_POST["lostdate"]);
						$postdate=($_POST["postdate"]);
						$status=($_POST["status"]);
						$photopath=$_POST["photo"];
						$description=$_POST["description"];
							if($con)
								{
								$sql="update misssingperson set firstname='$firstname',fathername='$fathername',sex='$sex',age='$age',
								posting_type='$posting_type',wereda='$wereda',kebele='$kebele',lostdate='$lostdate',postdate='$postdate'
								,status='$status',photopath='$photopath'
								where MP_Id='$MP_Id'";
								$updated=mysqli_query($con,$sql);
									if ($updated)
									{
										$x='<script type="text/javascript">alert(" sucessfully updated!!");
										window.location=\'ViewmessingPerson.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("Failed to update!!!");
										window.location=\'ViewmessingPerson.php\';</script>';
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
							echo"<img src=$photo width=210px height=200px> <br>";
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
