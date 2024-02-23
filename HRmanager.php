<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>HR manager page</title>
<link  href="css/hrmanagermystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
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
			     ?>       <!--end of header -->
     		 </div>
		   </td>
		  </tr>

         <tr>
           <td>
    		  <div id="headermenu">

			   	   <?php
				    require("HRmanagerMenu.php");
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
					 <img src="images/awe.jpg" width="200px" height="200px">
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			   
					   <h1 >HR MANAGER</h1>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
						
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
