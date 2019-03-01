<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="validation_script.js"></script>
<title>Home</title>
</head>
<body style="height:1500px">

	<?php
	function clean($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
	}
	$nameerr = $rollerr = $doberr = $emailerr = $brancherr = $brancherr="";
	$name=$roll=$dob=$email=$branch="";
	if(empty($_POST["submit"]))
	{
		if(empty($_POST["name"]))
			$nameerr="Name Required";
		else $name=clean($_POST["name"]);

		if(empty($_POST["roll"]))
			$rollerr="Roll Required";
		else $roll=clean($_POST["roll"]);

		if(empty($_POST["dob"]))
			$doberr="DOB Required";
		else $dob=clean($_POST["dob"]);

		if(empty($_POST["email"]))
			$emailerr="Email Required";
		else $email=clean($_POST["email"]);
		if(empty($_POST["branch"]))
			$brancherr="Branch Required";
		else $branch=clean($_POST["branch"]);

	}

	?>
<div class="container-fluid">
  	<br>
  	<h3>Sticky Navbar</h3>
  	<p>A sticky navigation bar stays fixed at the top of the page when you scroll past it.</p>
  	<p>Scroll this page to see the effect. <strong>Note:</strong> sticky-top does not work in IE11 and earlier.</p>
</div>
	<nav class="navbar sticky-top navbar-expand-sm justify-content-center bg-dark">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Courses</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">About</a>
			</li>
			<li class="nav-item active" >
				<a class="nav-link active" href="" >Register</a>
			</li>
		</ul>
	</nav>
	<br><br>
	<div class="container">
	<form action="process.php" method="post" onsubmit="return validateForm();" name="registration" class="col-sm-5" enctype="multipart/form-data">
		<div class="form-group">
			<label for "name">Name : </label>
			<input type="text" name="name" class="form-control" placeholder="Enter you Name">
		</div>
		<div class="form-gruop">
			<label for="email">Email Id:</label>
			<input type="text" name="email" class="form-control" placeholder="type your email">
		</div>
		<div class="form-group">
			<label for="roll">Roll Number:</label>
			<input type="Number" name="roll" class="form-control" placeholder="Enter your Roll No">
		</div>
		<div class="form-group">
			<label for="dob">Date of Birth</label>
			<input type="Date" name="dob" class="form-control" placeholder="Enter you DOB">
		</div>
		<div class="form-group">
			<label for="branch">Branch:</label>
			<select class="form-control custom-select" name="branch">
				<option value="default" selected>Choose your Branch</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Electrical Engineerng">Electrical Engineerng</option>
				<option value="Civil Engineering">Civil Engineering</option>
				<option value="Electronics and Communication">Electronics and Communication</option>
			</select>
		</div>
		<div class=" custom-file form-group">
			<label for="images" class="custom-file-label">Upload Image:</label>
			<input type="file" name="image" class="form-control custom-file-input">
		</div>
		<div class="form-group">
			<label for="gender">Gender</label>
			<br>
			Male : <input type="radio" name="gender" value="Male">&nbsp;&nbsp;&nbsp;
			Female : <input type="radio" name="gender" value="Female">
		</div>
		<input type="submit" name="submit" value="submit" class="btn" style="box-shadow: 1px 1px 2px">
		&nbsp;&nbsp;&nbsp;
		<input type="reset" name="submit" class="btn" style="box-shadow: 1px 1px 2px">
	</form>
	</div>
</body>
</html>