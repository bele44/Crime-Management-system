<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Traffic Officer page</title>
<link  href="css/trafficofficermystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("TrafficOfficeMenu.php");
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
              			<h1>Side Link</h1>
		   	   				 <?php
			    				require("TrafficOfficeSideMenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			   
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
