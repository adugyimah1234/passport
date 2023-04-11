<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


   <div class="login-container">
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <div class="button-container">
      <button type="submit">Login</button>
    </div>
    <div class="links-container">
      <a href="forgot-password.php">Forgot Password?</a>
      <span> | </span>
      <a href="signup.php">Sign Up</a>
    </div>
  </form>
</div>

</div>
  </form>
  <!-- Modal -->



  <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.querySelector('.psw a');

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

<style>
    .login-container {
  width: 360px;
  margin: auto;
  background-color: #fff;
  padding: 50px 50px;
  border-radius: 10px;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  text-align: center;
  animation: slide-down 0.6s ease-out;
}

@keyframes slide-down {
  from {
    transform: translateY(-200%);
  }
  to {
    transform: translateY(0);
  }
}

.login-container h2 {
  margin: 0 0 20px 0;
  color: #333;
  text-transform: uppercase;
  font-size: 22px;
}

.login-container input[type="text"],
.login-container input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: none;
  border-radius: 5px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

.login-container input[type="text"]:focus,
.login-container input[type="password"]:focus {
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
</html>

<?php
session_start();
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database for user with matching username
    $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // Passwords match, set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: first.php');
        exit();
    } else {
        // Passwords do not match
        echo 'Invalid username or password.';
    }
}
?>
