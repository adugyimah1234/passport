<!DOCTYPE html>
<html>
<head>
	<title>Passport Application</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="apply" href="apply.php">
	<!-- Link to status.php -->
	<link rel="status" href="status.php">
</head>

<style>
    body {
	font-family: Arial, sans-serif;
	background-color: #fdfdfd;
}

header {
	background-color: red;
	color: #fff;
	padding: 20px;
}


nav ul {
	list-style: none;
	margin: 0;
	padding: 10;
}

nav li {
	display: inline-block;
	margin-right: 20px;
	
}

nav a {
	color: #fff;
	text-decoration: none;
	margin: 0.5em;
	font-style: normal;
}

nav a:hover {
	color:rgb(195, 204, 212);
	background-color: rgb(8, 4, 4);
	padding: 12px;
	border-bottom: 2px solid yellow;
}

main {
	padding: 20px;
}

form label {
	display: block;
	margin-bottom: 5px;
}

form input {
	display: block;
	margin-bottom: 10px;
	padding: 5px;
	border-radius: 3px;
	border: 1px solid #ccc;
}

form button {
	padding: 5px 10px;
	background-color: #007bff;
	color: #fff;
	border: none;
	border-radius: 3px;
	cursor: pointer;
}

.container {
	margin: 50px auto;
	width: 400px;
	text-align: center;
  }
  
  h1 {
	font-size: 36px;
	margin-bottom: 20px;
  }
  

  
  label {
	font-size: 18px;
	margin-bottom: 5px;
  }
  
  input[type="text"], input[type="email"], input[type="password"] {
	font-size: 18px;
	padding: 10px;
	margin-bottom: 20px;
	width: 100%;
	box-sizing: border-box;
  }
  
  button[type="submit"] {
	font-size: 18px;
	background-color: #036303;
	color: white;
	border: none;
	padding: 10px 20px;
	margin-top: 20px;
	cursor: pointer;
  }
  
  p {
	font-size: 16px;
	margin-top: 20px;
  }
  
  a {
	color: #4CAF50;
	text-decoration: none;
  }
  
  footer {
    background-color: red;
    color: white;
    padding: 20px;
    text-align: center;
}
/*Banner for advertisement*/

.banner {
	position:-webkit-sticky;
	left:50 50;
	border: 2px solid #0d1620;
	background-color: #0d1620;
	margin: 5rem;
	padding: 5em;
}
</style>
<body>

	<header>
		<h1>Passport Application</h1>
		<nav>
			<ul>
				<li><a href="first.php">Home</a></li>
				<li><a href="apply.php">Apply</a></li>
				<li><a href="status.php">Check Application Status</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
		<h2>Welcome to Passport Application Platform</h2>
		<p>Please fill out the application form to apply for a passport.</p>
		<form  action="apply.php" method="post">
			<fieldset>
				<legend>Personal Information</legend>
				<label for="fname">First Name:</label>
				<input type="text" id="fname" name="firstName" required>
				<label for="lname">Last Name:</label>
				<input type="text" id="lname" name="lastName" required>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required>
				<label for="dob">Date of Birth:</label>
				<input type="date" id="dob" name="dob" required>
			</fieldset>
			<fieldset>
				<legend>Contact Information</legend>
				<label for="address">Address:</label>
				<textarea id="address" name="address" required></textarea>
				<label for="phone">Phone:</label>
				<input type="tel" id="phone" name="phone" required>
			</fieldset>
			<fieldset>
				<legend>Passport Information</legend>
				<label for="passport-type">Passport Type:</label>
				<select id="passport-type" name="passport-type">
					<option value="regular">Regular</option>
					<option value="diplomatic">Diplomatic</option>
					<option value="official">Official</option>
				</select>
				<label for="passport-number">Passport Number:</label>
				<input type="text" id="passport-number" name="passport-number" required>
				<label for="expiry-date">Expiry Date:</label>
				<input type="date" id="expiry-date" name="expiry-date" required>
			</fieldset>
			<button type="submit" >Submit Application</button>
		</form>
	</main>
	
	<footer>
		<p>&copy; 2023 Passport Application Platform</p>
	</footer>
</body>
</html>

<?php
// Connect to the database
include "config.php";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $passportType = $_POST['passport-type'];
    $passportNumber = $_POST['passport-number'];
    $expiryDate = $_POST['expiry-date'];

    // Prepare and execute the SQL query to insert the data into the database
    $stmt = $conn->prepare("INSERT INTO registered (first_name, last_name, email, dob, address, phone, passport_type, passport_number, expiry_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $firstName, $lastName, $email, $dob, $address, $phone, $passportType, $passportNumber, $expiryDate);
    $stmt->execute();
     
    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Redirect the user to a success page
  
}

?>