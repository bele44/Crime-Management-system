
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
			     ?>       
     		 </div>
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
				 
			           <div id="ContentCenter" style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
			           
			           <img src="photo/news.jpg">
			           
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
