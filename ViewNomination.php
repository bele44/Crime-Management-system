
<?php
session_start();
include("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>View Nomination page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{

if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('d-m-Y');
$activity_type="view nomination";
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
			     ?>   
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
<?php
$query = mysqli_query($con,"select * from nomination WHERE status='unseen' ORDER BY date DESC")
or die(mysqli_error());
$count = mysqli_num_rows($query);
?>																				
<a href="saved_nominationpreventivepolice.php"><font size="5px" color="#a04eb1">Saved police assignment(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from nomination where status='seen'" ) or die(mysql_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>									
<font size="3px">
<?php
$sql = "select * from nomination where status='unseen' ORDER BY date DESC";
	 $activity="Preventive police View nomination[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from nomination where status='unseen' ORDER BY date DESC")
or die(mysqli_error());
$count = mysqli_num_rows($query1);	
if ($count != '0')
{
?>
<br><br>
<table border="1"cellpadding="0"cellspacing="0">
<tr><th>Nomin_id</th><th>First Name</th> <th>Father Name</th><th>Type of crime</th><th>kebele crime occured</th><th>village crime occured</th>
	<th> crime commited date</th><th>Description</th><th colspan=2>Action</th></tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["No_Id"]; 							 
	//mysql_query("UPDATE notification SET status='unread'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["No_Id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["types"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["village"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo '<a  href="save_nomination_link_preventive-police.php?id='.$row['No_Id'].'">Accept</a>';?></td>
</div>																			
<?php 
}
?>
</tr></table>
<br><br>
<?php
//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
}						
else
{ 
?>
<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Nomination found!</div>
<?php 
} 
?>
</form>		                
  <!-- /block -->
			                       	               
			              
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
