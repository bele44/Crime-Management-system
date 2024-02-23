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
             	<img src="images/nn.jpg" width="80px"height="160px">
             	 <img src="images/aa.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

             	
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
		
?>
<form action="" method="post">																													
<a href="adminlogfileuseratwork.php"><font size="4px" color="#a04eb1">Users at working(&nbsp;<?php 
$count_item=mysql_query("select * from logfiletable where logout_time='still at work'" ) or die(mysql_error());
$count=mysql_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>									
<font size="3px">
<?php
$sql = "select * from logfiletable ORDER BY login_time DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from logfiletable ORDER BY login_time DESC")
or die(mysql_error());
$count = mysql_num_rows($query1);	
if ($count)
{
?>
<br><br>
<table border="1"cellpadding="0"cellspacing="0">
<tr><th>logfile_id</th><th>User_ID</th> <th>User_Name</th><th>User_Role</th><th>Login_time</th><th>Logout_time</th>
	<th> Start_time</th><th>Activity_type</th><th>Activities_performed</th><th>Ip_address</th><th>Date of user_Login</th></tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["lig_id"]; 							 
	//mysql_query("UPDATE notification SET status='unread'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["lig_id"]; ?></td>
<td><?php echo $row["userid"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["role"]; ?></td>
<td><?php echo $row["login_time"]; ?></td>
<td><?php echo $row["logout_time"]; ?></td>
<td><?php echo $row["start_time"]; ?></td>
<td><?php echo $row["activity_type"]; ?></td>
<td><?php echo $row["activity_performed"]; ?></td>
<td><?php echo $row["ip_address"]; ?></td>
<td><?php echo $row["date"]; ?></td>
</div>																			
<?php 
}
?>
</tr></table>
<br><br>
<?php
echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
}						
else
{ 
?>
<div class="alert alert-info"> <font size="3px">No body login to the system !</div>
<?php 
} 
?>
</form>		                
  <!-- /block -->
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			          	<img src="images/2.png" width="200px" height="250px"> 
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
