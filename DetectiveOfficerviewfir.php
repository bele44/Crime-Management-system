<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer View Witness page</title>
<link  href="css/mystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("DetectiveOfficermenu.php");
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
			    				require("DetectiveOfficerSidemenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			           <br>
			   		<div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll;height: 400px;">
				 
<form action="" method="post">									
<?php
if($con)
{	
$query = mysqli_query($con,"select * from accuser");
if($query)
{
?>		
<br>
<table border='1' cellpadding="0" cellspacing="0">
<tr>
<th>criminal_id</th>
<th>firstname</th> 
<th>fathername</th>
<th>gfathername</th>
<th>sex</th>
<th>age</th>
<th>phoneno</th>
<th>village</th>
<th>kebele</th>
<th>educationlevel</th>
<th>date</th>
<th>photo</th>



</tr>
 <?php
while($row=mysqli_fetch_assoc($query))
{	
$num=$row["accuser_id"];
?><tr>
<td><?php echo $row["accuser_id"]; ?></td>
<td><?php echo $row["firstname"]; ?></td>
<td><?php echo $row["fathername"]; ?></td>
<td><?php echo $row["gfathername"]; ?></td>
<td><?php echo $row["sex"]; ?></td>
<td><?php echo $row["age"]; ?></td>
<td><?php echo $row["phoneno"]; ?></td>
<td><?php echo $row["village"]; ?></td>

<td><?php echo $row["kebele"]; ?></td>
<td><?php echo $row["educationlevel"]; ?></td>
<td><?php echo $row["date"];?></td>
<td><img src=<?php echo $row["photo"]; ?> height='50' width='40'></td>


										
<?php
 }
?>
</table>
<br>
<?php	
}						
else
echo "no connection";
} 
?>
	</form>		</div>
					</div>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=200px height=200px> <br>";
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
