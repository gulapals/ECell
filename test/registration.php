<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" href="style.css" type="text/css" media="all">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300|Signika|Boogaloo" rel="stylesheet">
</head>
<body>
	<div class="content">
	<h2>Register here</h2>
		<form action="registration.php" method="post">
			<input type="text" Name="name" placeholder="Enter Your Name" required="">
			<input type="number" Name="phone" placeholder="Enter Your Phone Number" required="">
			<input type="email" Name="email" placeholder="Enter Your Email" required="">
			<select name="dept">
				<option value="" selected>Select Your Department</option>
    			<option value="cse">CSE</option>
    			<option value="arch">Architecture</option>
   	 			<option value="civil">Civil</option>
    			<option value="ece">ECE</option>
    			<option value="eee">EEE</option>
    			<option value="prod">Production</option>
    			<option value="meta">Mettalurgy</option>
    			<option value="ice">ICE</option>
    			<option value="chem">Chemical</option>
    			<option value="mech">Mechanical</option>
  			</select>
  			<select name="year">
				<option value="" selected>Select Your Year</option>
    			<option value="1">First</option>
    			<option value="2">Second</option>
   	 			<option value="3">Third</option>
    			<option value="4">Fourth</option>
  			</select>
  			<input accept="doc/docx/pdf" name="resume" type="file">
			<div class="btn">
				<input type="submit" name="submit" value="REGISTER">
			</div>
		</form>
	</div>
	<div>
	<?php
	if(isset($_POST["submit"])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ecell";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$target_path = "uploads/";
	$target_path = $target_path . basename( $_FILES);
	$sql = "INSERT INTO register (Name, Phone, Email, Dept, Year, Resume) VALUES ('".$_POST["name"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["dept"]."','".$_POST["year"]."', '$target_path')";

	if ($conn->query($sql) === TRUE) {
	echo "<script type= 'text/javascript'>alert('You are successfully registered!');</script>";
	} else {
	echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
	}

	$conn->close();
	}
	?>
	</div>
</body>
</html>