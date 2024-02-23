
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>home  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
</head>
<body>
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
				    require("headermenu.php");
				   ?>       <!--end of headermenu -->
      		  </div> 
		  </td>
		</tr>
	  </table>	
	    
	 	  <div id="maincontent">	   
         <table width="100%"> 
          <tr>
             <td>      
             		 <div id="ContentLeft">
              			<h1>Welcome To Home Page</h1>
		   	   				 <div id="login">
               <fieldset>
               <table>
               <form action="" method="post">
               <tr><th><h2 style="text-color:white;">Login form</h1></th></tr>
				<tr><td><label>User Name:</label><input type="text" name ="un" placeholder="Enter User Name" required></td></tr>
				<tr><td><label>Password:</label> <input type="password" name ="pass" required placeholder="Enter Password" ></td></tr>
				<tr><td><input type="submit"name="login"value="login" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="reset"value ="Reset" ></td></tr>
				
				<tr><td><p>Forget<a href="#">Password?</p></td></tr>	
               </form>
               </table>
        </fieldset>
  <?php
if(isset($_POST["login"]))
{
	
	$un=$_POST["un"];
	$pass=$_POST["pass"];
	
	if($con)
	{ 
	//account
		$sql="select * from account where username='$un' and password='$pass'";
		$matchfound=mysql_query($sql,$con);
if($row=mysql_fetch_assoc($matchfound))
{	
		$uid=$row["userid"];
		$un=$row["username"];
		$pw=$row["password"];
		$role=$row["role"];
		$status=$row["status"];
			if($role=="Adminstrator" &&  $status=="Active")
			  header("location:Adminstrator.php");
			  
			else if($role=="PoliceHead" &&  $status=="Active")
			  header("location:PoliceHead.php");
			  
			else if($role=="DetectiveOfficer" &&  $status=="Active")
			  header("location:DetectiveOfficer.php");
			  
			else if($role=="PreventivePolice" &&  $status=="Active")
			  header("location:PreventivePolice.php");
			  
			else if($role=="TrafficeOffice" &&  $status=="Active")
			   header("location:TrafficeOffice.php");
			   
			else if($role=="TrafficPolice" &&  $status=="Active")
				header("location:TrafficPolice.php");
			else if($role=="HRManager" &&  $status=="Active")
				header("location:HRManager.php");
				
			else
			{
			echo "<h5>you have role<h5>";
		    header("location:index.php");	
			}
}
else
{
echo "<h1>Invalid username or password<h1>";
//header("location:index.php");	
}
 }

}
?>

               </div>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">

				    <fieldset style="border-radius: 10px;background-color: #ffffff;height: auto; width: 1px;">
				<form action="" method="post">
				  <table border="0px" width="500px" >
					<tr>
					<td colspan="2"><h2 style="font-size:25px;text-align: center;">Give Commemet Here</h2></td></tr>
					<tr><td>  First Name:</td><td><input type="text" name="firstname" placeholder="Enter your first name" required></td></tr>
					<tr><td>  Father Name:</td><td><input type="text" name="fathername" placeholder="Enter your father name" required></td></tr>
					<tr><td>  Date:</td><td><input type="date" name="date" required></td></tr>
					<tr><td>  Email :</td><td><input type="email" name="email" placeholder="Enter your email" required></td></tr>
					<tr><td>Description:</td><td><textarea name="description" rows="8" cols="25" placeholder="Enter your comment......" required></textarea></td></tr>
					<tr><td>&nbsp; </td><td><input type="submit" value="send" name="send">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Reset"></td></tr>
				  </table>
				</form>
			  
			  		<?php
					  if(isset($_POST['send']))
						{	$firstname=$_POST["firstname"];
							$fathername=$_POST['fathername'];
							$date=$_POST['date'];
							$email=$_POST['email'];
							$description=$_POST['description'];
						if($con)
						{
							$query="Insert into comment values('$firstname','$fathername','$date','$email','$description')";
							$insert=mysql_query($query)or die(mysql_error());
							if($insert)
							echo "you sent the comment successfully !!!";
							else
							echo" failed to send the comment!! ";
							
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
				    require("time.php");
				   ?> 

			          </div>
			       </td>
			</tr>
		 </table>
			 </div> 			   

		<!-- footer--> 
	     <div id="footer">
 				<?php
				    require("footer.php");
				   ?>      

         </div>

	<!--end of main wrapper-->

</div>
</body>
</html>
