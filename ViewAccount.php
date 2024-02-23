<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Account page</title>
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
			   <div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			               <?php
								if($con)
								 {
								 $sql="select * from account";
									$recordfound=mysql_query($sql,$con);
									if(mysql_affected_rows($con))
									{
									echo "<table border='1'>";
									echo"<tr> <th>User ID</th><th>User Name</th> <th>Password</th><th>Role</th><th>Status</th></tr>";
									while($row=mysql_fetch_assoc($recordfound))
									echo "<tr> <td>". $row["userid"]."</td><td>".$row["username"]."</td><td>".$row["password"]."</td>
									<td>". $row["role"]."</td><td>". $row["status"]."</td></tr>";
									echo "</table>";
									
									}
									     else
									     echo "No records found!";
									   }
								else
								echo"connection failed";
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
