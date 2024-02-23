<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator Update  Account page</title>
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
			     <br>
			      <?php
	                if($con)
	                   {

         if(isset($_GET['userid']))
	      {
					$userid=$_GET['userid'];
					$sql="select * from account where userid='$userid'";  							                         						
					$r=$con->query($sql);
				while($row=$r->fetch_assoc())
					{
					?>
		<fieldset style="width: 500px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;
		border-top-left-radius: 10px;border-top-right-radius: 10px; margin: auto;">
		<h2 align="center"><u>Update User Account</u></h2>
		<form action="" method="post">
		<table>
		<tr><td> User ID:</td><td><input type="text" name="userid" value="<?php echo $row["userid"];?>" ></td></tr>
	    <tr><td>User Name:</td><td><input type="text" name="username"  value="<?php echo $row["username"];?>"></td></tr>
      <tr><td>Password:</td><td><input type="password" name="password"  value="<?php echo $row["password"];?>"></td></tr>			
	  <tr><td>Role:</td><td><input type="text" name="role" value="<?php echo $row["role"];?>"></td></tr>
	  <tr><td> User Status:</td><td><select name="status">
									         	<option selected="selected" value="<?php echo $row["status"]?>"><?php echo $row["status"]?></option>
									         	<option value="Active">Active</option>
									         	<option value="Blocked">Blocked</option></select></tr>
		<tr><td></td><td><input type="submit" name="update" value="update" style="background:#1f618d; 
		color:white; font-size:20px">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset" style="background:#1f618d;color:white;
		 font-size:20px;">
		</td></tr> </table></form></fieldset>
		<?php
	}
	}
	}
		?>
	     
	    <?php
	     	if(isset($_POST["update"]))
	      {
		$userid=$_POST['userid'];
		$username=$_POST['username'];
	    $password=$_POST['password'];
	    $role=$_POST['role'];
	    $status=$_POST['status'];
	
       $sql="update account set username='$username',password='$password',role='$role',status='$status'where userid='$userid'";
		$updated=$con->query($sql);
		if($updated)
		{
			echo " one record updated  successfully!";
			header('location:adminUpdateAccount.php');
		}
			
		else
			echo "Unable to Update!";
	     }

?>
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