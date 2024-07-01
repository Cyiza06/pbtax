<?php
	include './connect.php';

	session_start();
	if (isset($_POST['signup'])) {
		$first =$_POST['username'];
		$last =$_POST['last'];
		$image =$_FILES['file'];
		$image_name = $image['name'];
		$image_tmpname = $image['tmp_name'];

		$path = '../uploadedImages/' . $image_name;
        move_uploaded_file($image_tmpname,$path);
		$phone =$_POST['phone'];
		$email =$_POST['useremail'];
		$address =$_POST['address'];
		$pass = md5($_POST['pass']); ;
		$date = date('Y-m-d');


		$insert = "INSERT INTO users VALUES('','$first','$last','$image_name','$phone','$email','user','$address','$pass','$date')";

		$result = mysqli_query($conn,$insert);

		if ($result) {
			header('location:otp.php');
		}else{
			header('location:index.php?error=something went wrong');
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>P&B sign up page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./css/util.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
<!--===============================================================================================-->
<style>
	#preview img{
		height: 50px;
		width: 60px;
		border-radius: 5px;
	}
	.error{
    background: rgba(235, 228, 215, 0.568);
    color: #a94442;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
    text-align:center;
    margin-left:2.5%;  
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(./images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>
				<?php if (isset($_GET['error'])){ ?>
                	<p class="error"><?php echo $_GET['error']; ?></p>
            	<?php };?>
				<form action="" method="post" class="login100-form validate-form" enctype="multipart/form-data">
					<div class="wrap-input100 validate-input m-b-26" data-validate="first name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="username" placeholder="Enter First Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "lastname is required">
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="last" placeholder="Enter Last Name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Image is required" onchange="getImage(event)">
						<span class="label-input100">Profile :</span>
						<input class="input100" type="file" style="display: none;" id="profile" name="file">
						<label for="profile"  style="margin-top: 4%;cursor:pointer">+ Photo</label>
						<div class="img" id="preview" style="height: 50px;width: 60px;"></div>
						<script>
							function getImage(event){
								var image = URL.createObjectURL(event.target.files[0]);
								var imagediv = document.getElementById('preview');
								var newimg = document.createElement('img');
								newimg.src = image;
								imagediv.appendChild(newimg);
				
							}
						</script>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="phonenumber is required">
						<span class="label-input100">Phone :</span>
						<input class="input100" type="text" name="phone" placeholder="Enter Phone number">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
						<span class="label-input100">Email :</span>
						<input class="input100" type="email" name="useremail" placeholder="Enter Email address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
						<span class="label-input100">Address :</span>
						<input class="input100" type="text" name="address" placeholder="Enter Your Address">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="Password is required">
						<span class="label-input100">password:</span>
						<span style="cursor: pointer;" onclick="showpass()" id="wii">show password</span>
						<input class="input100" type="password" pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="Must contain at least one number and lowercase letter, and at least 8 or more characters" id="pass" name="pass" placeholder="Enter Your Password">
						<span class="focus-input100"></span>
						<script>
							function showpass(){
								let input = document.getElementById('pass');
								let wii = document.getElementById('wii');
								if (input.type === 'password') {
									input.type = 'text';
									wii.textContent = 'Hide password'
								} else {
									input.type = 'password'
									wii.textContent = 'Show password'
								}
							}
						</script>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<a href="./index.php">Already have any account?</a>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="signup" class="login100-form-btn">
							Sign Up
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>