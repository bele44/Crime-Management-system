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
			  
							<script type = "text/javascript" >
							 function preventBack()
							 {
							 window.history.forward();
							 } 
							 setTimeout("preventBack()", 0); 
							 window.onunload=function(){null};
							  </script> 
																
							<?php
							$tables = array();
							$query = mysqli_query($con,'SHOW TABLES');
							while($row = mysqli_fetch_row($query))
							{
							     $tables[] = $row[0];
							}

							$result = "";
							foreach($tables as $table)
							{
							$query = mysqli_query($con,'SELECT * FROM '.$table);
							$num_fields = mysqli_num_fields($query);
							$result .= 'DROP TABLE IF EXISTS '.$table.';';
							$row2 = mysqli_fetch_row(mysqli_query($con,'SHOW CREATE TABLE '.$table ));
							$result .= "\n\n".$row2[1].";\n\n";

							for ($i = 0; $i < $num_fields; $i++)
							 {
							while($row = mysqli_fetch_row($query))
							{
							   $result .= 'INSERT INTO '.$table.' VALUES(';
							     for($j=0; $j<$num_fields; $j++)
							     {
							       $row[$j] = addslashes($row[$j]);
							       $row[$j] = str_replace("\n","\\n",$row[$j]);
							       if(isset($row[$j]))
							       {
									   $result .= '"'.$row[$j].'"' ; 
									}
									else
									{ 
										$result .= '""';
									}
									if($j<($num_fields-1))
									{ 
										$result .= ',';
									}
							    }
							   	$result .= ");\n";
							}
							}
							$result .="\n\n";
							}

							//Create Folder
							$folder = 'C:/backup/';
							if (!is_dir($folder))
							mkdir($folder, 0777, true);
							chmod($folder, 0777);

							//$date = date('m-d-Y-h-m-s'); 
							$filename = $folder."backup"; 

							$handle = fopen($filename.'.sql','w+');
							fwrite($handle,$result);
							fclose($handle);
							?>

								
								<?php
								
							        echo "<script>alert('Database Backed Up Successfully!');</script>.</a> </h2>";
							        echo "Path: ".$filename."";
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
