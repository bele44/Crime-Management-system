<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin update Account page</title>
<link  href="css/adminmystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
//else
//{
?>
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
	<br>          
	<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">																				
<a href="adminUpdateAccount.php"><i class="icon-envelope-alt"><font size="4px" color="#a04eb1" style="margin-left: 30px;">
Total Number of account (&nbsp;<?php 
$sql ="select * from account";
$r=$con->query($sql);
//$count_item=mysql_query($con,"select * from account") or die(mysql_error());
$count=$r->num_rows;
echo"<font color='red'>".($count)."</font>"; ?>)</font></i></a>
<font size="3px">
?>							
<?php
//$query1 = mysql_query("select * from account ")
//or die(mysql_error());
?>
<?php
//$sql = "select * from account ";
	 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	///$rs = $pager->paginate();									
//$query1 = mysql_query("select * from account ")
//or die(mysql_error());
//		$count = mysql_num_rows($query1);	
	if ($count != '0')
		{
	 ?>
<br><br>
<table border='1' cellpadding="0" cellspacing="0" id="resultTable" style="margin-left: 30px;">
<tr> 
<th>User ID</th>
<th>User Name</th> 
<th>Password</th>
<th>Role</th>
<th>Status</th>
<th>Update</th>
</tr>
        <?php
while($row =$r->fetch_assoc())
{	
$id=$row["userid"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
	<td><?php echo $row["userid"]; ?></td>
	<td><?php echo $row["username"]; ?></td>
	<td><?php echo $row["password"]; ?></td>
	<td><?php echo $row["role"]; ?></td>
	<td><?php echo $row["status"]; ?></td>
	<td><a href="adminstratorUpdateAccount.php?userid=<?php echo $row['userid'];?>">Edit</a></td>
</div>
											
<?php
 }
	?>

	</tr></table>
	<br><br>
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
	<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  record to be saved!</div>
	<?php } ?>
	</form>		
                               
                        <!-- /block -->
						</div>
			    
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

?>
</body>
</html>
