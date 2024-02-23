
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Police Head page</title>
<link  href="css/policeheadmystylesheet.css" rel="stylesheet" type="text/css"/>
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
$activity_type="police head view missing person";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
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
				    require("PoliceHeadMenu.php");
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
              			<h1>Police Head Task</h1>
		   	   				 <?php
			    				require("PoliceHeadSide.php");
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
$query = mysqli_query($con,"select * from misssingperson where status='lost'");
$count = mysqli_num_rows($query);
?>		
										
<a href="ViewmessingPerson.php"><i><font size="5px" color="#363ecf" style="text-decoration: none;"> Lost Criminal (&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<?php 
$count_item=mysqli_query($con,"select * from misssingperson where status='get'" );
$count=mysqli_num_rows($count_item);	
 ?>											
	<a href="ViewGetmissingperson.php"><i><font size="5px" color="#87798c">A person Get thier location(&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>
<font size="3px">

<br>						
<?php
$sql = "select * from misssingperson where status='lost'";
	$activity="police head view missing person[police head ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')"); 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);							
$query1 = mysqli_query($con,"select * from misssingperson where status='lost' ")
or die(mysqli_error());
	$count = mysqli_num_rows($query1);	
	if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0">
<tr>
<th>Persons_ID</th>
<th>Frist_Name</th>
<th>Father_Name</th>
<th>Sex</th>
<th>Age</th>
<th>Posting_Reason</th>
<th>Woreda</th>
<th>Kebele</th>
<th>Lostdate</th>
<th>Postdate</th>
<th>Status</th>
<th>photo</th>
<th>description</th>
<th colspan="2" align="center">Action</th>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["MP_Id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<td><?php echo $row["MP_Id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["sex"]; ?></td>
<td><?php echo $row["age"]; ?></td>
<td><?php echo $row["posting_type"]; ?></td>
<td><?php echo $row["wereda"]; ?></td>
<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["lostdate"]; ?></td>
<td><?php echo $row["postdate"]; ?></td>
<td><?php echo $row["status"]; ?></td>
<td><img src=<?php echo $row["photopath"]; ?> height='50' width='40'></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo '<a  href="policeheadupdatemissingperson.php?MP_Id='.$row['MP_Id'].'">Edit</a>';?></td>
</div>
											
<?php
 }
	?>
	</tr></table>
	<br>
	<?php
		//echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else{ ?>
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No  Criminal is Lost!</div>
								<?php } ?>
										
								</form>		
                               
                        <!-- /block -->
			   
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
