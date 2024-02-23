<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Register Crime page</title>
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
$activity_type="Register Crime";
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
			     
			     ?>   
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
		<fieldset >
		<h2 style="color: #5085cd;"><u>Crime Registration Form</u></h2>
		<table>
   		 <form  enctype="multipart/form-data" action="" method="POST">
					<tr><td>  Criminal ID:</td><td><input type="text" name="criminal_id" id="criminal_id" placeholder="Enter Criminal id"></td></tr>
					<script type="text/javascript">
				      	 var f1 = new LiveValidation('criminal_id');
					  	 f1.add(Validate.Presence,{failureMessage: "ID number is not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[./\ a-zA-Z0-9]+$/ ,failureMessage: "You enter unneccessary character check it"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 20,failureMessage:"the characters must be less than 20" } );
				 		</script>
					<tr><td>  Crime Type:</td><td><input type="text" name="crimetype" id="crimetype" placeholder="Enter Crime Type"></td></tr>
					<script type="text/javascript">
				      	 var f1 = new LiveValidation('crimetype');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter crimetype"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters must be less than 30" } );
				 		</script>
					<tr><td>  Crime Level:</td><td><select name="crimelevel" id="crimelevel" required>
										         <option selected="selected" value="">Select Crime type</option>
										         	 <option value="Felony">Felony</option>
										         	 <option value="simplecrime">Simple Crime</option>
									         	 </select></td></tr>
					<tr><td>Crime_Commited kebele:</td><td><input type="text" name="kebele" id="kebele"placeholder="Crime commited kebele" ></td></tr>
					<script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter which kebele crime occured"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character or numbe only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
					<tr><td>Crime_Commited village:</td><td><input type="text"name="village"id="village"placeholder="Crime commited village"></td></tr>
					<script type="text/javascript">
				      	 var f1 = new LiveValidation('village');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter village the crime commited"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character or numbe only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 20,failureMessage:"the characters must be less than 20" } );
				 		</script>
					<tr><td>  Crime_Commited Month:</td><td><select name="month" id="month" required>
										         <option selected="selected" value="">Select Month</option>
										         <option value="01">September</option>
										         <option value="02">October</option>
										         <option value="03">November</option>
										         <option value="04">December</option>
										         <option value="05">January</option>
										         <option value="06">February</option>
										         <option value="07">March</option>
										         <option value="08">April</option>
										         <option value="09">May</option>
										         <option value="10">June</option>
										         <option value="11">July</option>
										         <option value="12">August</option>
									         	 </select></td></tr>
					<tr><td>  Crime_Commited Date:</td><td><select name="date">
										         <option selected="selected" value="">Select Date</option>
										         <option value="01">01</option>
										         <option value="02">02</option>
										         <option value="03">03</option>
										         <option value="04">04</option>
										         <option value="05">05</option>
										         <option value="06">06</option>
										         <option value="07">07</option>
										         <option value="08">08</option>
										         <option value="09">09</option>
										         <option value="10">10</option>
										         <option value="11">11</option>
										         <option value="12">12</option>
										         <option value="13">13</option>
										         <option value="14">14</option>
										         <option value="15">15</option>
										         <option value="16">16</option>
										         <option value="17">17</option>
										         <option value="18">18</option>
										         <option value="19">19</option>
										         <option value="20">20</option>
										         <option value="21">21</option>
										         <option value="22">22</option>
										         <option value="23">23</option>
										         <option value="24">24</option>
										         <option value="25">25</option>
										         <option value="26">26</option>
										         <option value="27">27</option>
										         <option value="28">28</option>
										         <option value="29">29</option>
										         <option value="30">30</option>
									         	 </select></td></tr>
					<tr><td>  Photo Show the action:</td><td><input type="file" name="photo"></td></tr>         
					<tr><td>  Description :</td><td><textarea name="description" id="desc" rows="6" cols="20" placeholder="Enter detail description" 
					          ></textarea></td></tr>
					    <script type="text/javascript">
				      	 var f1 = new LiveValidation('desc');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter some Explanation about the crime"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter numbe only"});
					  	 f1.add( Validate.Length, { minimum:10, maximum: 1000,failureMessage:"the characters must be less than 1000" } );
				 		</script>
					<tr><td><input type="submit" value="Register" name="Register"></td><td><input type="reset" value="Reset"></td></tr>
      			
       </form>
    	</table>
			 <?php
					  if(isset($_POST['Register']))
						{	
							$criminal_id=($_POST["criminal_id"]);
							$crimetype=($_POST["crimetype"]);
							$crimelevel=$_POST['crimelevel'];
							$kebele=$_POST['kebele'];
							$village=$_POST['village'];
							$recorddate=date("d-m-Y");
							$date=$_POST["date"];
							$month=$_POST["month"];
						    $year=date('Y');
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
									$criminal="select * from criminal";
									$recordfound=mysqli_query($con,$criminal);
									while($row = mysqli_fetch_assoc($recordfound))
									{
										$cid=$row["criminal_id"];
									}
									
								$activity="Preventive police Register Crime[Police ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");	
								$sql="Insert into criminalcase values(' ','$criminal_id','$crimetype','$crimelevel','$kebele',
								'$village','$recorddate','$date','$month','$year','$description','$photopath')";
								$insert=mysqli_query($con,$sql);
								if ($insert)
									{
									$x='<script type="text/javascript">alert("criminal case is recorded sucessfully !!");
									window.location=\'CriminalCase.php\';</script>';
									echo $x;
									}
								else
								   {
									$x='<script type="text/javascript">alert("no recorded is inserted !!!!!");
									window.location=\'CriminalCase.php\';</script>';
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
