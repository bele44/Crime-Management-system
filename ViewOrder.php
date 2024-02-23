
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>View Order page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
	$eid=$_SESSION['seid'];	
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('d-m-Y');
$activity_type="View order";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
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
				    require("PreventivePoliceMenu.php");
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
              		
		   	   				 <?php
			    				require("PreventivePoliceSideMenu.php");
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
<a href="saved_orderpreventivepolice.php"><font size="4px" color="#a04eb1">Accepted Order(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from orders where status='seen' && userid='$eid'" ) or die(mysqli_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='#d30a3d'>".($count)."</font>"; ?>)</font></a>									
<font size="3px">
<?php
$sql = "select * from orders where status='unseen' && userid='$eid'";
	 $activity="Preventive police view ordered by detective officer[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from orders where status='unseen' && userid='$eid'")
or die(mysqli_error());
$count = mysqli_num_rows($query1);	
if ($count != '0')
{
?>
<table border="1" cellpadding="0"cellspacing="0">
<tr>
<th>order_id</th>
<th>accuser_id</th>
 <th>police id</th>
 <th>Accuser_fname</th>
<th>Accuser_gfathername</th>
<th>Accuser_kebele</th>
 <th>accused Firstname</th>
 <th>accused fathername</th>
<th>accused G.fathername</th>
<th> Sex</th><th>kebele</th>
<th>Village</th>
<th>Crime commited dates</th>
<th>appointment dates</th>
<th>Crime commited dates</th>
<th>Crime_Type</th>
<th>Crime_Level</th>
<th>Description</th>
<th colspan=2>Action</th></tr>
        <?php



while($row = $rs->fetch_assoc())
{	
$id=$row["order_id"]; 							 
$accuseid=$row["accuser_id"];   
$query1=mysqli_query($con,"select * from accuser where accuser_id='$accuseid'");
while($row2= mysqli_fetch_assoc($query1))
{
$afirstname=$row2["firstname"];
$afathername=$row2["fathername"];
$agfathername=$row2["gfathername"];	
$kebele2=$row2["kebele"];
}	
	?>
<tr>
<td><?php echo $row["order_id"]; ?></td>
<td><?php echo $row["accuser_id"]; ?></td>
<td><?php echo $row["userid"]; ?></td>
<td><?php echo $afirstname ?></td>
<td><?php echo $afathername; ?></td>
<td><?php echo $agfathername; ?></td>
<td><?php echo $kebele2 ?></td>
<td><?php echo $row["accused_firstname"]; ?></td>
<td><?php echo $row["accused_fathername"]; ?></td>
<td><?php echo $row["accused_gfathername"]; ?></td>
<td><?php echo $row["sex"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["village"]; ?></td>
<td><?php echo $row["Crime_commited_dates"]; ?></td>
<td><?php echo $row["appointment_dates"]; ?></td>
<td><?php echo $row["crimetype"]; ?></td>
<td><?php echo $row["crimelevel"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo '<a  href="save_order_link_preventive_police.php?id='.$row['order_id'].'">Accept</a>';?></td>
<!--<td><?php echo '<a  href="preventivePoliceRejectOrder.php?id='.$row['order_id'].'">Reject</a>';?></td>-->
</div>																			
<?php 
}
?>
</tr></table>
<?php
//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
}						
else
{ 
?>
<div class="alert alert-info"> <font size="3px">No New Nomination found!</div>
<?php 
} 
?>
</form>		                
  <!-- /block -->
 					 </div>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			          	<img src="images/p5.jpg" width="200px" height="200px">
			    			<?php
							
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
