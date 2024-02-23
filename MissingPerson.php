
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
				    require("login.php");
				   ?>

               </div>
			   	                  
              
			  	 <center>
			  	 <h1 style="display:block;line-height:30px;font-size:15px;font-weight:bold;background:#2f306c;color:white;">Calander</h1></center>
			  	 <?php
				    require("calander.php");
				 ?>               
			  		  </div>


   
				    </td>
				   <td>
			           <div id="ContentCenter">
			   <!--animation code -->
	   			   <?php
				    require("Animation.php");
				  ?> 
				  
			<fieldset style="border-radius: 10px;background-color: #ffffff;height: auto; width: 1px;">
				<form action="" method="post">
				  <table border="0px" width="500px" >
					<tr>
					<td colspan="2"><h2 style="font-size:25px;text-align: center;">Give Nomination Here</h2></td></tr>
					<tr><td>  First Name:</td><td><input type="text" name="firstname" placeholder="Enter your first name" required></td></tr>
					<tr><td>  Father Name:</td><td><input type="text" name="fathername" placeholder="Enter your father name" required></td></tr>
					<tr><td>  Kebele:</td><td><input type="kebele" name="kebele" placeholder="Enter your email" required></td></tr>
					<tr><td>  Date:</td><td><input type="date" name="date" required></td></tr>
					<tr><td>suggestion:</td><td><textarea name="suggestion" cols="20" rows="6" placeholder="Enter your suggestion......" required></textarea></td></tr>
					<tr><td>&nbsp; </td><td><input type="submit" value="send" name="send">&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" value="Reset"></td></tr>
				  </table>
				</form>
			
			  		
			  		<?php
					  if(isset($_POST['send']))
						{	$firstname=$_POST["firstname"];
							$fathername=$_POST['fathername'];
							$kebele=$_POST['kebele'];
							$date=$_POST['date'];
							$suggestion=$_POST['suggestion'];
						if($con)
						{
							$query="Insert into nomination values('$firstname','$fathername','$kebele','$date','$suggestion')";
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
					</fieldset>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
  				  <?php
				    require("time.php");
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
