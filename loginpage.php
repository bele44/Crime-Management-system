<!DOCTYPE html>
<html>
<head>
<title>home page</title>
<link  href="css/mystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="wrapper1">
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
				   ?>        <!--end of headermenu -->
      		  </div> 
		  </td>
		</tr>
	  </table>	
	    
	 		   
         <table width="100%"> 
          <tr bgcolor="#e7c7df">
             <td>      
               <div id="maincontent">
            	 <td>
             		 <div id="ContentLeft">
              			<h1>Welcome To our Home Page</h1>
		   	   				 <?php
			    				require("adminstratorsidelink.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			   
			           </div>
				   </td>
				   <td bgcolor="#e7c7df">
			          <div id="ContentRight">
			              <?php
			    			require("login.php");
			    		   ?>			   
			          </div>
			       </td>
			     </div>
			  </td>
			</tr>
		 </table>
			 			   
	  
	     <div id="footer">
           <table>
              <tr>
                <td>	     
                <h3 align="center">Copyright &copy; All Rights Reserved!. 2013 - Criminal Record Management System. <br></h1>
		        </td> 
		    </tr>
	      </table>      
             <!--end of footer -->
         </div>

	<!--end of main wrapper-->

</div>
</div>
</body>
</html>
