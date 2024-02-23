
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Complaint  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
<script src="validation.js" type="text/javascript"></script>
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
				    require("Complaintheadermenu.php");
				   ?>       <!--end of headermenu -->
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
				    require("Complaintsidemenu.php");
				?> 

               </div>
              
			  		  </div>
				    </td>
				   <td>
			<div id="ContentCenter" style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			 <br>
			 <?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
	
	//Connect to mysql db
?>
<form action="" method="post">	

<?php
$queryt = mysqli_query($con,"select * from complainrequest where status='Responsed'");
$countt = mysqli_num_rows($queryt);
?>
<a href="Viewpoliceresponse.php"><font size="5px" color="#363ecf" style="text-decoration: none;">Police Response (&nbsp;<?php echo"<font color='#da240a'>".($countt)."</font>"; ?>&nbsp;)</font></a>
<br>
						
<?php
$sql = "select * from complainrequest where status='Responsed'";
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from complainrequest where status='Responsed' ")
or die(mysql_error());
	$count = mysqli_num_rows($query1);	
	if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0">
<tr>
<th>complint_id</th>
<th>firstname</th>
<th>fathername</th>
<th>Gfathername</th>
<th>Complaint type</th>
<th>Date</th>
<th>Apointment Date</th>
<th>Status</th>
<th>Description</th>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["complaint_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<td><?php echo $row["complaint_id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["gfathername"]; ?></td>
<td><?php echo $row["complaintype"]; ?></td>
<td><?php echo $row["date"]; ?></td>
<td><?php echo $row["apointmentdate"]; ?></td>
<td><?php echo $row["status"]; ?></td>
<td><?php echo $row["description"]; ?></td>
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
			<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No Complain to be saved!</div>
			<?php } ?>
					
			</form>	
    <!-- /block -->
			   </div>
			            
				   </td>
				   <td>
			          <div id="ContentRight">
				  <img src="images/giv.gif.jpg" width="200px" height="200px">

			          </div>
			       </td>
			</tr>
		 </table>
			 </div> 			   

		<!-- footer--> 
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
