<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Register Crime page</title>
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

<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
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
$activity_type="Register Criminal";
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

               
                <img src="images/nn.jpg" width="140px"height="160px">
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
			           <div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			           <br>
		<form action="" method="post">
		<input type="submit" name="search" value="Search" style="width:70px; height:45px;background-color:#acf7f4;">
		<input type="text" name="searchkey" placeholder="Search by name" style="width:200px; height:40px;">
		
		</form>
		<br>
		<?php
	 if(isset($_POST['search']))
		{
		$searchkey=$_POST["searchkey"];
		if($con)
		{
		$sql="select * from criminal where firstname='$searchkey'";
		$recordfound=mysqli_query($con,$sql); 
		?>
		<table border='1' cellpadding="0" cellspacing="0">
				<tr> <th>criminal_id</th><th>First_Name</th> <th>Father_Name</th><th>G.Father_Name</th><th>
				Sex &nbsp;</th><th>Age</th><th>Phone_No</th><th>Village</th><th>Kebele</th><th>
				Education_level</th><th>Photo</th><th>Job</th></tr>
				<?php
		if($row1=mysqli_fetch_array($recordfound))
	      {
		echo"<tr> <td>". $row1["criminal_id"]."</td><td>". $row1["firstname"]."</td> <td>". $row1["fathername"]."</td>
		<td>". $row1["gfathername"]."</td><td>". $row1["sex"]."</td><td>". $row1["age"]."</td><td>". $row1["phoneno"]."</td>
		<td>". $row1["village"]."</td><td>". $row1["kebele"]."</td><td>". $row1["educationlevel"]."</td><td><img src=". $row1["photo"]." 
		height='50' width='40'/></td><td>". $row1["job"]."</td></tr>";
		}
	        echo"</table>";
	        ?>	
			
			<a href="CriminalCase.php">Add other Criminal Record</a>
			<br><br><br>
			<?php	
			}
		}
		?>
	<?php
	 if(!isset($_POST['search']))
		{
			?>
           	<br>
		<fieldset>
		
		<table>
   		 <form  enctype="multipart/form-data" action="" method="POST" name="myForm">
   		 <tr><td colspan="4"><h2 style="color: #3677e2;"><u> Criminal Registration Form</u></h2></td></tr>
        <tr><td>  ID Number:</td><td><input type="text" name="criminal_id" id="criminal_id" placeholder="Enter Criminal ID Number"
        							pattern="[a-zA-Z0-9/_.\-+]+" ></td>
        							
				 		 <script type="text/javascript">
				      	 var f1 = new LiveValidation('criminal_id');
					  	 f1.add(Validate.Presence,{failureMessage: "id number is not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[./\ a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter numbe only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 20,failureMessage:"the characters must be less than 20" } );
				 		</script>
        	<td>  Phone No:</td><td><input type="text" name="phone" placeholder="Enter Phone Number"></td>
        	</tr>
        <tr><td>  First Name:</td><td><input type="text" name="firstname" id="firstname" placeholder="Enter First Name"></td>
         <script type="text/javascript">
				      	 var f1 = new LiveValidation('firstname');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter first name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        	<td>  Village:</td><td><input type="text" name="village"id="village" placeholder="Enter village you ciminal lived"></td></tr>
        	     	 <script type="text/javascript">
				      	 var f1 = new LiveValidation('village');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter village"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        <tr><td>  Father Name:</td><td><input type="text" name="fathername" id="fathername"  placeholder="Enter Father Name"></td>
         <script type="text/javascript">
				      	 var f1 = new LiveValidation('fathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter father name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
       		<td>  Kebele:</td><td><input type="text" name="kebele" id="kebele"placeholder="Enter kebele"></td> </tr>
       		     	 <script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter kebele"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
       		
       		
        <tr><td>  Grand Father Name:</td><td><input type="text" name="gfathername" id="gfathername" placeholder="Enter Grand Father Name"></td>
        <script type="text/javascript">
				      	 var f1 = new LiveValidation('gfathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter father name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        <td>  Education Status:</td><td><input type="text" name="educationlevel" id="Edstatus" placeholder="Enter Education Level" ></td></tr>
        	 <script type="text/javascript">
				      	 var f1 = new LiveValidation('Edstatus');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter Education Status"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
        <tr><td>  Sex:</td><td><select name="sex">
									         	<option selected="selected" value="">Select Sex</option>
										         	 <option value="Male">Male</option>
										         	 <option value="Female">Female</option></select></td>
        	<td>Photo</td><td><input type="file" name="photo" required></td></tr>
        <tr><td>  Age:</td><td><input type="text" name="age" id="age" placeholder="Enter Criminal Age"></td>
          <script type="text/javascript">
				      	 var f1 = new LiveValidation('age');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the age"});
					  	 f1.add(Validate.Format,{pattern: /[0-9]/ ,failureMessage: "You allowed to enter number only"});
					  	 f1.add( Validate.Length, { minimum:1, maximum: 2,failureMessage:"the characters must be less than 2" } );
				 		</script>
			<td>  Job:</td><td><input type="text" name="job" id="job"  placeholder="Enter job" ></td></tr>
			           <script type="text/javascript">
			            var f1 = new LiveValidation('job');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the age"});
					  	 f1.add(Validate.Format,{pattern: /[a-zA-Z]/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters length must between 2 and 30 " } );
				 		</script>
        <tr><td><input type="submit" value="Register" name="Register" onclick="return validateemailform()"></td> <td><input type="reset" value="Clear" class="btn"/></td>&nbsp;
        <td></td><td><a href="CriminalCase.php">Add Crime</a></td></tr>
       </form>
    </table>
    <?php
    }
    ?>
			 <?php
					  if(isset($_POST['Register']))
						{	
							$criminal_id=($_POST["criminal_id"]);
							$firstname=($_POST["firstname"]);
							$fathername=$_POST['fathername'];
							$gfathername=$_POST['gfathername'];
							$sex=$_POST['sex'];
							$age=$_POST['age'];
							$phoneno=$_POST['phone'];
							$village=$_POST['village'];
							$kebele=$_POST['kebele'];
							$educationlevel=$_POST['educationlevel'];
							$day=date("Y-m-d");
							$month=date('m');
							$year=date('Y');
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
								$activity="Preventive police Register Criminal[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");			
								$sql="Insert into Criminal values('$criminal_id','$firstname','$fathername','$gfathername','$sex','$age','$phoneno',
							    '$village','$kebele','$educationlevel','$job','$day','$month','$year','$photopath')";
								$insert=mysqli_query($con,$sql);
								if ($insert)
									{
									$x='<script type="text/javascript">alert("criminal is recorded sucessfully !!!!!");
									window.location=\'RegisterCrime.php\';</script>';
									echo $x;
									}
								else
								   {
									$x='<script type="text/javascript">alert("The crime alredy Exist !!!!!");
									window.location=\'RegisterCrime.php\';</script>';
									echo $x;
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
								die("Connection Failed:".mysqli($con));
								}
						?>
						</fieldset>
			           </div>
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
