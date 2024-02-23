
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
				<div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			   		<br>
				
		 <?php
	      if($con)
	        { 
	         if(isset($_GET['placement_No']))
	        {
   			$placement_No=$_GET['placement_No'];
			$sql="select * from placement where placement_No='$placement_No'";  
			 $recordfound=mysqli_query($con,$sql);
			while($row=mysqli_fetch_assoc($recordfound))
			{
			?>
				<fieldset>
				   <form action="" method="post" enctype="multipart/form-data">
				    <table>
					 <tr><td colspan="2"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u>Update placement </u></h2></td></tr>
						<tr><td> Kebele :</td><td><input type="text" name="kebele" value="<?php echo $row["kebele"] ?>"</td></tr>	    
						<tr><td>  Date:</td><td><input type="date" name="date" value="<?php echo $row["date"] ?>"</td></tr>	
						<tr><td> User Status:</td><td><select name="status">
									         	<option selected="selected" value="<?php echo $row["status"]?>"><?php echo $row["status"]?></option>
									         	<option value="unseen">unseen</option>
									         	<option value="Accepted">Accepted</option></select></td></tr>
						<tr><td>&nbsp;&nbsp;</td><td> <input type="submit" value="Update" name="Update"></td></tr>
					</table>
				  </form>
				</fieldset>
						<?php
					}
				}
				}
			?>
			  		<?php
					  if(isset($_POST['Update']))
						{	
						$Kebele=$_POST["kebele"];
						$date=$_POST["date"];
						$status=$_POST["status"];
							if($con)
								{
								$sql="update placement set kebele='$Kebele',date='$date',status='$status' 
								where placement_No='$placement_No'";
								$updated=mysqli_query($con,$sql);
									if ($updated)
									{
										$x='<script type="text/javascript">alert(" sucessfully updated!!");
										window.location=\'ViewPolicePlacement.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("Failed to update!!!");
										window.location=\'ViewPolicePlacement.php\';</script>';
										echo $x;
									}
							}
							else
							die("Connection Failed:");	
							}
						?>
				 </div>
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
