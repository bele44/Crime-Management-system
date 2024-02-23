<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Traffic Officer page</title>
<link  href="css/trafficofficermystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("TrafficOfficeMenu.php");
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
			    				require("TrafficOfficeSideMenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			           <br>
			   	<fieldset>
			   <table border="0px" width="550px" >
				<form action="" method="post" enctype="multipart/form-data">
				  
					<tr><td colspan="4"><h1 style="font-size:25px;text-align: center;color: #2854d7;"><u>Assign Placement For Traffic Police </u></h1></td></tr>
					<tr><td> Traffic Police Id:<br><input type="text" name="Trafficpolice_id" placeholder="Enter Traffic police id" 
					                             pattern="[a-zA-Z0-9/_.\-+]+"style="width: 300px;height: 30px;" required></td>
						<td>Phone No:<br><input type="number"name="phoneno"placeholder="Enter Phone Number"style="width:300px;height:30px;"></td></tr>
					                             
					<tr><td>  First Name:<br><input type="text" name="firstname" placeholder="Enter First Name"style="width: 300px;height: 30px;" 
												required></td>
					    <td>  Kebele:<br><input type="text"name="kebele"placeholder="Enter kebele"style="width:300px;height:30px;"required></td></tr>
					<tr><td>  Father Name:<br><input type="text" name="fathername"style="width: 300px;height: 30px;"placeholder="Enter Father Name" 
												required></td>
					    <td>  Street :<br><input type="text" name="street"style="width: 300px;height: 30px;"
					     						placeholder="Enter street the police work" required></td></tr>
					<tr><td>  Grand Father Name:<br><input type="text" name="gfathername" placeholder="Enter Grand Father Name"
						 						style="width: 300px;height: 30px;"required></td>
				<td>  Start Date:<br><input type="text" name="start_date" value="<?php echo date("m-d-Y");?>" readonly placeholder="Enter start date" 
					                               style="width: 300px;height: 30px;"required></td></tr>
					<tr><td>  Sex:<br><select name="sex" required style="width: 300px;height: 30px;">
									         	<?php $role=array("choose sex   ","Male","Female");
									         	 foreach($role as $i)echo"<option value=$i>$i</option>";?></select></td>
					<td>  End Date:<br><input type="date" name="end_date" placeholder="Enter End Date" required style="width: 300px;height: 30px;">
					</td></tr>
					<tr><td></td>
					<td><input type="submit" value="Register" name="Register">
					<input type="reset" value="Reset">	
					</td>
					</tr>
				 
				</form>
			  
			   </table>
			 <?php
					  if(isset($_POST['Register']))
						{	
							$Trafficpolice_id=($_POST["Trafficpolice_id"]);
							$firstname=($_POST["firstname"]);
							$fathername=$_POST['fathername'];
							$gfathername=$_POST['gfathername'];
							$sex=$_POST['sex'];
							
							$phoneno=$_POST['phoneno'];
							
							$kebele=$_POST['kebele'];
							$street=$_POST['street'];
							$start_date=$_POST['start_date'];
							$end_date=$_POST['end_date'];
							
							if($con)
							{	
								if($end_date-$start_date==0)
								{
								$srl1="update trafficplacement set status='seen' where Trafficpolice_id=$Trafficpolice_id";
								$updated=mysql_query($srl1,$con);
								}
								$sql="Insert into trafficplacement values('$Trafficpolice_id','$firstname','$fathername','$gfathername','$sex',
								'$phoneno','$kebele','$street','$start_date','$end_date','unseen')";
								$insert=mysql_query($sql,$con);
								if($insert)
								echo" you send sucessfully !!";
								else
								echo" NO record inserted!! ".mysql_error($con);	
								}
								else
								die("Connection Failed:".mysql($con));
								}
						?>
						</fieldset>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			          	<?php
							require("ProfileRightSide.php");
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
