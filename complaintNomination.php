
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>home  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
<script src="validation.js" type="text/javascript"></script>
	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="src/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
loadingImage : 'src/loading.gif',
closeImage   : 'src/closelabel.png'
})
})
</script> 
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
					  <br>
				<fieldset style="width: 700px;margin: auto;">
				  <table border="0px" width="550px"  >
				  <form action="" method="post">
				  
				    <tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2684d9"><u>Give Nomination</u></h2></td></tr>
				
					<tr><td>First Name:</td><td><input type="text"name="firstname"id="nfirstname" placeholder="type your first name"style="width:400px;
					height: 30px;"></td></tr>
					<script type="text/javascript">
				       var f1 = new LiveValidation('nfirstname');
					   //f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
					   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " please Enter only characters"});
					   f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 	</script>
					<tr><td>  Father Name:</td><td><input type="text" name="fathername"id="nfathername" placeholder="type your father name" 
					style="width: 400px;height: 30px;"required></td></tr>
					<script type="text/javascript">
				       var f1 = new LiveValidation('nfathername');
					   //f1.add(Validate.Presence,{failureMessage: " It cannot be empty"});
					   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " please Enter only characters"});
					   f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 	</script>
					<tr><td>  Type of Crime</td><td><input type="text" name="types"id="crimetypes" placeholder="type of nomination"
					style="width: 400px;height: 30px;" required></td></tr>
					<script type="text/javascript">
				       var f1 = new LiveValidation('crimetypes');
					   f1.add(Validate.Presence,{failureMessage: " crime type should not be empty"});
					   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " please Enter only characters"});
					   f1.add( Validate.Length, { minimum:1, maximum: 40,failureMessage:"the characters must be less than 50" } );
				 	</script>
					<tr><td>  Kebele Crime Occured:</td><td><input type="text" name="kebele"id="crimecommitedkebele" placeholder="kebele crime occured"
					style="width: 400px;height: 30px;" required></td></tr>
					<script type="text/javascript">
				       var f1 = new LiveValidation('crimecommitedkebele');
					   f1.add(Validate.Presence,{failureMessage: " Enter which kebele the action occured"});
					   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " please Enter either characters or number only"});
					   f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters must be less than 50" } );
				 	</script>
					<tr><td>  Village Crime Occured:</td><td><input type="text" name="village"id="villagecrimeoccured" 
												placeholder="village the crime occured"style="width: 400px;height: 30px;" required></td></tr>
					<script type="text/javascript">
				       var f1 = new LiveValidation('villagecrimeoccured');
					   f1.add(Validate.Presence,{failureMessage: " Enter which Village the action occured"});
					   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " please Enter only characters"});
					   f1.add( Validate.Length, { minimum:1, maximum: 50,failureMessage:"the characters must be less than 50" } );
				 	</script>
					<tr><td>  Crime Commited Date:</td><td><input type="date" name="date"style="width: 400px;height: 30px;" required></td></tr>
					<tr><td>  Description:</td><td><textarea name="description" placeholder="Enter your suggestion......"
					style="width: 400px;height: 60px;" required ></textarea></td></tr>
					<script type="text/javascript">
				       var f1 = new LiveValidation('crimecommitedkebele');
					   f1.add(Validate.Presence,{failureMessage: " please clarify your about the action"});
					   f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: " please Enter either characters or number only"});
					   f1.add( Validate.Length, { minimum:2, maximum: 30,failureMessage:"the characters must be less than 50" } );
				 	</script>
					<tr><td>&nbsp; </td><td><input type="submit" value="send" name="send" style="height:40px; width:100px;background-color:#c0cbcd">
					&nbsp;&nbsp;
					<input type="reset" value="Reset" style="height:40px; width:100px;background-color:#c0cbcd"></td></tr>
				  </form>
				</table>
			
			</fieldset> 		
			  		<?php
					  if(isset($_POST['send']))
						{	
						$firstname=$_POST["firstname"];
						$fathername=$_POST["fathername"];
						$types=$_POST["types"];
						$kebele=$_POST["kebele"];
						$village=$_POST["village"];
						$date=$_POST["date"];
						$description=$_POST["description"];
						if($con)
						{
						$query="Insert into nomination values(' ','$firstname','$fathername','$types','$kebele','$village','$date','$description','unseen','')";
							$insert=mysqli_query($con,$query)or die(mysqli_error());
							if($insert)
							{
								$x='<script type="text/javascript">alert("you sent the nomination successfully ");
								window.location=\'complaintNomination.php\';</script>';
								echo $x; 
							}
							else
							{
								$x='<script type="text/javascript">alert("failed to send the nomination!!");
								window.location=\'complaintNomination.php\';</script>';
								echo $x; 
							}
						}
						else
						die("Connection Failed:");	
						}
						?>
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
