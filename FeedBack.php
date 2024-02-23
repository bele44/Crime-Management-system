
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
</head>
<body>
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
				    require("headermenu.php");
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
				    require("homesidemenu.php");
				?> 

               </div>

			  		  </div>	   
				    </td>
				   <td>
			    <div id="ContentCenter">
					<br/>
					<hr style="color:#c4bcf3; width: 500px;">
					<strong><p style="width: 500px;margin: auto;color: #5e2259;">
					We want to hear from you and strive to make our Website better and user friendly. 
					your Idea is strangth for us
					</p></strong>
					<hr style="color:#c4bcf3; width: 500px;">
					
			<fieldset style="width: 500px;height: 300px;margin: auto;"> 
				<form action="" method="post">
				  
					Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;<input type="email" name="email" id="email" placeholder="Enter your email" size="40"  
							style="height:30px; width:250px;">&nbsp;&nbsp;<br /><br />
						<script type="text/javascript">
				      	 var f1 = new LiveValidation('email');
					  	 //f1.add(Validate.Presence,{failureMessage: "Enter Education Status"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9.@/]+$/ ,failureMessage: "You are not enter correct email format"});
					  	 f1.add( Validate.Length, { minimum:4, maximum: 50,failureMessage:"you enter at list 4 characters " } );
				 		</script>
					
					Comment &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						    &nbsp;&nbsp;<textarea name="description" id="comment" style="height:100px; width:250px;"
							placeholder="Enter your comment......" ></textarea><br /><br />
							&nbsp;&nbsp;&nbsp;&nbsp;
					      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					      &nbsp;&nbsp;&nbsp;&nbsp;
					    <script type="text/javascript">
				      	 var f1 = new LiveValidation('comment');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter you idea on the textbox"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z0-9.]+$/ ,failureMessage: "You enter unwanted character please check it"});
					  	 f1.add( Validate.Length, { minimum:6, maximum: 15,failureMessage:"the characters should be greater than one words" } );
				 		</script>
					<input type="submit" value="Send Comment" name="send"
					 style="height:30px; width:90px;background-color:#c0cbcd">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Reset" style="height:30px; width:90px;background-color:#c0cbcd">
				 </form>
				
			  
			  		<?php
					  if(isset($_POST['send']))
						{	
						$date=date("d/m/Y");
						$email=$_POST['email'];
						$description=$_POST['description'];
						if($con)
						{
							$query="Insert into comment values(' ','$date','$email','unseen','$description')";
							$insert=mysqli_query($con,$query);
							if($insert)	
							{
								$x='<script type="text/javascript">alert("you sent the comment successfully !!");
								window.location=\'FeedBack.php\';</script>';
								echo $x;
							}
							else
								{
								$x='<script type="text/javascript">alert("failed to send the comment!");
								window.location=\'FeedBack.php\';</script>';
								echo $x;
							  }
						}
						else
						die("Connection Failed:");	
						}
						?>
						</fieldset>			   		   
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
				  <?php
				    require("login.php");
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
