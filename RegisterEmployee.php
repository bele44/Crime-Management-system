<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Register Employee page</title>
<link  href="css/hrmanagermystylesheet.css" rel="stylesheet" type="text/css"/>
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
$activity_type="Register employee";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="empty";	
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
				    require("HRmanagerMenu.php");
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
						 <img src="images/awe.jpg" width="200px" height="200px"> 
			  		  </div>	   

				   </td>
                    <td>
			           <div id="ContentCenter">
			   <br>
			    <fieldset style="height: 390px;">
				<table border="0px" width="550px" >
				  <form action="" method="post" enctype="multipart/form-data" name="myForm">
					<tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #1e72b7;"><u>Employe Registration Form</u></h2></td></tr>
					<tr><td>  Employee ID:</td><td><input type="text" name="emp_id" id="empid" placeholder="Enter Employee Id" required></td>
					     <script type="text/javascript">
				      	 var f1 = new LiveValidation('empid');
					  	 f1.add(Validate.Presence,{failureMessage: "Employe id is not null"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
						<td>Education Level:</td><td><input type="text" name="educationlevel" id="Edstatus" placeholder="Education Level"></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('Edstatus');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter Education Status"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  First Name:</td><td><input type="text" name="firstname" id="fn" placeholder="Enter First name" required></td>
						 <script type="text/javascript">
				      	 var f1 = new LiveValidation('fn');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter first name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
							  <td>  Office No:</td><td><input type="text" name="officeno" name="of" placeholder="Enter Office Number" ></td></tr>
						 <script type="text/javascript">
				      	 var f1 = new LiveValidation('of');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter office number"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 10,failureMessage:"the characters must be less than 10" } );
				 		</script>
					<tr><td>  Father Name:</td><td><input type="text" name="fathername" id="ln" placeholder="Enter Father Name"></td>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('ln');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter father name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
							  <td>  Email:</td><td><input type="email" name="email" placeholder="Enter Email" required></td></tr>
					<tr><td>  Grand_Father Name:</td><td><input type="text" name="gfathername" id="gfn" placeholder="Enter G.Father name"></td>
					     <script type="text/javascript">
				      	 var f1 = new LiveValidation('gfn');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter grand father name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					   <td> User Status:</td><td><select name="status" required><?php $status=array("Select Status","Active","Blocked");
										         	 foreach($status as $i)echo"<option value=$i>$i</option>";?></select></td></tr>
					<tr><td>  Sex:</td><td><select name="sex" required><?php $sex=array("Select Sex","Male","Female");
										         	 foreach($sex as $i)echo"<option value=$i>$i</option>";?></select></td>
										         	 <td>Photo:</td><td><input type="file" name="photo"  required></td></tr>
					<tr><td>  Age:</td><td><input type="text" name="age" id="age" placeholder="Enter Criminal Age" required></td></tr>
					 <script type="text/javascript">
				      	 var f1 = new LiveValidation('age');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter age"});
					  	 f1.add(Validate.Format,{pattern: /^[0-9]+$/ ,failureMessage: "You allowed to enter number only"});
					  	 f1.add( Validate.Length, { minimum:1, maximum: 2,failureMessage:"enter maximum of 2 character" } );
				 		</script>
					<tr><td>  Phone No:</td><td><input type="text" name="phone" placeholder="Enter Phone Number" required></td>
					<td><input type="submit" value="Register" name="Register" onclick="return validateemailform()"></td>
					<td><input type="reset" value="Reset"></td></tr>
					
				  </form>
				</table>
				 <?php
					  if(isset($_POST['Register']))
						{	
							$emp_id=($_POST["emp_id"]);
							$firstname=($_POST["firstname"]);
							$fathername=$_POST['fathername'];
							$gfathername=$_POST['gfathername'];
							$sex=$_POST['sex'];
							$age=$_POST['age'];
							$phoneno=$_POST['phone'];
							$educationlevel=$_POST['educationlevel'];
							$officeno=$_POST['officeno'];
							$email=$_POST['email'];
							$status=$_POST['status'];
							//photo
							$ptmploc=$_FILES["photo"]["tmp_name"];
							$pname=$_FILES["photo"]["name"];
							$psize=$_FILES["photo"]["size"];
							$ptype=$_FILES["photo"]["type"];
							if($con)
								{	
								if($psize<=90000&&$ptype=="image/jpeg")
								{

								if(!file_exists("photo"))
								mkdir("photo");
								$photopath="photo/$pname";
								if(copy($ptmploc,$photopath))
								{	
								$activity="HR manager Register employee[HRmanager:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
								$sql="Insert into employee values('$emp_id','$firstname','$fathername','$gfathername','$sex','$age','$phoneno',
							    '$educationlevel','$officeno','$email','$status','$photopath','new')";
								$insert=mysqli_query($con,$sql);
								if($insert)
								{
								$x='<script type="text/javascript">alert("Employee is recorded sucessfully !");
										window.location=\'RegisterEmployee.php\';</script>';
										echo $x;
								}
								else
								{
								$x='<script type="text/javascript">alert("sory this user is alredy registered !");
								window.location=\'RegisterEmployee.php\';</script>';
								echo $x;
								}
								}
								else
								echo "Unable to upload the photo!";
								}

								else
								{

								if($psize>90000)
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
 						
			          </div>
			       </td>
			   
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
