
	<html>
	<head>
	<script src="validation.js" type="text/javascript"></script>
	</head>
	<body>
	<fieldset style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;border-top-left-radius: 10px;border-top-right-radius: 10px;">
	
	<form action="insertnomination.php" method="post">
<table border="0px" width="550px"  >
	<tr><td colspan="4"><h2 style="font-size:25px;text-align: center;color: #2684d9"><u>Give Nomination about location of a person</u></h2></td></tr>

	<tr><td>Zone:</td><td><input type="text" name="zone" id="zone" placeholder="Enter zone a person found"style="width:400px;
	height: 30px;"></td></tr>
	<script type="text/javascript">
				      	 var f1 = new LiveValidation('zone');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter zone the person found"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>

	<tr><td>  Woreda:</td><td><input type="text" name="woreda"id="woreda" placeholder="Enter Woreda a person found" 
	style="width: 400px;height: 30px;"required></td></tr>
	<script type="text/javascript">
				      	 var f1 = new LiveValidation('woreda');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter woreda the person found"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>

	<tr><td>  Kebele</td><td><input type="text" name="kebele" id="kebele" placeholder="Enter Kebele a person found"
	style="width: 400px;height: 30px;" required></td></tr>
	<script type="text/javascript">
				      	 var f1 = new LiveValidation('kebele');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter kebele the person found"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>

	<tr><td>  Village:</td><td><input type="text" name="village" id="village" placeholder="Enter Village a person found"
	style="width: 400px;height: 30px;" required></td></tr>
	<script type="text/javascript">
				      	 var f1 = new LiveValidation('village');
					  	 f1.add(Validate.Presence,{failureMessage: "Enter village the person found"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>

	<tr><td>  Describe about position of a criminal:</td><td><textarea name="description" id="desc" placeholder="describe position of a criminal..."
	style="width: 400px;height: 60px;" required ></textarea></td></tr>
	<script type="text/javascript">
				      	 var f1 = new LiveValidation('desc');
					  	 f1.add(Validate.Presence,{failureMessage: "describe other detail about the person position"});
					  	 f1.add(Validate.Format,{pattern: /^[a-zA-Z]+$/ ,failureMessage: "You allowed to enter character only"});
					  	 f1.add( Validate.Length, { minimum:2, maximum: 15,failureMessage:"the characters must be less than 15" } );
				 		</script>

	<tr><td>&nbsp; </td><td><input type="submit" value="send" name="send" style="height:40px; width:90px;background-color:#c0cbcd">
	&nbsp;&nbsp;
	<input type="reset" value="Reset" style="height:40px; width:90px;background-color:#c0cbcd"></td></tr>
	</table>
	</form>

	</fieldset> 		

	</body>
	</html>
