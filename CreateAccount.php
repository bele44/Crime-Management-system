<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Create Account page</title>
<link  href="css/adminmystylesheet.css" rel="stylesheet" type="text/css"/>
<script src="validation.js" type="text/javascript"></script>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}	
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
			 <br>
			  <fieldset>
				<table>
				  <form action="" method="post">
					<tr>
					<td colspan="2"><h2 style="font-size:25px;text-align: center;color: #2f8ad5;"><u>User Acount Form</u></h2></td></tr>
					<tr><td>  User ID:</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<td><select name="uid" id="user_id" style="width: 400px;height: 30px;">
									        	<?php
									        		$sql="select * from employee where status2='new'";
									        		$recored=mysqli_query($con,$sql);
									        		if($recored)
									        		{
														?>
									        		<option value=""></option>
									        		<?php
									        		while($row=mysqli_fetch_assoc($recored))
									        		{
									        			?>
									        		<option value="<?php echo $row['emp_id'];?>">
									        			<?php echo $row["emp_id"];?>
									        		</option>
									        		
														<?php
													}
									        		}
									        		?>
													
									        		
									        	</select></tr>
					 <script type="text/javascript">
				      	 var f1 = new LiveValidation('user_id');
					  	 f1.add(Validate.Presence,{failureMessage: "id number is not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter numbe only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  User Name:</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<td><input type="text" name="username" placeholder="Enter User name"style="width: 400px;height: 30px;" required></td></tr>
					<tr><td>  Password:</td><td><input type="password" name="password" placeholder="Enter password"style="width: 400px;height: 30px;" 
					required></td></tr>
					<tr><td>  User Role:</td><td><select name="role"style="width: 400px;height: 30px;" >
													<?php $role=array
													("Select Role","Adminstrator","PoliceHead","DetectiveOfficer","PreventivePolice",
													"HRManager","Complaint");
													foreach($role as $i) echo"<option value=$i>$i</option>";?>
													</select></td></tr>
					<tr><td> User Status:</td><td><select name="status"style="width: 400px;height: 30px;">
									         	<?php $status=array("SelectStatus","Active","Blocked");
									         	 foreach($status as $i)echo"<option value=$i>$i</option>";?></select></td></tr>
					<tr><td>&nbsp; </td><td><input type="submit" value="Register" name="Register">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Reset"></td></tr>
				 </form> 
				</table>
			  		<?php
					  if(isset($_POST['Register']))
						{	$uid=$_POST["uid"];
							$uname=$_POST['username'];
							$password=$_POST['password'];
	                        //$pw=encryptpassword($password);
							$role=$_POST['role'];
							$status=$_POST['status'];
							$change="unchanged";
						if($con)
						{
							if(strlen($password)>3)
							 
							{
						$query="Insert into account values('$uid','$uname','$password','$role','$status','$change')";
							$insert=$con->query($query);
							
							if($insert)
							{
							$sql="update employee set status2='hasaccount' where emp_id='$uid'";	
							$updated=mysqli_query($con,$sql);
								$x='<script type="text/javascript">alert("you sucessfully create account !!!");
									window.location=\'CreateAccount.php\';</script>';
									echo $x;
									}
								else
								{
								$x='<script type="text/javascript">alert("No Record inserted!! ");
									window.location=\'CreateAccount.php\';</script>';
									echo $x;	
								}
						}
						else
						echo"pleas enter passwored greater than 6 character:";
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
			          	<img src="images/2.png" width="200px" height="250px"> <br>
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];

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
