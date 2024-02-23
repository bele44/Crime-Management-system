<?php
session_start();
include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Detective Officer View Witness page</title>
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
             	<img src="images/nn.jpg" width="80px"height="160px">
             	 <img src="images/aa.jpg" width="80%px"height="100%px" alt="My cool photo" style="border-radius:15px; -moz-border-radius: 15px;"/>

                <img src="images/a.jpg" width="140px"height="160px">
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
			           <br>
			   	<div style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll">
				<fieldset style="width: 600px;margin: auto;">
			   <table border="0px" width="550px" >
				<form action="" method="post" enctype="multipart/form-data">
				  
					<tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #296da0;"><u>First Information Report</u></h2></td></tr>
					<tr><td>  Accuser ID:</td><td><input type="text" name="accuser_id" placeholder="Enter accuser ID " 
					style="width: 400px;height: 30px;"pattern="[a-zA-Z0-9/_.\-+]+" required></td></tr>
					<tr><td>  Accused ID:</td><td><input type="text" name="accused_id" placeholder="Enter accused id" required 
					style="width: 400px;height: 30px;"></td></tr>
					<tr><td>  Witness ID:</td><td><input type="text" name="witness_id" placeholder="Enter witness id" required 
					style="width: 400px;height: 30px;"></td></tr>
					
					<tr><td>  Crime Type:</td><td><input type="text" name="crimetype" placeholder="Enter crime type" required 
					style="width: 400px;height: 30px;"></td></tr>
					<tr><td>  Crime Level:</td><td><select name="crimelevel" id="crimelevel"style="width: 400px;height: 30px;" required>
										         <option selected="selected" value="">Select Crime type</option>
										         	 <option value="Felony">Felony</option>
										         	 <option value="simplecrime">Simple Crime</option>
									         	 </select></td></tr>
					<tr><td>  Description:</td><td><textarea name="description" cols="20px" rows="7px" placeholder="Enter your description here
					... " required style="width: 400px;height: 30px;">
					</textarea></td></tr>                        
					<tr><td></td>
					<td><input type="submit" value="Register" name="Register">
					<input type="reset" value="Reset">	
					</td>
					</tr>
				 
				</form>
			  
			   </table>
			 <?php
					  if(isset($_POST['Register']))
						{	
							$accuser_id=($_POST["accuser_id"]);
							$accused_id=($_POST["accused_id"]);
							$witness_id=$_POST['witness_id'];
							$crimetype=($_POST["crimetype"]);
							$crimelevel=$_POST['crimelevel'];
							$description=$_POST['description'];
							if($con)
								{		
							   $sql="Insert into firstinformationreport values(' ','$accuser_id','$accused_id','$witness_id','$crimetype'
							   ,'$crimelevel','$description')";
								$insert=mysqli_query($con,$sql);
								if($insert)
									{$x='<script type="text/javascript">alert("recorded sucessfully !");
										window.location=\'FirstInformationRepport.php\';</script>';
										echo $x;
									}
									else
								   	{
										$x='<script type="text/javascript">alert("no record is inserted !");
										window.location=\'FirstInformationRepport.php\';</script>';
										echo $x;
									}
									}
								else
								die("Connection Failed:".mysqli($con));
								}
						?>
						</fieldset>
						</div>
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
