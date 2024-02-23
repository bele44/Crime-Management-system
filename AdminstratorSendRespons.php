<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator page</title>
<link  href="css/adminmystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("adminheadermenu.php");
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
			    				require("adminstratorsidelink.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>

			           <div id="ContentCenter">
			           <?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$admin_id=$_SESSION['seid'];	
							if(isset($_GET["id"]))
							{
							$ids=$_GET['id'];
							$sq="select * from  accountrequest where Request_id='$ids'";
							$record=mysql_query($sq,$con);
							if($r=mysql_fetch_array($record))
							{
							$rid=$r["Request_id"];	
							$pid=$r["police_id"];	
							$cid=$r["complaint_id"];	
							}	
							}
							
							}
							?>
			    <br>
			   	<fieldset><table>
				<form action="" method="post">
					<tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color:#2f8ad5;"><u>Create Account For Complaint</u></h2></td></tr>
					<tr><td>  Sender ID:</td><td><input type="text" name="Adminstrator_id" value="<?php echo $_SESSION['seid']; ?>"
					          style="width: 400px;height: 30px;" readonly></td></tr>
					<tr><td>  Reciver ID:</td><td><input type="text" name="police_id" value="<?php echo $pid;?>"
					            style="width: 400px;height: 30px;" readonly="true"></td></tr>
					<tr><td>  Complaint ID:</td><td><input type="text" name="complaint_id" value="<?php echo $cid ;?>"
								style="width: 400px;height: 30px;" readonly></td></tr>
					<tr><td>  Complaint user name:</td><td><input type="text" name="username" placeholder="user name"
								style="width: 400px;height: 30px;" required></td></tr>
					<tr><td>  Complaint password:</td><td><input type="text" name="password" placeholder="password"
							 style="width: 400px;height: 30px;" required></td></tr>
					<tr><td>  User Role:</td><td><select name="role"style="width: 400px;height: 30px;" >
													<?php $role=array
													("Select Role","Adminstrator","PoliceHead","DetectiveOfficer","PreventivePolice",
													"HRManager","Complaint");
													foreach($role as $i) echo"<option value=$i>$i</option>";?>
													</select></td></tr>
					<tr><td> User Status:</td><td><select name="status"style="width: 400px;height: 30px;" required>
									         	<?php $status=array("SelectStatus","Active","Blocked");
									         	 foreach($status as $i)echo"<option value=$i>$i</option>";?></select></td></tr>
					<tr><td>&nbsp;&nbsp;</td><td> <input type="submit" value="Register" name="Register">
					<input type="reset" value="Reset"></td></tr>
					
				</form></table>
			  
			  		<?php
					  if(isset($_POST['Register']))
						{	
						$Adminstrator_id=($_POST["Adminstrator_id"]);
						$police_id=$_POST["police_id"];
						$complaint_id=$_POST["complaint_id"];
						$username=$_POST["username"];
						$password=$_POST["password"];
						$role=$_POST["role"];
						$status=$_POST["status"];
						$date=date("d/m/y");
						
						if($con)
						{
						
						$query="Insert into responsecomplaintaccount values(' ','$Adminstrator_id','$police_id','$username','$password','$date',
						'unseen')";
						$insert=mysql_query($query);
						$update=mysql_query("update accountrequest set status2='Responsed' where complaint_id='$complaint_id'");
						$sql1="Insert into account values('$complaint_id','$username','$password','$role','$status')";
						$insert1=mysql_query($sql1,$con);
							if ($insert && $insert1 && $update)
								{
								
								$x='<script type="text/javascript">alert("sucessfully create Account!");
										window.location=\'Admin_saved_Request.php\';</script>';
										echo $x;
								}
							else
								{
								$x='<script type="text/javascript">alert("Faild to create account!!");
								window.location=\'Admin_saved_Request.php\';</script>';
								echo $x;
								}
							
						}
						else
						die("Connection Failed:".mysql($con));	
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
