<?php 
session_start();
if(isset($_POST["submit"])){
	$filename = $_FILES["image"]["name"];
	$filename='images/'.$filename;
	move_uploaded_file($_FILES["image"]["tmp_name"],$filename);
	$name = $_POST['name'];
	$email_id=$_POST['email'];
	$roll=$_POST['roll'];
	$dob=$_POST['dob'];
	$branch=$_POST['branch'];
	$gender=$_POST['gender'];
	$image_name=$_FILES['image']['name'];
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email_id;
	$_SESSION["roll"] = $roll;
	$_SESSION["dob"] = $dob;
	$_SESSION["branch"] = $branch;
	$_SESSION["gender"] = $gender;
	$_SESSION["image_name"] = $image_name;
}
function cleana_and_validate()
{

	$_SESSION["name"]=trim($_SESSION["name"]);
	$_SESSION["email"]=trim($_SESSION["email"]);
	$_SESSION["roll"]=trim($_SESSION["roll"]);
	$_SESSION["dob"]=trim($_SESSION["dob"]);
	$_SESSION["branch"]=trim($_SESSION["branch"]);


	$_SESSION["name"]=stripslashes($_SESSION["name"]);
	$_SESSION["email"]=stripslashes($_SESSION["email"]);
	$_SESSION["roll"]=stripslashes($_SESSION["roll"]);
	$_SESSION["dob"]=stripslashes($_SESSION["dob"]);
	$_SESSION["branch"]=stripslashes($_SESSION["branch"]);


	$_SESSION["name"]=htmlspecialchars($_SESSION["name"]);
	$_SESSION["email"]=htmlspecialchars($_SESSION["email"]);
	$_SESSION["roll"]=htmlspecialchars($_SESSION["roll"]);
	$_SESSION["dob"]=htmlspecialchars($_SESSION["dob"]);
	$_SESSION["branch"]=htmlspecialchars($_SESSION["branch"]);
}
function storedata()
	{
	$name = $_SESSION['name'];
	$email_id=$_SESSION['email'];
	$roll=$_SESSION['roll'];
	$dob=$_SESSION['dob'];
	$branch=$_SESSION['branch'];
	$gender=$_SESSION['gender'];
	$image_name=$_SESSION["image_name"];
	
	cleana_and_validate();
	$servername="localhost";
	$username="root";
	$password="";
	$databasename="myprojectdb";

	$conn=new mysqli($servername,$username,$password,$databasename);
	if($conn->connect_error)
	die("Connection error due to".$conn->connect_error);

	$statement=$conn->prepare("insert into user_info(
		name,email_id,roll,dob,branch,gender,photo) values(?,?,?,?,?,?,?)");
	$statement->bind_param('ssissss',$_SESSION["name"],$_SESSION["email"],$_SESSION["roll"],$_SESSION["dob"],$_SESSION["branch"],$_SESSION["gender"],$_SESSION["image_name"]);
	$statement->execute();
// $q="insert into user_info values('','{$name}','{$email_id}',{$roll},'{$dob}','{$branch}','{$gender}','{$image_name}'";
// if ($conn->query($q) === FALSE) {
//     echo "Error: " . $q . "<br>" . $conn->error;;
// }
	$statement->close();
	$conn->close();
	}
if(isset($_GET["proceed"])){
	storedata();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<title>Validation</title>
</head>
<body style="height: 1500px">
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
			<li class="nav-item">
				<a class="nav-link" href="" active>Register</a>
			</li>
		</ul>
	</nav>
	<br><br>
	<br><br>
	<div class="container">
	<div class="card" style="width: 480px;">
		<?php echo $_SESSION["image_name"]; ?>
	<img src="./images/<?php echo $_SESSION['image_name']; ?>" alt="Image" class="card-img-top"
	height="400px">
		<div class="card-body">
			<h4 class="card-title"><?php echo $_SESSION["name"]."<br>";?></h4>
			<p class="card-text">
				Email id : <?php if(!empty($_SESSION["email"])) 
				echo $_SESSION["email"]."<br>"; else echo "" ?>
				Roll Number:<?php if(!empty($_SESSION["roll"])) echo $_SESSION["roll"]."<br>"; else echo  "<br>"?>
				Bate Of Birth : <?php if(!empty($_SESSION["dob"])) echo $_SESSION["dob"]."<br>"; else echo "<br>"?>
				Branch : <?php if(!empty($_SESSION["branch"])) echo $_SESSION['branch']."<br>"; else echo "<br>"?>
				Gender : <?php if(!empty($_SESSION["gender"])) echo $_SESSION["gender"]."<br>"; else echo "<br>"?>
			</p>
		</div>
	</div>
<!-- 	<form name="store" action="" class="col-sm-5" method="post">
		<div class="form-group">
			<input type="checkbox" name="OK" style="margin-top: 20px" required>
			<label for="checkbox">Given data is correct please store it.</label>
		</div> -->
<a href="./process.php?proceed=true"><button class="btn btn-primary"> Proceed</button></a>
</div>
</body>
</html>