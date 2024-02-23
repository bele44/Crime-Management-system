<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer Order Police page</title>
<link  href="css/mystylesheet.css" rel="stylesheet" type="text/css"/>
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
			    <fieldset>
			   <table border="0px" width="720px" >
				<form action="" method="post" enctype="multipart/form-data">
				  
			  <tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2d73d2;"><u>Detective officer Order preventive Police Form</u>
			  </h2></td></tr>
					<tr><td>  Order ID:</td><td><input type="text" name="order_id"id="order_id" placeholder="Ordered Id"></td>
					    <script type="text/javascript">
				      	 var f1 = new LiveValidation('order_id');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the order id"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You enter unwanted character check it"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
				 		<td>Kebele:</td><td><input type="text" name="kebele"id="kebele" placeholder="Enter kebele" required></td></tr>
						 <script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter ordered plocie kebele"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  accuser id:</td><td><select name="accuser_id" required>
									         	<?php
									         	if($con)
												 {
									         	 $sql="select accuser_id from accuser";
									         	 $sql1=mysqli_query($con,$sql);
												  if($sql1)
												  {
												  ?>
												  	<option value="">
													</option>
													<?php
													while($row=mysqli_fetch_array($sql1))
													{
													?>
													<option value="<?php echo $row["accuser_id"];?>">
													<?php echo $row["accuser_id"];?>	
													</option>
												<?php
												}}}
												?>
									         	
									         	 </select></td>
				<td>  Village:</td><td><input type="text" name="village"id="village" placeholder="Enter village " required></td></tr>
					 <script type="text/javascript">
				      	 var f1 = new LiveValidation('village');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the village acced person lived"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
                <tr><td>  Police id:</td><td><select name="userid" required>
									         	<?php
									         	if($con)
												 {
									         	 $sql="select userid from account where role='PreventivePolice' && status='Active'";
									         	 $sql1=mysqli_query($con,$sql);
												  if($sql1)
												  { ?>
												  	<option value="">
													</option>
													<?php
													while($row=mysqli_fetch_array($sql1))
													{
													?>
													<option value="<?php echo $row["userid"];?>">
													<?php echo $row["userid"];?>	
													</option>
												<?php
												}}}
												?>
									         	
									         	 </select></td>
					<td>  Crime Commited Date:</td><td><input type="date" name="Crime_commited_dates" required></td></tr>
					<tr><td> Accused First Name:</td><td><input type="text" name="accused_firstname" id="firstname"placeholder="First Name" required>
					</td>
					 <script type="text/javascript">
				      	 var f1 = new LiveValidation('firstname');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter  accused first name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
				 <td> Appointment Date:</td><td><input type="date" name="appointment_dates" required></td></tr>
				<tr><td>Accused Father Name:</td><td><input type="text" name="accused_fathername"id="fathername" placeholder="Father Name" required>
				       <script type="text/javascript">
				      	 var f1 = new LiveValidation('fathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter  accused father name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
				</td><td> Crime Type:</td><td><input type="text" name="crimetype" id="crimetype"placeholder="crime type" required></td></tr>
				
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('crimetype');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter crime type"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 20,failureMessage:"the characters must be less than 20" } );
				 		</script>
				<tr><td>  Accused G.Father Name:</td><td><input type="text" name="accused_gfathername"id="gfathername" placeholder="G.Father Name"
				 required></td>
						 <script type="text/javascript">
				      	 var f1 = new LiveValidation('gfathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter accused G.faher name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
				 		<td>Crime Level:</td><td><select name="crimelevel" required>
										         <option selected="selected" value="">Select Crime type</option>
										         	 <option value="Felony">Felony</option>
										         	 <option value="simplecrime">Simple Crime</option>
									         	 </select></td></tr>
					<tr><td>  Sex:</td><td><select name="sex" required>
									         	<option selected="selected" value="">Select Sex</option>
										         	 <option value="Male">Male</option>
										         	 <option value="Female">Female</option></select></td>
					<td>  Description:</td><td><textarea name="description"id="description"  placeholder="
					...Enter your description here... "style="width: 200px;height: 60px;" ></textarea></td></tr>
					
					 <script type="text/javascript">
				      	 var f1 = new LiveValidation('description');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter description"});
					  	 f1.add(Validate.Format,{pattern: /^[.a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:5, maximum: 100,failureMessage:"the characters must be less than 15" } );
				 		</script> 
					<tr><td></td><td><input type="submit" value="send" name="send">&nbsp;&nbsp;&nbsp;<input type="reset" value="Reset"></td></tr>
				</form>
			  
			   </table>
			 <?php
					  if(isset($_POST['send']))
						{	
							$order_id=($_POST["order_id"]);
							$accuser_id=($_POST["accuser_id"]);
							$userid=($_POST["userid"]);
							$accused_firstname=($_POST["accused_firstname"]);
							$accused_fathername=$_POST['accused_fathername'];
							$accused_gfathername=$_POST['accused_gfathername'];
							$sex=$_POST['sex'];
							$kebele=$_POST['kebele'];
							$village=$_POST['village'];
							$Crime_commited_dates=$_POST['Crime_commited_dates'];
							$appointment_dates=$_POST['appointment_dates'];
							$crimetype=$_POST['crimetype'];
							$crimelevel=$_POST['crimelevel'];
							$description=$_POST['description'];
							if($con)
								{	
							
								$sql="Insert into orders values('$order_id','$accuser_id','$userid','$accused_firstname','$accused_fathername',
								'$accused_gfathername','$sex','$kebele','$village','$Crime_commited_dates','$appointment_dates','$crimetype',
								'$crimelevel','$description','unseen')";
								$insert=mysqli_query($con,$sql);
								if($insert)
								{
								$x='<script type="text/javascript">alert(" your order sent sucessfully !!");
								window.location=\'DetectiveOfficerOrderPolice.php\';</script>';
								echo $x;
								}
							else
								{
								$x='<script type="text/javascript">alert(" failed to recored!!");
								window.location=\'DetectiveOfficerOrderPolice.php\';</script>';
								echo $x;
								}
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
