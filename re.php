<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
	<meta name="viewport" content="width-device-width,initial-scale-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	*{
		margin:0px;
		padding:0px;
	}
	body{
		background-image: url(https://img.rawpixel.com/s3fs-private/rawpixel_images/website_content/v505-tang-22-abstractbackground_1.jpg?w=1200&h=1200&dpr=1&fit=clip&crop=default&fm=jpg&q=75&vib=3&con=3&usm=15&cs=srgb&bg=F4F4F3&ixlib=js-2.2.1&s=fe9d00eb0cbb4b580e0a6280744ab010);
		background-attachment: fixed;
		background-size: cover;
		font-family: new time roman;
	}
	h1{
		font-size: 40px;
		color:gray;
		margin-top: 20px;
		margin-bottom: 30px;
	}
	.label{
		font-size:20px;
		margin-top: 20px;
		font-weight: normal;
	}
	.form-control{
		background:rgba(255,255,255,0.2);
		border:3px;
		border-radius:5px;
		border-bottom:2px solid white;
	}
	small{
		font-size:15px;
		color:gray;
	}
	.btn-info{
		margin-top:20px;
		margin-left: 100px;
		width:200px;
		font-size: 20px;
	}
	</style>
</head>
<body>
	<div class="container">

		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form action="" method="post">
				<label class="label col-md-5 control-label"><h1 class="text-secondary">REGISTER</h1></label>
				<label class="label col-md-5 control-label"></label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
				<label class="label col-md-4 control-label"></label>
				<div class="col-md-10">
					<input type="Password" class="form-control" name="password" placeholder="Password" required>
					
				</div>
				
				<label class="label col-md-4 control-label"></label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="email" placeholder="Email_id" required>
				</div>
				<label class="label col-md-4 control-label"></label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="address" placeholder="adress" required>
				</div>
				
				<div >
				<button  class="btn btn-info" name="signin" >SignIn</button>
			    
                </div>


				<div >
				<a href="log.php"><div class="btn btn-info" name="login" >LogIn</div></a>
			    
                </div>
                </form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
		

<?php
include('conn.php');
if(isset($_POST['signin']))
{
        
$username=$_POST['username'];
$password=$_POST['password'];

$email=$_POST['email'];
$address=$_POST['address'];


  if($conn->connect_error)
{
  die("connection failed: " .
    $conn->connect_error);
}
$s ="select *from register where username='$username'";
$result = mysqli_query($conn, $s);
 
$num = mysqli_num_rows($result);
$ph ="select *from register where email='$email'";
$result1 = mysqli_query($conn, $ph);
 
$num1 = mysqli_num_rows($result1);

if($num==1)
{
	?>
		<script>
			alert("Username is already taken");
		</script>
		<?php
}
else if($num1==1)
{
	?>
		<script>
			alert("email is already taken");
		</script>
		<?php
}

else
{
$sql="INSERT INTO register(username,password,email,address)VALUES('$username','$password','$email','$address')";

if($conn->query($sql) === TRUE)
{
	?>
	<script>
  alert("Registration successful"); 
</script>
<?php
  
}
else
{
echo "Registration failed:" . $sql . "<br>"
. $conn->error;
}
}
}

$conn->close();
?>
</body>
</html>