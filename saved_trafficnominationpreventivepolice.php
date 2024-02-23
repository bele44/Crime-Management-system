<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Traffic Police page</title>
<link  href="css/trafficepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("TrafficePoliceMenu.php");
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
			    				require("TrafficPoliceSideMenu.php");
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
<?php
$query = mysql_query("select * from trafficnomination where status='unseen' ORDER BY date DESC")
or die(mysql_error());
$coun = mysql_num_rows($query);
?>		
										
<a href="saved_trafficnominationpreventivepolice.php"><i class="icon-envelope-alt"><font size="4px" color="#a04eb1">Number of Records of nomination(&nbsp;<?php 
$count_item=mysql_query("select * from trafficnomination where status='seen'" ) or die(mysql_error());
$count=mysql_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></i></a>
<font size="3px">							
									<?php
$query1 = mysql_query("select * from trafficnomination where status='seen' ORDER BY date DESC")
or die(mysql_error());
?>

<?php
$sql = "select * from trafficnomination where status='seen' ORDER BY date DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from trafficnomination where status='seen' ORDER BY date DESC")
or die(mysql_error());
								$count = mysql_num_rows($query1);	
								if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0">
<tr>
<th>Nomin_id</th>
<th>First_Name</th> 
<th>Father_Name</th>
<th>crime_Type</th>
<th>kebele crime_occured</th>
<th>Street crime_occured</th>
<th> crime_commited date</th>
<th>photo</th>
<th>Description</th>
<th colspan=2>Action</th></tr>
</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["TrNo_Id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<td><?php echo $row["TrNo_Id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["types"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["street"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["photo"]; ?></td>
<td><?php echo $row["description"]; ?></td>
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

			          	<?php
			    			require("ProfileRightSide.php");
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
