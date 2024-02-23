
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Complain Account page</title>
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
$activity_type="view notification";
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
			            <br>
			               <?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
?>
<form action="" method="post">																													
<a href="saved_complaintAccountpreventivepolice.php"><i></i><font size="4px" color="#a04eb1" style="margin-left: 10px;">Saved complaint Account(&nbsp;<?php 
$count_item=mysqli_query($con,"select * from responsecomplaintaccount where status='acceptresponse' && police_id='$eid'" ) or die(mysql_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></a>									
<font size="3px">
<?php
$sql = "select * from responsecomplaintaccount where status='unseen' && police_id='$eid' ORDER BY date DESC";
	 $activity="Preventive police view notification[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);								
$query1 = mysqli_query($con,"select * from responsecomplaintaccount where status='unseen' && police_id='$eid' ORDER BY date DESC")
or die(mysql_error());
$count = mysqli_num_rows($query1);	
if ($count != '0')
{
?>
<br><br><br>
<table border="1" cellpadding="0"cellspacing="0" style="margin-left: 10px;" >
<tr><th>Response_id</th><th>Adminstrator_id</th> <th>police_id</th><th>complaint username</th><th>complaint password</th><th>date</th><th colspan="2">
Action</th></tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["Response_id"]; 							 
	//mysql_query("UPDATE notification SET status='unread'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<td><?php echo $row["Response_id"]; ?></td>
<td><?php echo $row["adminstrator_id"]; ?></td>
<td><?php echo $row["police_id"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["password"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo '<a  href="save_Account_Response.php?id='.$row['Response_id'].'">Accept</a>';?></td>
</div>																			
<?php 
}
?>
</tr></table>
<br>
<?php
//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
}						
else
{ 
?>
<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New response found!</div>
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
