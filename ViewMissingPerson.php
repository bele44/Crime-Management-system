
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>home  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="src/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
loadingImage : 'src/loading.gif',
closeImage   : 'src/closelabel.png'
})
})
</script> 
</head>
<body>
	
	<?php 
	if(isset($_SESSION['ff'])){
		echo "<script>alert('inserted successfully')</script>"; 
		unset($_SESSION['ff']);		
	}
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
				    require("headermenu.php");
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
				    require("homesidemenu.php");
				?> 

               </div>
              
			  		  </div>


   
				    </td>
				   <td>
				 
 <div id="ContentCenter" style="overflow-y: scroll;">

<form action="" method="post">									
	<?php
	if($con)
	{
	$sql="select * from MisssingPerson ORDER BY postdate desc";
	$recordfound=mysqli_query($con,$sql);
	while($row = mysqli_fetch_assoc($recordfound))
	{	
	?>
	<div style="float: left;margin: 10px;width: 210px;border: 1px solid #3074cf;padding: 2px;box-shadow: 1px 0 0 1px #555;">
	<table border="0"cellpadding="0"cellspacing="0">
	<tr style="background-color: #3f96c0;"><td colspan="12">&nbsp;</td></tr>
	<tr><td colspan="12"><img src="<?php echo $row["photopath"]; ?> " width="210px" height="150px"></td></tr>
	<tr><td>Name&nbsp;&nbsp;<b><?php echo $row["firstname"]; ?>&nbsp;&nbsp;<?php echo $row["fathername"]; ?></b></td></tr>
	<tr><td>Sex&nbsp;&nbsp;<b><?php echo $row["sex"]; ?></b></td></tr>
	<tr><td>Reasons to post&nbsp;&nbsp;<b><?php echo $row["posting_type"]; ?></b></td></tr>
	<tr><td> Woreda&nbsp;&nbsp;<b><?php echo $row["wereda"]; ?></b></td></tr>
	<tr><td>Kebele&nbsp;</b><?php echo $row["kebele"]; ?></b></td></tr>
	<tr><td> Lost Date&nbsp;&nbsp;<b><?php echo $row["lostdate"]; ?></b></td></tr>
	<tr><td><?php echo '<a rel="facebox" href="messingpersondescription.php ?id='.$row['MP_Id'].'">see more details</a>';?></td></tr>
	<tr><td><?php echo '<a rel="facebox" href="Nominationmissingperson.php?id='.$row['MP_Id'].'">give Nomination</a>';?></td></tr>
	
	
	</tr>
	</table>
	</div>											
	<?php
	 }
	 }
   ?>
	</form>                
	 <!-- /block -->
	</div>
			            
				   </td>
				   <td>
			          <div id="ContentRight">
				  <?php
				    require("login.php");
				   ?> 
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
</body>
</html>
