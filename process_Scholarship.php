<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Scholarship Form</title>
</head>
<body>
	<?php 
		$errorCount = 0;
		$firstName = validateInput($_POST["fName"], "First Name");
		$lastName = validateInput($_POST["lName"], "Last Name");

		if($errorCount > 0){
			echo "<p>Please re-enter the information below</p>";
			redisplayForm($firstName, $lastName);
		}
		else {
			echo "<p>Thank you for filling out the scholarship form, $firstName $lastName.</p>";
		
		}
		
		
		function displayRequired($fieldName){
			echo "<p>The Field \"$fieldName\" is required.</p><br/>";
		}

		function validateInput($data, $fieldName){
			global $errorCount;
			if(empty($data)){
				displayRequired($fieldName);
				++$errorCount;
				$retval = "";
			}
			else {
				// Only clean up the input if it isn't empty
				$retval = trim($data);
				$retval = stripslashes($retval);
			}
			return $retval;
		}

		function redisplayForm($firstName, $lastName){
			?>
			<h2 style="text-align: center;">Scholarship Form</h2>
			<form name="Scholarship" action="process_Scholarship.php" method="post">
				<p>First Name: <input type="text" name="fName" value="<?php echo $firstName; ?>"/></p>
				<p>Last Name: <input type="text" name="lName" value="<?php echo $lastName; ?>"/></p>
				<p><input type="reset" value="Clear Form" />&nbsp;&nbsp;<input type="submit" value="Send Form"></p>
			</form>
			<?php
		}
	 ?>
</body>
</html>