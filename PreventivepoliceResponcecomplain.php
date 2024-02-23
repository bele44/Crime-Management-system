
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Complain page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
$eid=$_SESSION['seid'];
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
				    require("PreventivePoliceMenu.php");
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
$sql="select * from complainrequest where complaint_id='$complaint_id'";  							                         						
$recordfound=mysql_query($sql,$con);
while($row=mysql_fetch_assoc($recordfound))
{
?>
<fieldset style="margin: auto; width: 600px;"><table>
			<form action="" method="post" enctype="multipart/form-data">
			<tr><td colspan="2"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u>Complaint Response Form</u></h2></td></tr>
			<tr><td>  Complaint ID:</td><td><input type="text" name="complain_id" readonly  value="<?php echo $row["complaint_id"];?>"
					style="width:300px;height:35px;"></td></tr>
			<tr><td>  First Name:</td><td><input type="text" name="firstname"  readonly  value="<?php echo $row["firstname"];?>"
			            style="width:300px;height:35px;"></td></tr>
			<tr><td>  Father Name:</td><td><input type="text" name="fathername" readonly  value="<?php echo $row["fathername"];?>" 
			                        style="width:300px;height:35px;"></tr>
			<tr><td>G.Father Name:</td><td><input type="text" name="gfathername"  readonly value="<?php echo $row["gfathername"];?>"
			                style="width:300px;height:35px;"></td></tr>
		    <tr><td> type of complain:</td><td><input type="text" name="complaintype" readonly value="<?php echo $row["complaintype"];?>"
			                  style="width:300px;height:35px;"></td></tr>
			<tr><td>Requested date:</td><td><input type="text" name="requestdate"  value="<?php echo $row["date"];?>" 
			                  style="width:300px;height:35px;"></td></tr>
			<tr><td> Appointment date:</td><td><input type="date" name="app_date" style="width:300px;height:35px;"></td></tr>
			<tr><td>Description:</td><td><textarea name="description" rows="8" cols="25" id="dec"  
					            style="width:300px;height:60px;">
						</textarea></td></tr>	
					
			<tr><td>&nbsp;&nbsp;</td><td> <input type="submit" value="Send response" name="update"><input type="reset" value="Reset"></td></tr>
				</form></table>
		</fieldset>	
<?php
}
}
}
?>

<?php
if(isset($_POST["update"]))
{
	$complain_id=$_POST["complain_id"];
	$firstname=$_POST["firstname"];
	$fathername=$_POST["fathername"];
	$gfathername=$_POST["gfathername"];
	$complaintype=$_POST["complaintype"];
	$requestdate=$_POST["requestdate"];
	$app_date=$_POST["app_date"];
	$description=$_POST["description"];
	
	$sql="update complainrequest set firstname='$firstname',fathername='$fathername',gfathername='$gfathername',complaintype='$complaintype'
	,date='$requestdate',apointmentdate='$app_date',status='Responsed',description='$description'
	where complaint_id='$complain_id'";
	$updated=mysql_query($sql,$con);
if ($updated )
	{
		
	$x='<script type="text/javascript">alert("Response Sent sucessfully  !");
	window.location=\'Preventivepolicesavedcomplain.php\';</script>';
	echo $x;
	}
	else
   	{
		$x='<script type="text/javascript">alert("Response not sent!");
		window.location=\'Preventivepolicesavedcomplain.php\';</script>';
		echo $x;
	}
}

?>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
							echo"<img src=$photo width=200px height=200px> <br>";
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
