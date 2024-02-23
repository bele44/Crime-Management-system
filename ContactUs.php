
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
             	<img src="images/nn.jpg" width="80px"height="160px">
             	 <img src="images/aa.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

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
			           <div id="ContentCenter" style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll;">
			           <br/>
					 <div style="margin: 10px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td colspan="2"><center><img src="images/a.jpg" height=130 width=170></center></td></tr>
						<tr><td style="font-weight: bold;">Full Name:</td><td>Inspecter hagos tefera</td></tr>
						<tr><td style="font-weight: bold;">Position:</td><td>Police Head </td></tr>
						<tr><td style="font-weight: bold;">Working Place:</td><td>Head Quarter at mekelle City police station</td></tr>
						<tr><td style="font-weight: bold;">Phone No:</td><td>0912054659 </td></tr>
						<tr><td style="font-weight: bold;">Email:</td><td>hagos@gmail.com</td></tr>
						
				
			
						
						
					</table>
</div>

<div style="margin: 10px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td colspan="2"><center><img src="images/awe.jpg" height=130 width=170></center></td></tr>
						<tr><td style="font-weight: bold;">Full Name:</td><td>Commander daniel girma</td></tr>
						<tr><td style="font-weight: bold;">Position:</td><td>Detective officer</td></tr>
						<tr><td style="font-weight: bold;">Working Place::</td><td>mekelle City police station</td></tr>
						<tr><td style="font-weight: bold;">Phone No</td><td>0912054659</td></tr>
						<tr><td style="font-weight: bold;">Email:</td><td>awe@gmail.com</td></tr>		
					
					</table>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/>

<div style="margin: 10px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td colspan="2"><center><img src="photo/adane.jpg" height=130 width=170></center></td></tr>
						<tr><td style="font-weight: bold;">Full Name:</td><td>Commander gebre hayle</td></tr>
						<tr><td style="font-weight: bold;">Position:</td><td>preventive police </td></tr>
						<tr><td style="font-weight: bold;">Working Place::</td><td>mekelle City kebele 01</td></tr>
						<tr><td style="font-weight: bold;">Phone No</td><td>0912054659</td></tr>
						<tr><td style="font-weight: bold;">Email:</td><td>gebbre@gmail.com</td></tr>
						
				
			
						
						
					</table>
</div>
<div style="margin: 10px;float: left;border:1px Solid #dadcdc;
					 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-top: -15px;">
					<table cellspacing="0">
						
						<tr><td colspan="2"><center><img src="photo/admin.jpg" height=130 width=170></center></td></tr>
						<tr><td style="font-weight: bold;">Full Name:</td><td>Commander gebre girma</td></tr>
						<tr><td style="font-weight: bold;">Position:</td><td>Detective officer</td></tr>
						<tr><td style="font-weight: bold;">Working Place::</td><td>mekelle Cit kebele 01</td></tr>
						<tr><td style="font-weight: bold;">Phone No</td><td>0912054659</td></tr>
						<tr><td style="font-weight: bold;">Email:</td><td>girmaw@gmail.com</td></tr>
					
					</table>
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
