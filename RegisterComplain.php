
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Complain Account page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
<script src="validation.js" type="text/javascript"></script>
<script lang="javascript">
function validateemailform()
{
 var mb = document.forms["myForm"]["phone"].value;
if (mb == "") 
{
alert("Phone Number Is Empty please Fill");
return false;
}
var str=document.forms["myForm"]["phone"].value;
var valid="0123456789+"; 
for(i=0;i<str.length;i++)
{
if(valid.indexOf(str.charAt(i))==-1)
{
alert("please insert phone_number number only number");
document.forms["myForm"]["phone"].value="";
document.forms["myForm"]["phone"].focus();
return false;
}
}
if(str.length!=10)
{
alert("please enter phone number 10  digit.");
document.forms["myForm"]["phone"].focus();
return false;
}  
if (str.charAt(0)!="0")
{
alert("phone number should be start with 0");
document.forms["myForm"]["phone"].focus();
return false;
} 
if (str.charAt(1)!="9")			   
{
alert("phone number should be start with 09");
document.forms["myForm"]["phone"].focus();
return false;
}

 var sel = document.forms["myForm"]["co"].value;
if (sel == "") 
{
alert("please fill selection box");
return false;
}

}
</script>
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
$activity_type="Register Complaint";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
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
				    require("PreventivePoliceMenu.php");
				   echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px>( $fullname )</font>";
				   ?>       
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
			    				require("PreventivePoliceSideMenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>

			           <div id="ContentCenter">
			           <br>
			   	<fieldset><table>
				<form action="" method="post" enctype="multipart/form-data" name="myForm">
					<tr><td colspan="2"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u>Complaint Registration Form</u></h2></td></tr>
					<tr><td>  Complaint ID:</td><td><input type="text" name="complain_id" id="cid" placeholder="Enter complain's Id" required></td>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('cid');
					  	 f1.add(Validate.Presence,{failureMessage: " complaint id is mandatory"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<td> Education Status:</td><td><input type="text" name="educationlevel" id="Edstatus" placeholder=" Education status"></td></tr>
						
				 		 <script type="text/javascript">
				      	 var f1 = new LiveValidation('Edstatus');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter Education Status"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  First Name:</td><td><input type="text" name="firstname" id="firstnname" placeholder="Complain's First name" required></td>
					
				 		 <script type="text/javascript">
				      	 var f1 = new LiveValidation('firstnname');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter complaint first name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
								<td>  Type of Job:</td><td><input type="text" name="job" id="job" placeholder="Enter complain's job" ></td></tr>
								
				 		 <script type="text/javascript">
				      	 var f1 = new LiveValidation('job');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter jop complaint work"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 100,failureMessage:"the characters must be less than 100" } );
				 		</script>
					<tr><td>  Father Name:</td><td><input type="text" name="fathername" id="fathername" placeholder="Complain's Father Name" required>
						</td>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('fathername');
					  	 f1.add(Validate.Presence,{failureMessage: "father name not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
							<td>  Work Place:</td><td><input type="text" name="workplace" id="wplace" placeholder="Complain's work place" ></td></tr>
							<script type="text/javascript">
				      	 var f1 = new LiveValidation('wplace');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter Workplace"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters must be less than 30" } );
				 		</script>
					<tr><td>G.Father Name:</td><td><input type="text" name="gfathername" id="gfather"placeholder="Complain's G.Father Name"></td>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('gfather');
					  	 f1.add(Validate.Presence,{failureMessage: "grandfather name not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
								<td>  Kebele:</td><td><input type="text" name="kebele" id="kebele" placeholder="Complain's kebele" ></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "father name not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters must be less than 30" } );
				 		</script>
					<tr><td>  Sex:</td><td><select name="sex" id="sx" required>
										         	 <option selected="selected" value="">--Select Sex--</option>
										         	 <option value="Male">Male</option>
										         	 <option value="Female">Female</option>
									         	 </select></td></tr>
									         	 <script type="text/javascript">
				      	 var f1 = new LiveValidation('sx');
					  	 f1.add(Validate.Presence,{failureMessage: "please Choose sex"});
					  	 //f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 //f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  Age:</td><td><input type="text" name="age" id="age" placeholder="Enter age " ></td>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('age');
					  	// f1.add(Validate.Presence,{failureMessage: ""});
					  	 f1.add(Validate.Format,{pattern: /^[0-9]+$/ ,failureMessage: "You allowed to enter number only"});
					  	 f1.add( Validate.Length, { minimum:1, maximum: 2,failureMessage:"you age not greater than 90" } );
				 		</script>		
								<td>  Email:</td><td><input type="email" name="email" id="em" placeholder="Enter Email" ></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('em');
					  	// f1.add(Validate.Presence,{failureMessage: ""});
					  	 f1.add(Validate.Format,{pattern: /^[@.a-zA-Z0-9]+$/ ,failureMessage: "Enter the corect email pattern"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 100,failureMessage:"you age not greater than 90" } );
				 		</script>
					<tr><td>  Phone No:</td><td><input type="number" name="phone" id="pnumber" placeholder="Enter Phone Number" ></td>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('em');
					  	// f1.add(Validate.Presence,{failureMessage: ""});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9@.]+$/ ,failureMessage: "Enter the corect email pattern"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 100,failureMessage:"you age not greater than 90" } );
				 		</script>
							<td>Description:</td><td><textarea name="description" rows="8" cols="25" id="dec" placeholder="Enter your nomination..." >
							</textarea></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('dec');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter your descrpition here"});
					  	 //f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9.]+$/ ,failureMessage: "you enter unwanted character please check it"});
					  	 f1.add( Validate.Length, { minimum:5, maximum: 1000,failureMessage:"you enter at list 5 character " } );
				 		</script>	
					<tr><td>  Photo:</td><td><input type="file" id="pto" name="photo" ></td>
					<script type="text/javascript">
				      	 var f1 = new LiveValidation('pto');
					  	 f1.add(Validate.Presence,{failureMessage: "please enter your photo"});
					  	 //f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9.]+$/ ,failureMessage: "you Enter unneccessary character"});
					  	 //f1.add( Validate.Length, { minimum:2, maximum: 10000,failureMessage:"you age not greater than 90" } );
				 	</script>
						<td>&nbsp;&nbsp;</td><td> <input type="submit" value="Register" name="Register" onclick="return validateemailform()">
						<input type="reset" value="Reset"></td></tr>
				</form></table>
			  
			  		<?php
					  if(isset($_POST['Register']))
						{	
						$complain_id=($_POST["complain_id"]);
						$firstname=($_POST["firstname"]);
						$fathername=($_POST["fathername"]);
						$gfathername=($_POST["gfathername"]);
						$sex=($_POST["sex"]);
						$age=($_POST["age"]);
						$phoneno=($_POST["phone"]);
						$educationlevel=($_POST["educationlevel"]);
						$job=($_POST["job"]);
						$workplace=($_POST["workplace"]);
						$kebele=($_POST["kebele"]);
						$email=$_POST['email'];
						$description=($_POST["description"]);
						//photo
							$ptmploc=$_FILES["photo"]["tmp_name"];
							$pname=$_FILES["photo"]["name"];
							$psize=$_FILES["photo"]["size"];
							$ptype=$_FILES["photo"]["type"];
							if($con)
								{	
								if($psize<=900000)
								{

								if(!file_exists("photo"))
								mkdir("photo");
								$photopath="photo/$pname";
								if(copy($ptmploc,$photopath))
								{
									$activity="Preventive police Register Complaint[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
									$checkfromemp=mysqli_query($con,"select * from employee");
									if($check=mysqli_fetch_assoc($checkfromemp))
									{
										$empid=$check["emp_id"];
									}
									if($empid=='$complain_id')
									{
									$x='<script type="text/javascript">alert("sory ID Number is alredy Exist please change it !");
										window.location=\'RegisterComplain.php\';</script>';
										echo $x; 	
									}
									else
									{
									$sql1="Insert into employee values('$complain_id','$firstname','$fathername','$gfathername','$sex','$age',
									'$phoneno','$educationlevel',0,'$email','Active','$photopath','new')";
									$insert1=mysqli_query($con,$sql1);
									if ($insert1 )
									{
									$query="Insert into Registercomplaint values('$complain_id','$firstname','$fathername','$gfathername','$sex','$age'										,'$phoneno','$educationlevel','$job','$workplace','$kebele','Active','$email','$photopath','$description','new')";
										mysqli_query($con,$query);
										
										$x='<script type="text/javascript">alert("complaint is recorded sucessfully !");
										window.location=\'RegisterComplain.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("no record is inserted !");
										window.location=\'RegisterComplain.php\';</script>';
										echo $x;
									}
								}	
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
				</fieldset>	
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			          	<img src="images/p5.jpg" width="200px" height="200px">
			    		<?php
							
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
