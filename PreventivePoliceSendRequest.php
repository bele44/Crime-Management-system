
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Preventive Police page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
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
$activity_type="Send Request";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
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
			    echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px>( $fullname )</font>";
			     ?> 
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
			   	<fieldset><table>
				<form action="" method="post">
					<tr><td colspan="2"><h2 style="font-size:25px;text-align: center;color:#2f8ad5;"><u>Account Request Form</u></h2></td></tr>
					<tr><td>  Sender ID:</td><td><input type="text" name="police_id" value="<?php echo $_SESSION['seid'] ?>"readonly="true"></td></tr>
					<tr><td>  Complaint ID:</td><td>
				        	<select name="complaint_id" required="true">
				        	<?php
				        		$sql="select * from Registercomplaint where status='Active' && status2='new' ";
				        		$recored=mysqli_query($con,$sql);
				        		if($recored)
				        		{
									?>
				        		<option value=""></option>
				        		<?php
				        		while($row=mysqli_fetch_assoc($recored))
				        		{
				        			?>
				        		<option value="<?php echo $row['complaint_id'];?>">
				        			<?php echo $row["complaint_id"];?>
				        		</option>
				        		
									<?php
								}
				        		}
				        		?>
				        	</select>
				        </td></tr>
					<tr><td>Case to Request:</td><td><textarea name="description" rows="8" cols="25" placeholder="Enter your request ...." required>
					</textarea></td></tr>
					<tr><td>&nbsp;&nbsp;</td><td> <input type="submit" value="Register" name="Register">
					<input type="reset" value="Reset"></td></tr>
					
				</form></table>
			  
			  		<?php
					  if(isset($_POST['Register']))
						{
						$police_id=$_POST["police_id"];
						$complaint_id=$_POST["complaint_id"];
						$description=$_POST["description"];
						$date=date("d/m/y");
						if($con)
						{
						$activity="Preventive police Request account[Police ID:$uid,Name:$fullname]";
						$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
						'$start_time','$activity_type','$activity','$ipaddress','$work_date')");	
						$query="Insert into accountrequest values(' ','$police_id','$complaint_id','$description','$date','unseen','Requested')";
						$insert=mysqli_query($con,$query);
							if ($insert)
									{
									$update="update Registercomplaint set status2='requested' where complaint_id='$complaint_id'";
									mysqli_query($con,$update);
									$x='<script type="text/javascript">alert("Request Sent sucessfully !!");
									window.location=\'PreventivePoliceSendRequest.php\';</script>';
									echo $x;
									}
								else
								   {
									$x='<script type="text/javascript">alert("Faild to send the Request!");
									window.location=\'PreventivePoliceSendRequest.php\';</script>';
									echo $x;
									}
						}
						else
						die("Connection Failed:".mysqli($con));	
						}
						?>	
				</fieldset>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			          	<img src="images/p5.jpg" width="200px" height="200px">
			    		<?php
							
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
