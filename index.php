
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>online crime record system</title>
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

                <img src="images/f.jpg" width="140px"height="160px">

		    	 <?php
			      require("header.php");
			     ?>       
     		 </div>
     		 <br>
		   </td>
		  </tr>

         <tr>
           <td>
    		  <div id="headermenu">
					<?php
				    require("headermenu.php");
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
				    require("homesidemenu.php");
				?> 

               </div>
              
			  		  </div>


   
				    </td>
				   <td>
				 
			           <div id="ContentCenter">
			           <div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			           <?php
				    //require("Animation.php");
				   ?>
				   <h1>Mekelle city police station</h>
				   <p> Mekelle city police station is a building which serves to accommodate police officers and other members of staff. These buildings often contain offices and accommodation for personnel and vehicles, along with locker rooms, temporary holding cells and interview/interrogation rooms.</p>
				   <h2 style="margin-left: 40px;">Location<h2>
				   <p> Mekelle city police station is a building which serves to accommodate police officers and other members of staff. These buildings often contain offices and accommodation for personnel and vehicles, along with locker rooms, temporary holding cells and interview/interrogation rooms.</p>
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
