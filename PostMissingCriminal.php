
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Police Head page</title>
<link  href="css/policeheadmystylesheet.css" rel="stylesheet" type="text/css"/>
<script src="validation.js" type="text/javascript"></script>
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
$activity_type="police head post missing criminal";
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
              			<h1>Police head task</h1>
		   	   				 <?php
			    				require("PoliceHeadSide.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
 					<?php
					  if(isset($_POST['post']))
						{	
							
							$firstname=($_POST["firstname"]);
							$fathername=$_POST['fathername'];
							$sex=$_POST['sex'];
							$age=$_POST['age'];
							$posting_type=$_POST['posting_type'];
							$wereda=($_POST["wereda"]);
							$kebele=$_POST['kebele'];
							$lostdate=$_POST['lostdate'];
							$postdate=date("d-m-Y h:i:s");
							//photo
							$ptmploc=$_FILES["photo"]["tmp_name"];
							$pname=$_FILES["photo"]["name"];
							$psize=$_FILES["photo"]["size"];
							$ptype=$_FILES["photo"]["type"];
							$description=$_POST['description'];
							if($con)
								{	
								if($psize<=90000&&$ptype=="image/jpeg")
								{

								if(!file_exists("photo"))
								mkdir("photo");
								$photopath="photo/$pname";
								if(copy($ptmploc,$photopath))
								{	
								$activity="police head post missing person[police head ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
								$sql="Insert into MisssingPerson values(' ','$firstname','$fathername','$sex','$age','$posting_type',
							    '$wereda','$kebele','$lostdate','$postdate','lost','$photopath','$description')";
								$insert=mysqli_query($con,$sql);
								if ($insert)
									{
									$x='<script type="text/javascript">alert("you post sucessfully !!!");
									window.location=\'PostMissingCriminal.php\';</script>';
									echo $x;
									}
								else
								echo" NO record posted!! ".mysql_error($con);	
								}
								else
								echo "Unable to upload the photo!";
								}

								else
								{

								if($psize>900000)
								echo "Photo size should not be greater than 9Kb!";
								else
								echo "Photo should be in jpeg format";

								}
								}
								else
								die("Connection Failed:".mysql($con));
								}
						?>
    <br>

		<fieldset style="width: auto; margin: auto;">
		<table>
   		 <form  enctype="multipart/form-data" action="" method="POST">
        	<tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u> Post Missing Person Form </u></h2></td></tr>
        <tr><td>First Name</td><td><input type="text" name="firstname" id="firstname" placeholder=" firstname" ></td>
        <script type="text/javascript">
				      	 var f1 = new LiveValidation('firstname');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter first name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        	<td>Woreda</td><td><input type="text" name="wereda"id="Woreda" placeholder=" Wereda" ></br></tr>
        	<script type="text/javascript">
				      	 var f1 = new LiveValidation('Woreda');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter woreda the person found"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        <tr><td>Father Name</td><td><input type="text" name="fathername"id="fathername" placeholder=" fathername" ></td>
        <script type="text/javascript">
				      	 var f1 = new LiveValidation('fathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter fathername "});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        	<td>Kebele</td><td><input type="text" name="kebele"id="kebele" placeholder=" Kebele" ></td></tr>
        	<script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter kebele the person found"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        <tr><td>Sex</td><td><select name="sex" required>
									         	<option selected="selected" value="">Select Sex</option>
										         	 <option value="Male">Male</option>
										         	 <option value="Female">Female</option></select></td>
       		<td>Date of person lost</td><td><input type="datetime-local" name="lostdate" required ></td></tr>
       		
        <tr><td>Age</td><td><input type="number" name="age"id="age" placeholder=" age" ></td>
        <script type="text/javascript">
				      	 var f1 = new LiveValidation('age');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter age of person"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter number only"});
					  	 f1.add( Validate.Length, { minimum:1, maximum: 2,failureMessage:"the characters must be less than 3" } );
				 		</script>
        	<td>Photo</td><td><input type="file" name="photo" id="photo" ></td></tr>
        	<script type="text/javascript">
				      	 var f1 = new LiveValidation('photo');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter photo for missing person "});
					  	 //f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 //f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        <tr><td>Posting Reason</td><td><input type="text" name="posting_type" id="posting_type" placeholder=" posting_type" ></td>
        <script type="text/javascript">
				      	 var f1 = new LiveValidation('posting_type');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter reason the person post"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 20,failureMessage:"the characters must be less than 20" } );
				 		</script>
        	<td>Description</td><td><textarea name="description" placeholder="Enter your comment..."style="width: 255px;height:60px;"  >
        		          </textarea></td></tr>
        <tr><td>&nbsp;&nbsp;</td><td><input type="submit" value="Post" name="post" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Clear" ></td></tr>
       </form>
    </table>
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
