
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>About Us  page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="wrapper">

      <table width="100%" cellspacing="0px">
        <tr>
           <td>  
             <div id="header">
             	<img src="images/nn.jpg" width="80px"height="160px">
             	 <img src="images/aa.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

             	 
                <img src="images/imag.jpg" width="140px"height="160px">
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
			           <br>
<h2 style="margin-left: 20px;">Well Come to online crime record system for mekelle city</h2>
<p>
In 1913, during the reign of Emperor Minilik II, the Ethiopian police was founded for the first time in our history. A modern police establishment was newly founded in 1934.  mekelle city police station was also established newly as a police force at the same time in 1934. It is the basic unit that looks after the law and order of that area. mekelle city police station is headed by a Station House Officer (S.H.O.) who is generally an inspector from the police department. Under him works a team consisting of a Sub-Inspector, Head Constable and Constables. The station was organized in to five big departments that were detection department, prevention department, head department, human resource management department and council community. </p>
<h2 style="margin-left: 20px;">Mission</h2>
<p>The police Department of Public Safety and Police Services is dedicated to protect and serve our community’s quest for a peaceful and safe existence, free from fear, and with democratic values applied equally to all constituents</p> 
<h2 style="margin-left: 20px;">Vission</h2> 
<p>The Department of Public Safety and Police Services strives to create a level of professionalism, service, and excellence in law enforcement in which our constituents will live, learn, and work.</p>  
Values are the most fundamental beliefs by which an organization operates, and they serve as a basic foundation on which leadership and management are provided and decisions are made.  We believe that:
<h2 style="margin-left: 20px;">Core Value</h2> 
<p>Every life is precious.
Democratic values apply to all.
Every person has individual, equal value.
Ethics and integrity are the foundations of law enforcement.</p>
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
