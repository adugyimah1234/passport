<!DOCTYPE html>
<html>

<head>
	<title>Passport Application - Check Status</title>
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
		<h2>Check Application Status</h2>
		<p>Please enter your application ID to check the status of your passport application.</p>
		<form action="status.php" method="post">
			<label for="application_id">Application ID:</label>
			<input type="text" name="application_id" required>
			<button type="submit" name="submit">Check Status</button>
		</form>

		<?php
		// Connect to database
		include "config.php";

		// Check application status
		if (isset($_POST['submit'])) {
			$id = $_POST['id'];

			$sql = "SELECT * FROM registered WHERE id='$id'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				echo "<p>Status: " . $row['status'] . "</p>";
			} else {
				echo "<p>No application found with that ID.</p>";
			}
		}
		?>
	</main>

	<footer class="footer-wrapper">

<div class="main-footer">

	<div class="container">

		<div class="row">

			<div class="col-sm-12 col-md-9">

				<div class="row">

					<div class="col-sm-6 col-md-4">

						<div class="footer-about-us">
							<h5 class="footer-title">About Nightingale Jobs</h5>
							<p>Nightingale Jobs is a job portal, online job management system developed
								by Nathaniel Nkrumah for his project in february 2018.</p>

						</div>

					</div>

					<div class="col-sm-6 col-md-5 mt-30-xs">
						<h5 class="footer-title">Quick Links</h5>
						<ul class="footer-menu clearfix">
							<li><a href="./">Home</a></li>
							<li><a href="job-list.php">Apply

								</a></li>
							<li><a href="apply.php">apply</a></li>
							<li><a href="employees.php">Employees</a></li>
							<li><a href="contact.php">Contact Us</a></li>
							<li><a href="#">Go to top</a></li>

						</ul>

					</div>

				</div>

			</div>

			<div class="col-sm-12 col-md-3 mt-30-sm">

				<h5 class="footer-title"></h5>

				<p>Address : Takoradi, School Junction PO.BOX AX40</p>
				<p>Email : <a href="mailto:nightingale.nath2@gmail.com">nightingale.nath2@gmail.com</a>
				</p>
				<p>Phone : <a href="tel:+233546607474">+233 546 607 474</a></p>


			</div>


		</div>

	</div>

</div>

<div class="bottom-footer">

	<div class="container">

		<div class="row">

			<div class="col-sm-4 col-md-4">

				<p class="copy-right">&#169; Copyright
		<p>&copy; 2023 Passport Application Platform</p>
					<?php echo date('Y'); ?> 
				</p>

			</div>

			<div class="col-sm-4 col-md-4">

				<ul class="bottom-footer-menu">
					<li><a>Developed by xYlEoM zOpHe</a></li>
				</ul>

			</div>

			<div class="col-sm-4 col-md-4">
				<ul class="bottom-footer-menu for-social">
					<li><a href="<?php echo "$tw"; ?>"><i class="ri ri-twitter" data-toggle="tooltip"
								data-placement="top" title="twitter"></i></a></li>
					<li><a href="<?php echo "$fb"; ?>"><i class="ri ri-facebook" data-toggle="tooltip"
								data-placement="top" title="facebook"></i></a></li>
					<li><a href="<?php echo "$ig"; ?>"><i class="ri ri-instagram" data-toggle="tooltip"
								data-placement="top" title="instagram"></i></a></li>
				</ul>
			</div>

		</div>

	</div>

</div>

</footer>

</div>


</div>

<div id="back-to-top">
<a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>

</body>

<style>

/**
 * Pricing
*/

.pricing-wrapper .GridLex-gap-30-wrappper {}

.pricing-item {
    margin: 30px 0 10px;
    width: 100%;
    border: 1px solid #CCC;
    border-radius: 3px;
    background: #EDF2F2;
    border-top: 5px solid #20262F;
    position: relative;
}

.pricing-item-best-label {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 12px;
    line-height: 1;
    letter-spacing: 1.5px;
    width: 0px;
}

.pricing-item-best-label:before {
    content: "";
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 80px 80px 0;
    border-color: transparent #33B6CB transparent transparent;
    position: absolute;
    top: 0;
    right: 0;
}

.pricing-item-best-label span {
    text-align: center;
    color: #FFF;
    z-index: 1;
    display: block;
    -ms-transform: rotate(-45deg);
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    position: absolute;
    top: 15px;
    right: 5px;
    text-transform: uppercase;
    font-size: 10px;
}

.pricing-item.best {
    border-color: #33B6CB;
    padding: 30px 0 0;
    margin: 0;
}

.pricing-item-header {
    font-size: 12px;
    padding: 30px 25px;
    line-height: 1.2;
}

.pricing-item-header h4 {
    font-weight: 700;
    letter-spacing: 0.5px;
    line-height: 1;
    margin: 30px 0 5px;
    text-transform: capitalize;
}

.pricing-item-price {
    text-align: right;
    font-size: 13px;
}

.pricing-item-price span {
    display: block;
    font-size: 44px;
    font-weight: 700;
    color: #333;
}

.pricing-item-price span small {
    font-size: 24px;
    font-weight: 600;
    margin-right: 2px;
}

.pricing-item-content {
    padding: 0 25px 30px;
}

ul.pricing-item-list li {
    position: relative;
    padding-left: 30px;
    margin-bottom: 7px;
}

ul.pricing-item-list li i {
    position: absolute;
    top: 0;
    left: 2px;
}

@media only screen and (max-width: 1199px) {}

@media only screen and (max-width: 991px) {
    .pricing-item.best {
        border-color: #33B6CB;
        margin: 20px 30px 0;
    }
}

@media only screen and (max-width: 767px) {}

@media (max-width: 479px) {}


/**
 * Contact Us
 */

.contact-form-wrapper .help-block {
    line-height: 1.2;
    font-size: 12px;
}

.contact-text-featured-item .content p {}

.contact-social a {
    margin-right: 5px;
}

ul.contact-list {
    margin-top: 30px;
}

ul.contact-list li {
    line-height: 1;
    margin: 0 0 25px;
}

ul.contact-list li .icon {
    width: 20px;
    float: left;
}

ul.contact-list li .content {
    margin-left: 20px;
}

ul.contact-list li h6 {
    line-height: 1;
    margin: 0 0 10px;
}

ul.address-list li {
    margin: 0;
    position: relative;
    padding-left: 15px;
    line-height: 1.4;
}

ul.address-list li + li {
    margin-top: 25px;
}

ul.address-list li a {
    font-weight: 400;
}

ul.address-list li h5 {
    line-height: 1.2;
    margin: 0 0 10px;
}

ul.address-list li > i {
    position: absolute;
    top: 0;
    left: 0;
}

.contact-map .infoBox {
    background: #fff!important;
    border: 1px solid #33B6CB;
    border-radius: 3px;
    font-size: 14px;
    line-height: 1.2;
    width: 120px!important;
    margin-left: -60px;
    padding: 10px;
    text-align: center;
}

.contact-map .infoBox:after {
    top: 100%;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-top-color: #33B6CB;
    border-width: 10px;
    margin-left: -10px;
}

.contact-map .infoBox > img {
    height: 16px;
    width: 16px;
    overflow: hidden;
    position: absolute!important;
    top: -8px;
    right: -8px;
    display: block;
    background: #FFF;
    border-radius: 50%;
    border: 1px solid #FFF;
}

.contact-map .infoBox > img:hover {}

.contact-map .infoBox h4,
.contact-map .infoBox h5,
.contact-map .infoBox h6 {
    margin: 0;
    line-height: 1;
}

.contact-map .infoBox #infobox {
    position: relative
}

.contact-map.shorter-infobox .infoBox {
    width: 80px!important;
    margin-left: -40px;
}

.infobox-wrapper {
    display: none
}

@media only screen and (max-width: 1199px) {}

@media only screen and (max-width: 991px) {
    ul.address-list li {
        padding-left: 0;
    }
}

@media only screen and (max-width: 767px) {}

@media (max-width: 479px) {}


/**
 * Faq
 */

.faq-wrapper {
    padding-left: 10px;
}

.faq-wrapper h3 {
    margin: 0 0 25px;
}

.faq-wrapper h1:first-child,
.faq-wrapper h2:first-child,
.faq-wrapper h3:first-child,
.faq-wrapper h4:first-child {
    margin-top: 0;
}

.faq-section {
    border-bottom: 1px solid #E3E3E3;
    margin: 0 0 40px;
}

.faq-section h4 {
    margin: 8px 0 0;
}

.faq-section .panel-body {
    padding-top: 0;
    padding-bottom: 5px;
}

.faq-thread {
    border-bottom: 1px solid #E5E9EA;
    padding-bottom: 30px;
    margin-bottom: 40px;
}

.faq-thread ul {
    list-style: disc !important;
    margin-left: 20px !important;
}

.faq-thread ul {
    margin-left: 15px;
}

.faq-thread ol {
    list-style: decimal !important;
    margin-left: 20px !important;
}

.faq-thread ol ol {
    margin-left: 15px;
}

.panel-group.bootstarp-accordion .faq-thread {
    border-bottom: 0;
    padding-bottom: 15px;
    margin-bottom: 0;
}

.alt-no-bb .faq-section {
    border-bottom: 0;
    margin: 0 0 40px;
}

.faq-wrapper.mmt {
    margin-top: -5px;
}

.faq-wrapper .panel {
    margin-bottom: 5px;
}

@media only screen and (max-width: 1199px) {}

@media only screen and (max-width: 991px) {}

@media only screen and (max-width: 767px) {
    .faq-wrapper {
        padding-left: 0;
    }
}

@media (max-width: 479px) {}


/**
 * Static Page
 */

.for-static-page .sidebar-module {
    margin-right: 30px;
}

ul.static-page-menu li a {
    display: block;
    color: #636363;
    padding: 8px 20px;
    transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    line-height: 1;
    padding-left: 0;
    border-left: 4px solid #FFF !important;
    border-right: 4px solid #FFF;
    margin-right: -4px;
    margin-left: -4px;
    margin-bottom: 1px;
    font-size: 12px;
}

ul.static-page-menu li a:hover,
ul.static-page-menu li.active a {
    border-right: 4px solid #F56961;
    color: #F56961;
}

.static-wrapper h1:first-child,
.static-wrapper h2:first-child,
.static-wrapper h3:first-child,
.static-wrapper h4:first-child,
.static-wrapper h5:first-child,
.static-wrapper h6:first-child {
    margin-top: 0;
}

.static-wrapper {
    padding-left: 10px;
}

.static-wrapper ul,
.static-wrapper ol {
    list-style: disc;
    margin-left: 20px;
    line-height: 25px;
}

.static-wrapper ul li,
.static-wrapper ol li {
    margin-bottom: 7px;
}

.static-wrapper ul ul,
.static-wrapper ol ol {
    margin-top: 7px;
}

.static-wrapper > ul,
.static-wrapper > ol {
    margin-bottom: 15px;
}

.static-wrapper ol {
    list-style: decimal;
}

.static-wrapper hr {
    margin-top: 30px;
    margin-bottom: 40px;
}

@media only screen and (max-width: 1199px) {}

@media only screen and (max-width: 991px) {
    .for-static-page .sidebar-module {
        margin-right: 15px;
    }
}

@media only screen and (max-width: 767px) {
    .for-static-page .sidebar-module {
        margin-right: 0;
    }
    .static-wrapper {
        padding-left: 0;
    }
}

@media (max-width: 479px) {}


/**
 * Login and Register
 */

.login-box-wrapper .modal-header,
.login-box-wrapper .modal-footer {
    background: #EEE;
}

.login-box-wrapper .modal-body {
    padding: 25px 25px 20px;
}

.login-box-wrapper .modal-title {
    line-height: 1;
    margin: 0;
    text-transform: lowercase;
    font-weight: 700;
}

.login-modal-or {
    margin: 45px 0 25px;
    text-align: center;
    font-weight: 600;
}

.login-modal-or > div {
    border-top: 1px solid #DDD;
    position: relative;
    height: 14px;
}

.login-modal-or > div > span {
    display: block;
    width: 40px;
    height: 40px;
    background: red;
    border-radius: 50%;
    line-height: 38px;
    font-size: 10px;
    letter-spacing: 1px;
    position: absolute;
    top: 0;
    left: 50%;
    margin-left: -20px;
    margin-top: -20px;
    text-transform: uppercase;
    border: 1px solid #DDD;
    background: #FFF;
}

.login-box-link-action {
    text-align: right;
}

.login-box-box-action {
    margin-top: 10px;
}

.btn-facebook,
.btn-google-plus {
    color: #FFF !important;
}

.btn-facebook {
    background: #3b5998;
}

.btn-google-plus {
    background: #d34836;
}

.btn-facebook:hover,
.btn-google-plus:hover {
    opacity: 0.8;
}

.login-container-wrapper {
    padding: 70px 0;
}

.login-container-wrapper .login-box-wrapper {
    border: 1px solid #DDD;
    border-radius: 3px;
    -webkit-box-shadow: 0px 0px 11px -1px rgba(0, 0, 0, 0.16);
    -moz-box-shadow: 0px 0px 11px -1px rgba(0, 0, 0, 0.16);
    box-shadow: 0px 0px 11px -1px rgba(0, 0, 0, 0.16);
}

.modal.login-box-wrapper {
    width: 600px !important;
    margin-left: -300px !important;
}

@media only screen and (max-width: 1199px) {}

@media only screen and (max-width: 991px) {
    .login-modal-or {
        margin-top: 80px;
    }
}

@media only screen and (max-width: 767px) {
    .modal.login-box-wrapper {
        width: auto !important;
        margin-left: auto !important;
    }
    .login-box-link-action {
        text-align: left;
        margin-top: 10px;
    }
    .login-modal-or {
        margin-top: 45px;
    }
}

@media (max-width: 479px) {}
</style>