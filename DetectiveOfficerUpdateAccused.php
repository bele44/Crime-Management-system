<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer Update Accused page</title>
<link  href="css/mystylesheet.css" rel="stylesheet" type="text/css"/>
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
				    require("DetectiveOfficermenu.php");
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
			    				require("DetectiveOfficerSidemenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>

			           <div id="ContentCenter">
			   			   
			      <?php
	                if($con)
	                   {

                   if(isset($_GET['ID']))
	                  {
   							$accused_id=$_GET['ID'];
							$sql="select * from accused where accused_id='$accused_id'";  							                         						
								$recordfound=mysql_query($sql,$con);
								while($row=mysql_fetch_assoc($recordfound))
							{
							echo "<fieldset>";
							echo "<h1 align='center' style='background:#1f618d;color:white;'>Update Accused Profile </h1>";
							echo "<form action='' method=post>
							<table align='center'>
							<tr><td style='font-size: 18px'> ID No:</td><td><input type=text name=accused_id readonly value='".$row["accused_id"]."' 
							 pattern='^[0-9 ]+'style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>First Name:</td><td><input type=text name=firstname value='".$row["firstname"]."'  
							required  style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Father Name:</td><td><input type=text name=fathername value='".$row["fathername"]."' 
							style='height: 28px' ></td></tr>";				
							echo "<tr><td style='font-size: 18px'>G.Father Name:</td><td><input type=text name=gfathername
							 value='".$row["gfathername"]."'style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Sex:</td><td><input type=text name=sex value='".$row["sex"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Age:</td><td><input type=number name=age value='".$row["age"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Phone No:</td><td><input type=number name=phoneno value='".$row["phoneno"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>City:</td><td><input type=text name=city value='".$row["city"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Kebele:</td><td><input type=text name=kebele value='".$row["kebele"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Village:</td><td><input type=text name=village value='".$row["village"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Date:</td><td><input type=date name=date value='".$row["date"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Photo:</td><td><input type=text name=photo value='".$row["photo"]."' 
							style='height: 28px'></td></tr>";
							echo "<tr><td style='font-size: 18px'>Description:</td><td><input type=text name=description 
							value='".$row["description"]."'style='height: 28px'></td></tr>";
							
	
							echo "<tr><td></td><td><input type=submit name=update value=update style='background:#1f618d; 
							color:red; font-size:20px'>";
							echo "</td></tr></table></form>";
				}
			}
			}
				?>
	     
	    <?php
	     	if(isset($_POST["update"]))
	      {
		$accused_id=$_POST['accused_id'];
		$firstname=$_POST['firstname'];
	    $fathername=$_POST['fathername'];
	    $gfathername=$_POST['gfathername'];
	    $sex=$_POST['sex'];
	    $age=$_POST['age'];
	     $phoneno=$_POST['phoneno']; 
	     $city=$_POST['city'];
	      $kebele=$_POST['kebele'];
	       $village=$_POST['village'];
	        $date=$_POST['date'];
	         $photo=$_POST['photo']; 
	         $description=$_POST['description'];
	
       $sql="update accused set firstname='$firstname',fathername='$fathername',gfathername='$gfathername',sex='$sex',age='$age',phoneno='$phoneno',
       city='$city',kebele='$kebele',village='$village',date='$date',photo='$photo',description='$description' where accused_id='$accused_id'";
		$updated=mysql_query($sql,$con);
		if($updated)
		{
			echo " one record updated  successfully!";
			header('location:DetectiveOfficerViewAcussed.php');
		}
			
		else
			echo "Unable to Update!";
	     }
	echo "</fieldset>";
?>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=200px height=200px> <br>";
							echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px> $fullname </font>";
								
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
