
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Complaint  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
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
				    require("Complaintheadermenu.php");
				   ?>       <!--end of headermenu -->
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
				    require("Complaintsidemenu.php");
				?> 

               </div>
              
			  		  </div>
				    </td>
				   <td>
			<div id="ContentCenter">
			 <br>
			 <fieldset style="margin: auto; width: 600px;"><table>
			<form action="" method="post" enctype="multipart/form-data">
			<tr><td colspan="2"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u>Complaint Request Form</u></h2></td></tr>
			<tr><td>  Complaint ID:</td><td><input type="text" name="complain_id" id="cid" placeholder="Enter complain's Id" required
					style="width:300px;height:35px;"></td></tr>
						
	 		 <script type="text/javascript">
	      	 var f1 = new LiveValidation('cid');
		  	 f1.add(Validate.Presence,{failureMessage: "Enter complain_id"});
		  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9]+$/ ,failureMessage: "You allowed to enter character and number only"});
		  	 f1.add( Validate.Length, { minimum:1, maximum: 15,failureMessage:"the characters must be less than 15" } );
	 		</script>
			<tr><td>  First Name:</td><td><input type="text" name="firstname" id="firstnname" placeholder="Complain's First name" required
			            style="width:300px;height:35px;"></td></tr>
			<script type="text/javascript">
	      	 var f1 = new LiveValidation('firstnname');
		  	 f1.add(Validate.Presence,{failureMessage: "Enter Education Status"});
		  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
		  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
	 		</script>
			<tr><td>  Father Name:</td><td><input type="text" name="fathername" id="fathername" placeholder="Complain's Father Name" required 
			                        style="width:300px;height:35px;"></tr>
				<script type="text/javascript">
		      	 var f1 = new LiveValidation('fathername');
			  	 f1.add(Validate.Presence,{failureMessage: "Enter fathername"});
			  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
			  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
		 		</script>
			<tr><td>G.Father Name:</td><td><input type="text" name="gfathername" id="gfather"placeholder="Complain's G.Father Name"
			                style="width:300px;height:35px;"></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('gfather');
					  	 f1.add(Validate.Presence,{failureMessage: "grandfather name not empty"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>
			<tr><td> type of complain:</td><td><input type="text" name="complaintype" id="complaintype" placeholder="Complain's type" 
			                  style="width:300px;height:35px;"></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('complaintype');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter complain type"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters must be less than 30" } );
				 		</script>
					<tr><td>Description:</td><td><textarea name="description" rows="8" cols="25" id="dec" placeholder="Enter your nomination..." 
					            style="width:300px;height:60px;">
						</textarea></td></tr>
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('dec');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter your descrpition here"});
					  	 //f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9.]+$/ ,failureMessage: "you enter unwanted character please check it"});
					  	 f1.add( Validate.Length, { minimum:5, maximum: 1000,failureMessage:"you enter at list 5 character " } );
				 		</script>	
					
					<tr><td>&nbsp;&nbsp;</td><td> <input type="submit" value="Send" name="Register"><input type="reset" value="Reset"></td></tr>
				</form></table>
			  
	  		<?php
			  if(isset($_POST['Register']))
				{	
				$complain_id=($_POST["complain_id"]);
				$firstname=($_POST["firstname"]);
				$fathername=($_POST["fathername"]);
				$gfathername=($_POST["gfathername"]);
				$complaintype=($_POST["complaintype"]);
				$description=($_POST["description"]);
				$date=date("d/m/Y");
				if($con)
				{	
				$sql1="Insert into complainrequest values('$complain_id','$firstname','$fathername','$gfathername','$complaintype','$date',' ','unseen'
				,'$description')";
				$insert1=mysqli_query($con,$sql1);
				if ($insert1 )
				{
					
				$x='<script type="text/javascript">alert("Request sucessfully sent !");
				window.location=\'complaintSendRequest.php\';</script>';
				echo $x;
				}
				else
			   	{
					$x='<script type="text/javascript">alert("your ID number is incorrect check the same with your registration ID!");
					window.location=\'complaintSendRequest.php\';</script>';
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
				  <img src="images/giv.gif.jpg" width="200px" height="200px">

			          </div>
			       </td>
			</tr>
		 </table>
			 </div> 			   

		<!-- footer--> 
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
