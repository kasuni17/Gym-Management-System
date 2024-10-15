<?php
session_start();
if (!isset($_SESSION['adminid'])) {
	header("location: loginAdmin.php");
	// exit();
}
$session_id = $_SESSION['adminid'];
$session_id = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">
	<title>ICBT VIP GYM - Add Member Details </title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class='bx bx-dumbbell bx-tada' ></i>
			<span class="text">ICBT VIP GYM </span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="managemb.php">
					<i class='bx bxs-group'></i>
					<span class="text">Manage Members</span>
				</a>
				</div>
			</li>
			<li>
				<a href="managegym.php">
					<i class='bx bxs-trophy'></i>
					<span class="text">Gym Equipment</span>
				</a>
			</li>
			<li>
				<a href="attendance.php">
					<i class='bx bxs-calendar-check'></i>
					<span class="text">Attendance</span>
				</a>
			</li>
			<li>
				<a href="progressmb.php">
					<i class='bx bx-trending-up'></i>
					<span class="text">Member Progress</span>
				</a>
			</li>

			<li>
				<a href="statusmb.php">
					<i class='bx bxs-analyse'></i>
					<span class="text">Member Status</span>
				</a>
			</li>

			<li>
				<a href="paymentmb.php">
					<i class='bx bxs-dollar-circle'></i>
					<span class="text">Payments</span>
				</a>
			</li>

			<li>
				<a href="announcement.php">
					<i class='bx bxs-bell'></i>
					<span class="text">Announcement</span>
				</a>
			</li>

			<li>
				<a href="managestaff.php">
					<i class='bx bxs-group'></i>
					<span class="text">Staff Management</span>
				</a>
			</li>

			<li>
				<a href="report.php">
					<i class='bx bxs-report'></i>
					<span class="text">Reports</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
			<li>

				<a href="../logout.php" class="logout">
					<i class='bx bxs-arrow-to-left'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a class="nav-link">Welcome Admin!</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Add Member Details</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="managemb.php">Manage Members</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="addmb.php">Add Member Details</a>
						</li>
					</ul>
				</div>
			</div>
			<br>

			<!-- css -->
			<div id="content2">
				<div id="content-header">
					<h1>Member Entry Form</h1>
				</div>
				<div class="container-fluid">
					<br>
					<div class="row-fluid">
						<div class="span6">
							<fieldset>
								<legend>Personal - Info</legend>
								<div class="widget-box">
									<div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i></span>
										
										<span class="help-block">Note: The given information will create an account for this particular member.</span>
										<br>
										<br>
									</div>
									<div class="widget-content nopadding">

										<form action="addmbFunction.php" id="addmbForm" method="POST">
										
											<div class="control-group">
												<label class="control-label">Full Name :</label>
												<div class="controls">
													<input type="text" class="span11" name="fullname" id="fullname" placeholder="Fullname" required />
												</div><br>
											</div>
											<div class="control-group">
												<label class="control-label">Email :</label>
												<div class="controls">
													<input type="email" class="span11" name="email" id="email" placeholder="myname@example.com" required />
												</div><br>
											</div>
											<div class="control-group">
												<label class="control-label">Password :</label>
												<div class="controls">
													<input type="password" class="span11" name="password" id="password" placeholder="**********" required />
													
												</div><br>
											</div>
											<div class="control-group">
												<label class="control-label">Gender :</label>
												<div class="controls">
													<select name="gender" id="gender" required="required" class="span11" id="gender" required>
														<option value="Male" selected="selected">Male</option>
														<option value="Female">Female</option>
														<option value="Other">Other</option>
													</select>
												</div><br>
											</div>
											<div class="control-group">
												<label class="control-label">Date of Registration :</label>
												<div class="controls">
													<input type="date" name="dor" id="dor" class="span11" required />
													
												</div>
											</div><br>
									</div>
									<style>
										.span11 {
											width: 250px;
											height: 35px;
											border-radius: 8px;
											padding: 10px;
										}

										.btn-submit {
											border: none;
											padding: 10px;
											border-radius: 8px;
											width: 180px;
											height: 50px;
											background: #1a1a47;
											color: #fff;
											font-size: 20px;
											-webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
											-moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
											box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
											float: right;
											margin:10px;
										}

									</style>


									<div class="widget-content nopadding">
										<div class="form-horizontal">

										</div>
										<div class="widget-content nopadding">
											<div class="form-horizontal">
												<div class="control-group">
													<label for="normal" class="control-label">Plans: </label>
													<div class="controls">
														<select name="plan" required="required" class="span11" id="select" required>
															<option value="1" selected="selected">One Month</option>
															<option value="3">Three Month</option>
															<option value="6">Six Month</option>
															<option value="12">One Year</option>

														</select>
													</div><br>

												</div>
												<div class="control-group">

												</div>
											</div>
										</div>
									</div>

								</div>
							</fieldset>
						</div>
						<br>



						<div class="span6">
							<fieldset>
								<legend>Contact Details</legend>
								<div class="widget-box">
									<div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i>
										</span>

									</div>
									<div class="widget-content nopadding">
										<div class="form-horizontal">
											<div class="control-group">
												<label for="normal" class="control-label">Contact Number :</label>
												<div class="controls">
													<input type="number" class="span11" id="mask-phone" name="contact" placeholder="(000) 000 -0000" required class="span8 mask text">
													
												</div><br>
											</div>
											<div class="control-group">
												<label class="control-label">Address :</label>
												<div class="controls">
													<input type="text" class="span11" name="address" id="address" required placeholder="Address" />
												</div>
											</div>
										</div>
										<br>
									</div>
								</div>
						</div>
						</fieldset>

					</div>
					<br>

					<div class="span6"> <span class="icon"> <i class="fas fa-align-justify"></i></span>
						<style>
							fieldset {
								border: 1px solid #000;
								border-radius: 10px;
								padding: 20px;

							}

							legend {
								font-weight: bold;
								font-size: 20px;
								text-align: center;

							}
						</style>
						<fieldset>
							<legend>Service Details</legend>

							<div class="widget-content nopadding">
								<div class="form-horizontal">


									<div class="control-group">
										<label class="control-label">Services :</label>
										<div class="controls">
											<label>
												<input type="radio" value="Fitness" name="services" id="services1" />
												Fitness <small>- $55 per month</small></label><br>
											<label>
												<input type="radio" value="Sauna" name="services" id="services2" />
												Sauna <small>- $35 per month</small></label><br>
											<label>
												<input type="radio" value="Cardio" name="services" id="services3" />
												Cardio <small>- $40 per month</small></label>
										</div>
									</div><br>

									<div class="control-group">
										<label class="control-label">Total Amount :</label>
										<div class="controls">
											<div class="input-append">
												<span class="add-on">$</span>
												<input type="number" placeholder="50" name="amount" id="amount" class="span11" required>
											</div>
										</div>
									</div>



									<div class="">
										<button type="submit" name="submit" onclick="validation1()" class="btn-submit">Submit</button>
									</div>
									</form>

								</div>
							</div>
						</fieldset>


					</div>


				</div>
			</div>


		</main>
	</section>



</body>

</html>

<script>
	function Validation1() {
		fullname = document.forms["addmbForm"]["fullname"].value;
		email = document.forms["addmbForm"]["email"].value;
		password = document.forms["addmbForm"]["password"].value;
		gender = document.forms["addmbForm"]["gender"].value;
		dor = document.forms["addmbForm"]["dor"].value;
		plan = document.forms["addmbForm"]["select"].value;
		contact = document.forms["addmbForm"]["mask-phone"].value;
		address = document.forms["addmbForm"]["address"].value;
		services1 = document.forms["addmbForm"]["services1"].value;
		services2 = document.forms["addmbForm"]["services2"].value;
		services3 = document.forms["addmbForm"]["services3"].value;
		amount = document.forms["addmbForm"]["amount"].value;

		if (fullname == "") {
			alert("Name field empty !")

		} else if (email == "") {
			alert("Email field empty !")
		} else if (password == "") {
			alert("Password field empty !")
		} else if (gender == "") {
			alert("Gender field empty !")
		} else if (dor == "") {
			alert("DOB field empty !")
		} else if (plan == "") {
			alert("Plan field empty !")
		} else if (contact == "") {
			alert("Contact field empty !")
		} else if (address == "") {
			alert("Address field empty !")
		} else if (services1 == "" || services2 == "" || services3 == "") {
			alert("Services field empty !")
		} else if (amount == "") {
			alert("Amount field empty !")
		} else {
			alert("Record added !")
		}

	}
</script>