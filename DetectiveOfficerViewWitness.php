<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer View Witness page</title>
<link  href="css/cssforspacail2.css" rel="stylesheet" type="text/css"/>
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
	<div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			<br>
		<fieldset style="width:500px;margin-left: 80px;;">
		<form action="" method="post">
		<h3 style="color: #2c68b1;">Search by Using Accuser Id</h3>
		<input type="submit" name="search" value="Search" style="width:70px; height:45px;background-color:#8c98fd">
		<input type="text" name="searchkey" placeholder="Search by Accuser Id" style="width:200px; height:40px;">
		</form>
		</fieldset>	&nbsp;		   
						<?php
	 if(isset($_POST['search']))
		{
		$searchkey=$_POST["searchkey"];
		if($con)
		{
		$sql="select * from witness where accuser_id='$searchkey'";
		$recordfound=mysqli_query($con,$sql); 
		$sql2="select * from accuser where accuser_id='$searchkey'";
		$recordfound2=mysqli_query($con,$sql2);
		while($row=mysqli_fetch_array($recordfound2))
	      {
	      	$fn= $row["firstname"];
	      	$ln=$row["fathername"];
	      	$fl=$fn.$ln;
		  }
		if(($recordfound->num_rows)>0)
		{
		
		?>
		<table border='1' cellpadding="0" cellspacing="0">
		<tr bgcolor="#dbd5d2"><td colspan="15" align="center"><h3>Witness Profile for Accuser&nbsp;&nbsp;&nbsp;
		<font style="color:#605aa5;"><?php ?></h3></font></td></tr>
				<tr> 
				<th>Witness ID</th>
				<th>Accuser_id</th>
				<th>First_Name</th> 
				<th>Father_Name</th>
				<th>G.Father_Name</th>
				<th>Sex &nbsp;</th>
				<th>Age</th>
				<th>Phone_No</th>
				<th>Education_level</th>
				<th>Email</th>
				<th>Kebele</th>
				<th>Village</th>
				<th>Date</th>
				<th>Photo</th>
				<th>Descrption</th>
				</tr>
				<?php
		while($row3=mysqli_fetch_array($recordfound))
	      {
		echo"<tr> <td>". $row3["witness_id"]."</td><td>". $row3["accuser_id"]."</td><td>". $row3["firstname"]."</td> <td>". $row3["fathername"]."</td>
				<td>". $row3["gfathername"]."</td><td>". $row3["sex"]."</td><td>". $row3["age"]."</td><td>". $row3["phoneno"]."</td>
				<td>". $row3["educationlevel"]."</td><td>". $row3["email"]."</td>
				<td>". $row3["kebele"]."</td><td>". $row3["village"]."</td><td>". $row3["date"]."</td><td><img src=". $row3["photo"]."
				 style=width:60px; height:80px;></td>
				<td>". $row3["description"]."</td></tr>";
				
			
	        }
	        echo"</table>";
	        
	        }
	        ?>	
			<br><br><br>
			<?php	
			}
		}
		?>   
	            <!-- /block -->
						</div>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			
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
