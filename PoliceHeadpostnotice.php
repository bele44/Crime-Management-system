
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Police Head page</title>
<link  href="css/policeheadmystylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
if(!isset($_SESSION['sun'])&& !isset($_SESSION['spw']))
	header("location:index.php");
else
{
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
$ipaddress=$http_client_ip;
elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
$ipaddress=$http_x_forwarded_for;	
else
$ipaddress=$_SERVER['REMOTE_ADDR'];

// some variable declaration
$start_time = date("d M Y @ h:i:s");
$work_date=date('d-m-Y');
$activity_type="Post notice";
$username=$_SESSION['sun'];
$role=$_SESSION['srole'];
$login_time=$_SESSION['login_time'];
$logout_time="still at work";	
$uid=$_SESSION['seid'];	
$fullname=$_SESSION['fullname'];
$photo=$_SESSION['sphoto'];
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
				    require("PoliceHeadMenu.php");
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
              			<h1>Police head task</h1>
		   	   				 <?php
			    				require("PoliceHeadSide.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>
			           <div id="ContentCenter">
			            <br>
			<?php
					  if(isset($_POST['post']))
						{	
							
							$title=($_POST["title"]);
							$Sender=$_POST['Sender'];
							$post_date=$_POST['post_date'];
							$Exp_date=($_POST["Exp_date"]);
							$file=$_POST['file'];
							if($con)
								{	
								$activity="police head post notice[police head ID:$uid,Name:$fullname]";
								$logsql=mysqli_query($con,"insert into logfiletable values(' ','$uid','$username','$role','$login_time','$logout_time',
								'$start_time','$activity_type','$activity','$ipaddress','$work_date')");
								$sql="Insert into Notice values(' ','$title','$Sender','$post_date','$Exp_date','$file')";
								$insert=mysqli_query($con,$sql);
								if ($insert && $logsql)
									{
									$x='<script type="text/javascript">alert("you post sucessfully !!!");
									window.location=\'PoliceHeadpostnotice.php\';</script>';
									echo $x;
									}
								   else{
									$x='<script type="text/javascript">alert("Sory you are not post the notice!");
									window.location=\'PoliceHeadpostnotice.php\';</script>';
									echo $x;
									}	
								}
								else
								die("Connection Failed:".mysql($con));
								}
						?>
    <br>

		<fieldset style="width: 620px;; margin: auto;">
		<table>
   		 <form  enctype="multipart/form-data" action="" method="POST">
        <tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2572da;"><u> Post Notice</u></h2></td></tr>
        <tr><td>Title</td><td><input type="text" name="title" placeholder=" Enter Title" style="width: 400px;height: 30px;"></td></tr>
        <tr><td>Sender</td><td><input type="text" name="Sender" value="<?php echo $fullname;?>" readonly style="width: 400px;height: 30px;"></td></tr>
        <tr><td>Post Date</td><td><input type="text" name="post_date" value="<?php echo date("Y-m-d");?>" readonly
        style="width:400px;height:30px;"></td></tr>
        <tr><td>Meeting Date</td><td><input type="date" name="Exp_date" style="width: 400px;height: 30px;"></td></tr>
        <tr><td>File</td><td><textarea name="file" placeholder="Enter your file..." style="width: 400px;height: 80px;">
        </textarea></td></tr>
        <tr><td>&nbsp;&nbsp;</td><td><input type="submit" value="Post" name="post" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" value="Clear" ></td></tr>
       </form>
    </table>
	</fieldset>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
			    			<?php
			    			if(isset($_SESSION['sun'])&&isset($_SESSION['spw']))
							{
							$fullname=$_SESSION['fullname'];
							$photo=$_SESSION['sphoto'];
							echo"<img src=$photo width=210px height=200px> <br>";
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
