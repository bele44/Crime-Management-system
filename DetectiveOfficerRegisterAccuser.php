
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Detective Officer Register Accused page</title>
<link  href="css/mystylesheet.css" rel="stylesheet" type="text/css"/>
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
		 <div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			<br>
		<form action="" method="post">
		<input type="submit" name="search" value="Search" style="width:70px; height:45px;background-color:#acf7f4;">
		<input type="text" name="searchkey" placeholder="Search by first name" style="width:200px; height:40px;">
		
		</form>
			<br>		   
						<?php
	 if(isset($_POST['search']))
		{
		$searchkey=$_POST["searchkey"];
		if($con)
		{
		$sql="select * from accuser where firstname='$searchkey'";
		$recordfound=mysqli_query($con,$sql); 
		?>
		<table border='1' cellpadding="0" cellspacing="0">
		<tr bgcolor="#dbd5d2"><td colspan="14" align="center"><h3>Accuser Profile</h3></td></tr>
				<tr> 
				<th>Accuser ID</th>
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
		if($row3=mysqli_fetch_array($recordfound))
	      {
				echo"<tr> <td>". $row3["accuser_id"]."</td><td>". $row3["firstname"]."</td> <td>". $row3["fathername"]."</td>
				<td>". $row3["gfathername"]."</td><td>". $row3["sex"]."</td><td>". $row3["age"]."</td><td>". $row3["phoneno"]."</td>
				<td>". $row3["educationlevel"]."</td><td>". $row3["email"]."</td>
				<td>". $row3["kebele"]."</td><td>". $row3["village"]."</td><td>". $row3["date"]."</td><td><img src=". $row3["photo"]."
				 style=width:60px; height:80px;></td>
				<td>". $row3["description"]."</td></tr>";
				
			
	        }
	        echo"</table>";
	        ?>
			<br><br><br>
			<?php	
			}
		}
		?>   
	<?php
	 if(!isset($_POST['search']))
		{
			?>		   
					   
			   <fieldset>
			   <table border="0px" width="550px" >
				<form action="" method="post" enctype="multipart/form-data" name="myForm">
				  
					<tr><td colspan="4"><h2 style="font-size:25px;text-align: center; color:#2572da; "><u>Accuser Registration Form</u></h2></td></tr>
					<tr><td>Accuser ID:</td><td><input type="text" name="accuser_id" id="accuser_id" placeholder="Enter accuser ID Number"></td>
					     <script type="text/javascript">
				      	 var f1 = new LiveValidation('accuser_id');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the Accuser id "});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter numbe only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					    <td>  Education Level:</td><td><input type="text" name="educationlevel" id="educationlevel" placeholder="Enter Education level"
								></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('educationlevel');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter  Education Level"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter numbe only"});
					  	 f1.add( Validate.Length, { minimum:6, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  First Name:</td><td><input type="text" name="firstname" id="firstname" placeholder="Enter First Name"></td>
						 <script type="text/javascript">
				      	 var f1 = new LiveValidation('firstname');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter  Accuser first name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
						<td>  Email:</td><td><input type="text" name="email" id="email" placeholder="Enter email"></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('email');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter valid email address"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z@+.]+$/ ,failureMessage: "You allowed to enter numbe and charchter "});
					  	 f1.add( Validate.Length, { minimum:8, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  Father Name:</td><td><input type="text" name="fathername" id="fathername" placeholder="Enter Father Name"></td>
					 	<script type="text/javascript">
				      	 var f1 = new LiveValidation('fathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter  Accuser faher name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					 		<td>  Kebele:</td><td><input type="text"name="kebele" id="kebele"placeholder="Enter kebele"></td></tr>
					 	<script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter Accuser kebele"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  G.Father Name:</td><td><input type="text" name="gfathername" id="gfathername"placeholder="Enter Grand Father Name"></td>
					    <script type="text/javascript">
				      	 var f1 = new LiveValidation('gfathername');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter  Accuser grand_faher name"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter charachter only"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					 		<td>  Village:</td><td><input type="text" name="village" id="village" placeholder="Enter village "></td></tr>
						 <script type="text/javascript">
				      	 var f1 = new LiveValidation('village');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter accuser velliage"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>  Sex:</td><td><select name="sex" required>
									         	<option selected="selected" value="">Select Sex</option>
										         	 <option value="Male">Male</option>
										         	 <option value="Female">Female</option></select></td>
									         	 <td>  Date:</td><td><input type="date" name="date" required></td></tr>
					<tr><td>  Age:</td><td><input type="text" name="age" id="age" placeholder="Enter Criminal Age"></td>
					 <script type="text/javascript">
				      	 var f1 = new LiveValidation('age');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the age"});
					  	 f1.add(Validate.Format,{pattern: /[0-9]/ ,failureMessage: "You allowed to enter number only"});
					  	 f1.add( Validate.Length, { minimum:1, maximum: 2,failureMessage:"the characters must be less than 2" } );
				 		</script>
						<td>Phone No:</td><td><input type="text" name="phone"id= "phone" placeholder="Enter Phone Number"pattern="[0-9+]+"></td></tr>
							<script type="text/javascript">
				      	 var f1 = new LiveValidation('phoneno');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter the phone nuber"});
					  	 f1.add(Validate.Format,{pattern: /^[+ 0-9]+$/ ,failureMessage: "You allowed to enter numberonly"});
					  	 f1.add( Validate.Length, { minimum:10, maximum: 13,failureMessage:"the characters must be less than 2 and greaterthan1" } );
				 		</script>
					<tr><td>  Photo:</td><td><input type="file" name="photo" value="upload photo" required></td>
					<td>  Description:</td><td><textarea name="description" id="description"  placeholder="...
									Enter your description here..... "style="width: 200px;height: 60px;" required></textarea></td></tr> 
									 <script type="text/javascript">
				      	 var f1 = new LiveValidation('description');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter Accuser description"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
					  	 f1.add( Validate.Length, { minimum:10, maximum: 100,failureMessage:"the characters must be less than 15" } );
				 		</script>  
				 	<tr><td><input type="submit" value="Register" name="Register" onclick="return validateemailform()"></td>
				 	<td><input type="reset" value="Reset">	
					</td><tr>
				</form>
			  
			   </table>
  <?php
    }
    ?>
			 <?php
					  if(isset($_POST['Register']))
						{	
							$accuser_id=($_POST["accuser_id"]);
							$firstname=$_POST["firstname"];
							$fathername=$_POST['fathername'];
							$gfathername=$_POST['gfathername'];
							$sex=$_POST['sex'];
							$age=$_POST['age'];
							$phoneno=$_POST['phone'];
							$educationlevel=$_POST['educationlevel'];
							$email=$_POST['email'];
							$kebele=$_POST['kebele'];
							$village=$_POST['village'];
							$date=$_POST['date'];
							$description=$_POST['description'];
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
								$sql="Insert into accuser values('$accuser_id','$firstname','$fathername','$gfathername','$sex','$age','$phoneno',
							    '$educationlevel','$email','Active','$kebele','$village','$date','$photopath','$description')";
								$insert=mysqli_query($con,$sql);
								if($insert)
								{
									$x='<script type="text/javascript">alert("accuser is recorded sucessfully !");
										window.location=\'DetectiveOfficerRegisterAccuser.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("no recorr is inserted !");
										window.location=\'DetectiveOfficerRegisterAccuser.php\';</script>';
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
