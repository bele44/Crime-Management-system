<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>developer page</title>
<link  href="css/mystylesheethome.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="wrapper">
      <table width="100%" cellspacing="0px">
        <tr>
           <td>  
             <div id="header">
             	<img src="images/im.jpg" width="80px"height="160px">
             	 <img src="images/log.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

                <img src="images/f.jpg" width="140px"height="160px">
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

<h3><font color="green">Developed By</font></h3>
<font color="magenta">
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" href="#collapse3" data-parent="#accordion2" data-toggle="collapse"style="color:blue"><h2>G/mariam T/haymanot</h2></a>
</div>
<div id="collapse3" class="accordion-body collapse">
<div class="accordion-inner">
<div class="user_image"><img src="images/dor2.jpg" width="200" height="250"align="left"></div>
<p><font color="green">&nbsp;<b>FirstName</b>:&nbsp;G/mariam</font></p>
<p><font color="green">&nbsp;<b>middleName</b>:&nbsp;T/haymanot</font></p>
<p><font color="green">&nbsp;<b>Position</b>:&nbsp;Student</font></p>
<p><font color="green"><b>Department</b>:&nbsp;Information Technology</font></p>
<p><font color="green"><b>Address</b>:&nbsp;Assosa University</font></p>
<p><font color="green"><b>Phone_No</b>:&nbsp;+251966050572</font></p>
<p><font color="green"><b>Email</b>:&nbsp;gtt248327@gmail.com</font></p>
</div>
</div>
</div>
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" href="#collapse3" data-parent="#accordion2" data-toggle="collapse"style="color:blue"><h2>Afaf Abdela</h2></a>
</div>
<div id="collapse3" class="accordion-body collapse">
<div class="accordion-inner">
<div class="user_image"><img src="images/mar.jpg" width="200" height="250"align="left"></div>
<p><font color="green">&nbsp;<b>FirstName</b>:&nbsp;Afaf</font></p>
<p><font color="green">&nbsp;<b>middleName</b>:&nbsp;Abdela</font></p>
<p><font color="green">&nbsp;<b>Position</b>:&nbsp;Student</font></p>
<p><font color="green"><b>Department</b>:&nbsp;Information Technology</font></p>
<p><font color="green"><b>Address</b>:&nbsp;Assosa University</font></p>
<p><font color="green"><b>Phone_No</b>:&nbsp;+25136907268</font></p>
<p><font color="green"><b>Email</b>:&nbsp;afafa@gmail.com</font></p>
</div>
</div>
</div>
	  </div>
<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" href="#collapse5" data-parent="#accordion2" data-toggle="collapse"style="color:blue"><h2>Sumuya Mohhamed</h2></a>
</div>
<div id="collapse5" class="accordion-body collapse">
<div class="accordion-inner">
<div class="user_image"><img src="images/hab.jpg" width="200" height="250"align="left"></div>
<p><font color="green">&nbsp;<b>FirstName</b>:&nbsp;Sumuya</font></p>
<p><font color="green">&nbsp;<b>LastName</b>:&nbsp;Mohhamed</font></p>
<p><font color="green">&nbsp;<b>Position</b>:&nbsp;Student</font></p>
<p><font color="green"><b>Department</b>:&nbsp;Information Technology</font></p>
<p><font color="green"><b>Address</b>:&nbsp;Assosa university</font></p>
<p><font color="green"><b>Phone_No</b>:&nbsp;+251939051957</font></p>
<p><font color="green"><b>Email</b>:&nbsp;sumuya@gmail.com</font></p>
</div>
</div>
</div>
</div>
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