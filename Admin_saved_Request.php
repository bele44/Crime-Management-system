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
				    require("adminheadermenu.php");
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
<a href="Admin_saved_Request.php"><font size="5px" color="#a04eb1" style="margin-left: 30px;">
 Account that Needs Response(&nbsp;<?php 
$count_item=mysql_query("select * from accountrequest where status2='requested'" );
$count=mysql_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>
<font size="3px">


<?php
$sql = "select * from accountrequest where status2='requested' ORDER BY date DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from accountrequest where status2='requested' ORDER BY date DESC")
or die(mysql_error());
$count = mysql_num_rows($query1);	
if ($count != '0'){?>
<br><br>
<table border='1' cellpadding="0" cellspacing="0" id="resultTable" style="margin-left: 30px;">
<tr>
	<th>police_id</th>
	<th>complaint_id</th>
	<th>description</th>
	 <th>date</th>
<th colspan=2>Action</th></tr>
</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["Request_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<div class="post"  id="del<?php echo $id; ?>">
	<td><?php echo $row["police_id"]; ?></td>
	<td><?php echo $row["complaint_id"]; ?></td>
	<td><?php echo $row["description"]; ?></td>
	<td><?php echo $row["date"]; ?></td>
	<td><?php echo '<a  href="AdminstratorSendRespons.php? id='.$row['Request_id'].'">create account </a>';?></td>
</div>
											
<?php
 }
	?>
	</tr></table>
	<?php
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  record to be saved!</div>
								<?php } ?>
										
								</form>		
                               
                        <!-- /block -->
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
