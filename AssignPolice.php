<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Police Head Assign page</title>
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
$activity_type="police head assign placement";
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
      <fieldset>
       <form action="" method="post">
       <table><tr><td>
		<input type="submit" name="search" value="Search" style="width:70px; height:45px;background-color:#1f618d;color: #ecfdfc;">
		<input type="text" name="searchkey" placeholder="Search by ID" style="width:200px; height:40px;"></td>
		<td><h2>Search By Police ID Number</h2></td></tr>
		</table>
	   </form>
	   </fieldset>
	   
				<br>
		<?php
	 if(isset($_POST['search']))
		{
		$searchkey=$_POST["searchkey"];
		if($con)
		{
		$activity="police head assign placement[police head ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");	
		$sql="select * from employee where emp_id='$searchkey'";
		$recordfound=mysqli_query($con,$sql); 
		?>
		<table border='1' cellpadding="0" cellspacing="0">
				<tr><th>First_Name</th><th>Father_Name</th><th>G.Father_Name</th><th>
				Sex &nbsp;</th><th>Phone_No</th></tr>
				<?php
		   if($row1=mysqli_fetch_array($recordfound))
	        {
				echo"<tr><td>". $row1["firstname"]."</td> <td>". $row1["fathername"]."</td><td>". $row1["gfathername"]."</td>
				<td>". $row1["sex"]."</td><td>". $row1["phoneno"]."</td></tr>";
	        }
	        echo"</table>";
	        ?>	
			<?php	
			}
		}
		?>
   			<br> 
		<fieldset>
		<table>
   		 <form  enctype="multipart/form-data" action="" method="POST">
        	<tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2572dd;"><u> Assign Police to thier placement <u></h2></td></tr>
        <tr><td>  Placement No:</td><td><input type="text" name="placement_No" placeholder="Enter accuser ID Number" 
					                             pattern="[a-zA-Z0-9/_.\-+]+" required></td>
        	<td>  Sex:</td><td><select name="sex" required>
									         	<option selected="selected" value="">--Select Sex--</option>
										         	 <option value="Male">Male</option>
										         	 <option value="Female">Female</option></select></td></tr>
        <tr><td>  Police id:</td><td>
        	<select name="Police_id">
        	<?php
        		$sql="select * from account where role='PreventivePolice'";
        		$recored=mysqli_query($con,$sql);
        		if($recored)
        		{
					?>
        		<option value=""></option>
        		<?php
        		while($row=mysqli_fetch_assoc($recored))
        		{
        			?>
        		<option value="<?php echo $row['userid'];?>">
        			<?php echo $row["userid"];?>
        		</option>
        		
					<?php
				}
        		}
        		?>
				
        		
        	</select>
        </td>
        	<td>  Phone No:</td><td><input type="number" name="phoneno" placeholder="Enter Phone Number" required></td></tr>
        <tr><td>  First Name:</td><td><input type="text" name="firstname" placeholder="Enter First Name" required></td>
       		<td>  Kebele:</td><td><input type="text" name="kebele" placeholder="Enter kebele" required></td></tr>
        <tr><td>  Father Name:</td><td><input type="text" name="fathername" placeholder="Enter Father Name" required></td>
        	<td>  Date:</td><td><input type="text" name="date" value="<?php echo date("d-m-Y");?>" readonly></td></tr>
        <tr><td>  Grand Father Name:</td><td><input type="text" name="gfathername" placeholder="Enter Grand Father Name" required></td>
        	<td><input type="submit" value="Assign" name="post">  </td><td>
        <input type="reset" value="Clear"></td></tr>
       </form>
    </table>
	</fieldset>
	<?php
					  if(isset($_POST['post']))
						{
							$placement_No=($_POST["placement_No"]);
							$Police_id=$_POST['Police_id'];
							$firstname=$_POST['firstname'];
							$fathername=$_POST['fathername'];
							$gfathername=$_POST['gfathername'];
							$sex=($_POST["sex"]);
							$phoneno=$_POST['phoneno'];
							$kebele=$_POST['kebele'];
							$date=$_POST['date'];
							if($con)
								{		
								$sql="Insert into placement values('$placement_No','$Police_id','$firstname','$fathername','$gfathername','$sex',
							    '$phoneno','$kebele','$date','unseen')";
								$insert=mysqli_query($con,$sql);
								if ($insert)
									{
									$x='<script type="text/javascript">alert("you assign police sucessfully !!!");
									window.location=\'AssignPolice.php\';</script>';
									echo $x;
									}
								else
								{
								$x='<script type="text/javascript">alert("does not Assign police!! ");
									window.location=\'AssignPolice.php\';</script>';
									echo $x;	
								}
								}
								else
								die("Connection Failed:".mysql($con));
								}
						?>
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
