<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<meta name="viewport" content="width-device-width,initial-scale-1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	*{
		margin:0px;
		padding:0px;
	}
	body{
		background-image: url("http://backgroundcheckall.com/wp-content/uploads/2017/12/background-images-for-login-form-8.jpg");
		background-attachment: fixed;
		background-size: cover;
		font-family: new time roman;
		margin-left:50px;
		margin-right:100px
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
		text-align:center;
	}

	</style>
</head>
<body>
	<div class="container-fluid" style="margin-top:30px;">
	<h3><b style="font-family:serif;color:red;"> CAREER PATH FLATFORM</b></h3>
</div>
	<div class="container">
	
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6"> 
				<form action="" method="post">
				<label class="label col-md-5 control-label"><h1 class="text-success">LOGIN</h1></label>
				<label class="label col-md-5 control-label"></label>
				<div class="col-md-10">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
				<label class="label col-md-4 control-label"></label>
				<div class="col-md-10">
					<input type="Password" class="form-control" name="password" placeholder="Password" required>
				
				</div>
				<div class="row">

				<button  class="btn btn-info" name="login">login</button>
				
			
				
				<a href="forgot.php"><div class="btn btn-info"> 
					
					Fogot password</div></a>
				<a href="re.php"><div class="btn btn-info">Register</div></a></div>
			</form>

			
                </div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
		
</body>
</html>
<?php
session_start();
include('conn.php');



		if(isset($_POST['login']))
		{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
			$result =mysqli_query($conn,"SELECT * FROM register WHERE username='$username' AND password='$password'")or die(mysqli_error());
			$num_row = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
			if( $num_row > 0 ) { 
				$get_id=$row['username'];
		
					echo $get_id;
					header('location:home.html');
		
					echo 'login success';
	}	
	else
	{
		$get_id=$row['username'];
		?>
		<script>
			alert("Wrong password/not registered");
		</script>
		<?php
		echo $get_id;

	} 
}
		

			?>