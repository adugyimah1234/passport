<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
  .signup-container {
  width: 360px;
  margin: auto;
  background-color: #fff;
  padding: 40px 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  text-align: center;
  animation: slide-up 0.6s ease-out;
}

@keyframes slide-up {
  from {
    transform: translateY(200%);
  }
  to {
    transform: translateY(0);
  }
}

.signup-container h2 {
  margin: 0 0 20px 0;
  color: #333;
  text-transform: uppercase;
  font-size: 22px;
}

.signup-container input[type="text"],
.signup-container input[type="email"],
.signup-container input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

.signup-container input[type="text"]:focus,
.signup-container input[type="email"]:focus,
.signup-container input[type="password"]:focus {
  outline: none;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
}

.button-container {
  display: flex;
  justify-content: center;
  align-items: center;
}

.button-container button[type="submit"] {
  background-color: #333;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
  transition: all 0.3s ease-in-out;
}

.button-container button[type="submit"]:hover {
  transform: scale(1.1);
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.links-container {
  margin-top: 20px;
  font-size: 14px;
}

.links-container a {
  color: #333;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
}

.links-container a:hover {
  color: #1E90FF;
}

</style>
<body>
    
	<div class="signup-container">
		<h2>Sign Up</h2>
    <img src="/src/assets/images/gov-logo.png">
		<form action="form.php" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Username" required>
			<label for="email">Email</label>
			<input type="email" id="email" name="email" placeholder = "Email" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder = "Password" required>
			<div class = button-container>
      <button  type="submit" value="Sign Up">Sign up</button>
</div>
    </form>
		<p> Already have an account? <a href="login.php">Log In</a></p>
	</div>
</body>
</html>



<?php
session_start();
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if username or email already exists in database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username or email already exists
        echo "Username or email already exists.";
    } else {
        // Insert new user into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();

        // Redirect to login page
        header("Location: login.php");
        exit();
    }
}
?>
