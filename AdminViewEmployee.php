<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>admin View Employee page</title>
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
	
	//Connect to mysql db
?>
<form action="" method="post">																				
<a href="AdminViewEmployee.php"><i class="icon-envelope-alt"><font size="4px" color="#a04eb1" style="margin-left: 30px;">
Total Number of Employee (&nbsp;<?php 
$count_item=mysqli_query($con,"select * from employee " ) or die(mysql_error());
$count=mysqli_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></i></a>
<font size="3px">							
<?php
$query1 = mysqli_query($con,"select * from employee ")
or die(mysqli_error());
?>
<?php
$sql = "select * from employee ";
	 
	//Create a PS_Pagination object
	//$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	//$rs = $pager->paginate();
	$rs=$con->query($sql);								
//$query1 = mysqli_query($con,"select * from employee ")
//or die(mysqli_error());
		$count = $rs->num_rows;
		if ($count != '0')
		{
	 ?>
<br><br>
<table border='1' cellpadding="0" cellspacing="0" id="resultTable">
<tr> <th>Emp_ID</th>
<th>FName</th> 
<th>FName</th>
<th>G.FName</th>
<th>Sex</th>
<th>Age</th>
<th>Phone No</th>
<th>Education Level</th>
<th>Office No</th>
<th>Email</th>
<th>Status</th>
<th>Photo</th>
</tr>
        <?php
while($row = $rs->fetch_assoc())
{	
$id=$row["emp_id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
	?>
<tr>
<div class="post"  id="del<?php echo $id; ?>">
<div class="post"  id="del<?php echo $id; ?>">
	<td><?php echo $row["emp_id"]; ?></td>
	<td><?php echo $row["firstname"]; ?></td>
	<td><?php echo $row["fathername"]; ?></td>
	<td><?php echo $row["gfathername"]; ?></td>
	<td><?php echo $row["sex"]; ?></td>
	<td><?php echo $row["age"]; ?></td>
	<td><?php echo $row["phoneno"]; ?></td>
	<td><?php echo $row["educationlevel"]; ?></td>
	<td><?php echo $row["officeno"]; ?></td>
	<td><?php echo $row["email"]; ?></td>
	<td><?php echo $row["status"]; ?></td>
	<td><img src=<?php echo $row["photo"]; ?> height='50' width='40'></td>
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
			          	<img src="images/admin.jpg" width="200px" height="250px"> <br>
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
	  
	     

	<!--end of main wrapper-->

</div>
<?php
}
?>
</body>
</html>
