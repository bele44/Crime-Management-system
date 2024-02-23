
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
             	 	<img src="images/nn.jpg" width="80px"height="160px">
             	 <img src="images/aa.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

                <img src="images/a.jpg" width="140px"height="160px">
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
              			<h1>Police head task</h1>
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

                   if(isset($_GET['NMP']))
	                  {
   							$NMP=$_GET['NMP'];
							$sql="select * from nominationmissingperson where NMP='$NMP'";  							                         						
								$recordfound=mysqli_query($con,$sql);
								while($row=mysqli_fetch_assoc($recordfound))
									{
										$kebele=$row["kebele"];
									
									?>
									<?php 
														$PRID=mysqli_query($con,"select * from placement where kebele='$kebele'");
														$row2=mysqli_fetch_assoc($PRID);
														 
															?>
			   	<fieldset><table>
				<form action="" method="post" enctype="multipart/form-data">
				<tr><td colspan="2"><h2 style="font-size:25px;text-align:center;color:#2572da;"><u>Assign police for missing person</u></h2></td></tr>
				<tr><td>  Preventive Police ID:</td><td><input type="text" name="policeid" value="<?php echo $row2["Police_id"]?>" readonly="true"></td></tr> 
				<tr><td>  NomMis_Person ID:</td><td><input type="text" name="NMP" value="<?php echo $row["NMP"]?>"readonly="true" ></td></tr>
				<tr><td>  Mis_Person ID:</td><td><input type="text" name="MP" value="<?php echo $row["MP_ID"]?>"readonly="true" ></td></tr>
				<tr><td>  Zone:</td><td><input type="text" name="zone" value="<?php echo $row["zone"]?>" readonly></td></tr>
				<tr><td>  Woreda:</td><td><input type="text" name="wereda" value="<?php echo $row["woreda"]?>" readonly></td></tr>
				<tr><td>  Kebele:</td><td><input type="text" name="kebele" value="<?php echo $row["kebele"]?>"readonly ></td></tr>
				<tr><td>  Village:</td><td><input type="text" name="village" value="<?php echo $row["village"]?>" readonly></td></tr>
				<tr><td>  Date:</td><td><input type="text" name="date" value="<?php echo $row["date"]?>" readonly></td>
				<tr><td>  Description:</td><td><textarea name="description" rows="8" cols="25" ></textarea></td></tr>
				<tr><td>&nbsp;</td><td> <input type="submit" value="Send" name="Update"><input type="reset"value="Reset" name="Update"></td><tr>
				</form></table>
				<?php
				}
				}
				}
			?>
			  		<?php
					  if(isset($_POST['Update']))
						{
						$policeid=($_POST["policeid"]);	
						$NMP=($_POST["NMP"]);
						$MP=($_POST["MP"]);
						$zone=($_POST["zone"]);
						$woreda=($_POST["wereda"]);
						$kebele=($_POST["kebele"]);
						$village=($_POST["village"]);
						$date=($_POST["date"]);
						$description=($_POST["description"]);
						
						
							if($con)
								{
								$sql="update nominationmissingperson set zone='$zone',woreda='$woreda',kebele='$kebele',village='$village',
								date='$date',status='send',status2='$policeid',description='$description'
								where NMP='$NMP'";
								$updated=mysqli_query($con,$sql);
									if ($updated)
									{
										$x='<script type="text/javascript">alert("You assign police sucessfully !");
										window.location=\'viewnominationmisingcriminal.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("Failed to Assign!!!");
										window.location=\'viewnominationmisingcriminal.php\';</script>';
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
