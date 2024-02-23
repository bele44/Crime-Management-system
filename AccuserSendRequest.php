
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>home  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
</head>
<body>
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
				    require("Accuserheadermenu.php");
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
				    require("accusersidemenu.php");
				?> 

               </div>
              
			  		  </div>


   
				    </td>
				   <td>
				 
			           <div id="ContentCenter" style="overflow-y: scroll;">
				 <fieldset>
				  <table border="0px" width="550px"  >
				  <form action="" method="post">
				    <tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2684d9">Accuser Request form</h2></td></tr>
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
						$query="Insert into nomination values(' ','$firstname','$fathername','$types','$kebele','$village','$date',
						'$description','unseen')";
							$insert=mysql_query($query)or die(mysql_error());
							if($insert)
							echo "you sent the nomination successfully !!!";
							else
							echo" failed to send the nomination!! ";
							
						}
						else
						die("Connection Failed:");	
						}
						?>
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

		<!-- footer--> 
	     <div id="footer">
 				<?php
				    require("footer.php");
				   ?>      

         </div>

	<!--end of main wrapper-->

</div>
</body>
</html>