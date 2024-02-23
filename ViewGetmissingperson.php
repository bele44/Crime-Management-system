
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
              			<h1>Side Menu</h1>
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
										
<a href="ViewmessingPerson.php"><i><font size="5px" color="#87798c" style="text-decoration: none;"> Lost Criminal (&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<?php 
$count_item=mysqli_query($con,"select * from misssingperson where status='get'" );
$count=mysqli_num_rows($count_item);	
 ?>											
	<a href="ViewGetmissingperson.php"><i><font size="5px" color="#363ecf">A person Get thier location (&nbsp;<?php echo"<font color='#da240a'>".
	($count)."</font>"; ?>&nbsp;)</font></i></a>
<font size="3px">

<br>						
<?php
$sql = "select * from misssingperson where status='get'";
	 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 3, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $con->query($sql);									
$query1 = mysqli_query($con,"select * from misssingperson where status='get' ")
or die(mysqli_error());
	$count = mysqli_num_rows($query1);	
	if ($count != '0'){?>

<table border="1"cellpadding="0"cellspacing="0" id="resultTable">
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
								<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No Criminal are Get!</div>
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
