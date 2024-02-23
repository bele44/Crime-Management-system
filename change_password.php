
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
             		<img src="images/im.jpg" width="80px"height="160px">
             	 <img src="images/log.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

                <img src="images/f.jpg" width="140px"height="160px">
		    	 <?php
			      require("header.php");
			     ?>       
     		 </div>
		   </td>
		  </tr>

         <tr>
           <td>
    		  <div id="headermenu">
					<?php
				    require("headermenu.php");
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
				    require("homesidemenu.php");
				?> 

               </div>
              
			  		  </div>


   
				    </td>
				   <td>
				 
			           <div id="ContentCenter">
			           <div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			          <?php
//password encryption
function encryptpassword($password ) 
{
$cryptKey='qJB0rGtIn5UB1xG03efyCp';
$passwordEncoded= base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $password, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
return( $passwordEncoded );
}

?>
<br>
 <fieldset style="margin: auto; width: 500px;">
<form method="post" action="">
<table>
<tr><td colspan="2" style="color: #3575ca; margin: auto;"><u><font size="5px;">Change Your Password</font></u></td></tr><br>
<tr><td>Old Password:</td><td><input type="password" name="opw"  required   placeholder="Enter Old Password"/></td></tr>
<tr><td>New Password</td><td ><input type="password" name="npw" placeholder="Enter New Password" required /></td></tr>
<tr><td>Confrim Password::</td><td><input type="password" name="cpw"  placeholder=" Confrim New Password" required/></td></tr>
<tr><td><input type="submit" name="changepw" value="Change Password" ></td><td><input type="reset"  value="Cancel"></td></tr>
</table>
</form>  
<br><br>
<?php
if(isset($_POST["changepw"]))
{
$userid=$_SESSION['userid'];
$oldpw=$_POST["opw"];
//$oldencript=encryptpassword($oldpw);
$newpw=$_POST["npw"];	
$confrimpw=$_POST["cpw"];	
if(strlen($newpw)<=2)
echo "Password Length IS Must Be Between 1 and 2 Character";
elseif(strlen($newpw)>=10)
echo "Password Length IS Must Be Between 6 and 9 Character";
else
{
if($newpw==$confrimpw)
{
$old=mysqli_query($con,"select*from  account where userid='$userid'");
while($row=mysqli_fetch_array($old))
$oldpass=$row["password"];
if($oldpw==$oldpass)
{
//$newpassword=encryptpassword($newpw);
$sql="update account set password='$newpw',password_status='changed' where userid='$userid' and password='$oldpw'";
$updatepassword=mysqli_query($con,$sql);	
if($updatepassword)
{
$x='<script type="text/javascript">alert("Your Password Is Successfully Changed!!!!");window.location=\'index.php\';</script>';
echo $x;
}
else
echo"No Password Successfully Changed".mysql_error($con);
}
else
echo "Old Password Is Incorrect";
}
else
echo"New Password and Confrim Password is Not Match!!!";	
}
}
?>
<br>
</fieldset>
			           </div>
			          </div>  
				   </td>
				   <td>
			          <div id="ContentRight" style="margin-right: 10px;">
				   <img src="images/IMG_20180518_075910.jpg" style="width:220px; height:300px;">
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
