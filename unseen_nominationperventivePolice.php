
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
				    require("PreventivePoliceMenu.php");
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
			    				require("PreventivePoliceSideMenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
					<div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			           <div id="ContentCenter">
			           
			               <br>
<?php
	//Include the PS_Pagination id
		include('ps_pagination.php');
?>
<form action="" method="post">									
<?php
$query = mysql_query("select * from nomination where status='unseen' ORDER BY date DESC")
or die(mysql_error());
$coun = mysql_num_rows($query);
?>		
										
<a href="saved_nominationpreventivepolice.php"><i class="icon-envelope-alt"><font size="4px" color="#a04eb1">Saved nomination(&nbsp;<?php 
$count_item=mysql_query("select * from nomination where status='seen'" ) or die(mysql_error());
$count=mysql_num_rows($count_item);	
echo"<font color='red'>".($count)."</font>"; ?>)</font></i></a>
										
									<font size="3px">
<?php
$sql = "select * from nomination where status='unseen' ORDER BY date DESC";
	 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($con, $sql, 5, 8);
 	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();									
$query1 = mysql_query("select * from nomination where status='unseen' ORDER BY date DESC")
or die(mysql_error());
								$count = mysql_num_rows($query1);	
								if ($count != '0'){?>

<table border="1" id="resultTable">
<tr>
<th>Nomin_id</th>
<th>First Name</th> 
<th>Father Name</th>
<th>Type of crime</th>
<th>kebele crime occured</th>
<th>village crime occured</th>
<th> crime commited date</th>
<th>Description</th>
<th colspan=2>Action</th></tr>
</tr>
        <?php
while($row = mysql_fetch_array($rs))
{	
$id=$row["No_Id"]; 							 
	//mysql_query("UPDATE applicant SET unread='yes'");
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
<td><?php echo '<a  href="save_nomination_link_preventive-police.php?id='.$row['No_Id'].'">save</a>';?></td>
<td><?php echo '<a  href="preventivePoliceRejectNomination.php?id='.$row['No_Id'].'">Reject</a>';?></td>
</div>
											
<?php
 }
	?>
	</tr></table>
	<?php
		echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
	}						
	else
	{ 
	?>
<div class="alert alert-info"><i class="icon-info-sign"></i> <font size="3px">No New Comment found!</div>
	<?php 
	} 
	?>
										
</form>		
                               
                        <!-- /block -->
			                       	               
			              
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">

							 <?php
			    				require("time.php");
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
