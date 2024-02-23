
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

                   if(isset($_GET['No_Id']))
	                  {
   							$No_Id=$_GET['No_Id'];
							$sql="select * from nomination where No_Id='$No_Id'";  							                         						
								$recordfound=mysql_query($sql,$con);
								while($row=mysql_fetch_assoc($recordfound))
									{
										$kebele=$row["kebele"];
									
									?>
									<?php 
														$PRID=mysql_query("select * from placement where kebele='$kebele'");
														$row2=mysql_fetch_assoc($PRID);
														 
															?>
			   	<fieldset><table>
				<form action="" method="post" enctype="multipart/form-data">
				<tr><td colspan="2"><h2 style="font-size:25px;text-align:center;color:#2572da;"><u>Assign police for criminal</u></h2></td></tr>
				<tr><td>  Preventive Police ID:</td><td><input type="text" name="policeid" value="<?php echo $row2["Police_id"];?>" readonly="true" 
															required="true" ></td></tr>
				<tr><td>  No_Id:</td><td><input type="text" name="No_Id" value="<?php echo $row["No_Id"]?>"readonly="true" ></td></tr>
				<tr><td>  firstname:</td><td><input type="text" name="firstname" value="<?php echo $row["firstname"]?>"readonly="true" ></td></tr>
				<tr><td>  fathername:</td><td><input type="text" name="fathername" value="<?php echo $row["fathername"]?>" readonly></td></tr>
				<tr><td>  types:</td><td><input type="text" name="types" value="<?php echo $row["types"]?>" readonly></td></tr>
				<tr><td>  kebele:</td><td><input type="text" name="kebele" value="<?php echo $row["kebele"]?>"readonly ></td></tr>
				<tr><td>  village:</td><td><input type="text" name="village" value="<?php echo $row["village"]?>" readonly></td></tr>
				<tr><td>  date:</td><td><input type="text" name="date" value="<?php echo $row["date"]?>" readonly></td>
				<tr><td>  description:</td><td><textarea name="description" rows="8" cols="25" ></textarea></td></tr>
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
						$No_Id=($_POST["No_Id"]);
						$firstname=($_POST["firstname"]);
						$fathername=($_POST["fathername"]);
						$types=($_POST["types"]);
						$kebele=($_POST["kebele"]);
						$village=($_POST["village"]);
						$date=($_POST["date"]);
						$description=($_POST["description"]);
						
						
							if($con)
								{
								$sql="update nomination set firstname='$firstname',fathername='$fathername',types='$types',kebele='$kebele',village='$village',
								date='$date',status='send',status2='$policeid',description='$description'
								where NMP='$NMP'";
								$updated=mysql_query($sql,$con);
									if ($updated)
									{
										$x='<script type="text/javascript">alert("You assign police sucessfully !");
										window.location=\'PoliceHeadViewNomination.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("Failed to Assign!!!");
										window.location=\'PoliceHeadViewNomination.php\';</script>';
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
