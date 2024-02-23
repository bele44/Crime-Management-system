
<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Preventive Police page</title>
<link  href="css/preventivepolicemystylesheet.css" rel="stylesheet" type="text/css"/>
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
$activity_type="view nomination";
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
				    require("PreventivePoliceMenu.php");
				   echo"<font color=pink size=5px>welcome</font> <br><font color=yellow size=4px>( $fullname )</font>";
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
			    				require("PreventivePoliceSideMenu.php");
			    			  ?>
			  		  </div>	   
				    </td>
				   <td>

			           <div id="ContentCenter" style="border:solid 4px #dldbeg;overflow:scroll;overflow-y: scroll;">
<fieldset style="border: none;">
<legend align="center"><H1><font  style="color: green;">Notice Board</font></H1> </legend>
<?php
$currentdate=date('Y-m-d');
	$sql1=mysqli_query($con,"SELECT * from notice where Exp_date>='$currentdate' order by post_date DESC") ;
	$count=mysqli_num_rows($sql1);
	if($count>0)
	{
	while($row=mysqli_fetch_array($sql1))
	{?>
           <h4 style="margin-left:550px;"><b>Date:</b><?php echo $row["post_date"];?></u></h4>
            <center><u><h3 style="color: #2780d8;"><?php echo $row["title"];?></h3></u></center></p> 
			<font  size="3" color="#00000b"><?php echo $row["file"];?></font><br>
            <font size="4px" color="#00000b"><br><u>Posted By</u>:&nbsp;<?php echo $row["Sender"];?></p></font>
         	<hr>

	<?php
	}
	}
	else
	{
		echo "<center>There is No Posted Notice</center>";
		
	}
?>
</fieldset>
			           </div>
				   </td>
				   <td>
			          <div id="ContentRight">
<img src="images/p5.jpg" width="200px" height="200px">

			    			<?php
							
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