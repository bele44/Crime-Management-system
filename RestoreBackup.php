<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Administrator page</title>
<link  href="css/adminmystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("adminheadermenu.php");
				   ?>        <!--end of headermenu -->
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
			    				require("adminstratorsidelink.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>

			           <div id="ContentCenter">
						 <?php
							function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
								{
							    // Connect & select the database
							    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

							    // Temporary variable, used to store current query
							    $templine = '';
							    
							    // Read in entire file
							    $lines = file($filePath);
							    
							    $error = '';
							    
							    // Loop through each line
							    foreach ($lines as $line){
							        // Skip it if it's a comment
							        if(substr($line, 0, 2) == '--' || $line == ''){
							            continue;
							        }
							        
							        // Add this line to the current segment
							        $templine .= $line;
							        
							        // If it has a semicolon at the end, it's the end of the query
							        if (substr(trim($line), -1, 1) == ';'){
							            // Perform the query
							            if(!$db->query($templine)){
							                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
							            }
							            // Reset temp variable to empty
							            $templine = '';
							        }
							    }
							    return !empty($error)?$error:true;
							  }	
							?>
							 <?php $domain="localhost";
								$dbuser="root";
								$dbpass="";
								$dbname="crimerecordsystem";
									 $x=0;
									mysqli_connect($domain,$dbuser,$dbpass) or die(mysqli_error());
									if($con)
									$x=1;
									else
									$x=2;
									if($x==2)
									{
										
									mysqli_query("create database crimerecordsystem") or die(mysql_error());
											echo "<br>Your Database is Successfully created";
									}else if($x==1)

									{ 
									$output = "C:/backup/crimerecordsystem.sql";
									$filePath  = 'C:/backup/crimerecordsystem.sql';
									$restore=restoreDatabaseTables($domain, $dbuser, $dbpass, $dbname, $filePath);
									if($restore)
									 echo"<br>Database Is Successfully Is Restore";
									 else
									 echo"<br>Database Is not Successfully Is Restore";
									}
								?>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			          	<img src="images/2.png" width="200px" height="250px"> <br>
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
						
							}
							?>
			          </div>
			       </td>
			     
		
			</tr>
		 </table>
		</div>	 			   
	  
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
