<?php
	include('./connect.php');

	if (isset($_POST['login'])) {
		$email =$_POST['useremail'];
		$pass =$_POST['pass'];


		$Select = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

		$runSelect = mysqli_query($conn,$Select);

		if ($runSelect) {
			$row = mysqli_fetch_assoc($runSelect);
			$md5 = $row['password'];

			if ($md5 = $md5) {
				if ($row['user_type'] == 'admin') {
					header('location: ../admin_panel/index.php');
				} 
				elseif ($row['user_type'] == 'user') {
					header('location: ../ClientPortal/index.php');
				}else{
					header('location:index.php?error=Incorrect Password');
				}
			}else {
				header('location:index.php?error=Incorrect Email');
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>P&B Login page</title>
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
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
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
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						LogIn
					</span>
				</div>
				<?php if (isset($_GET['error'])){ ?>
                	<p class="error"><?php echo $_GET['error']; ?></p>
            	<?php };?>
				<form action="" method="post" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="UserEmail is required">
						<span class="label-input100">E-mail :</span>
						<input class="input100" type="email" name="useremail" placeholder="Enter email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password :</span>
						<span style="cursor: pointer;" onclick="showpass()" id="wii">show password</span>
						<input class="input100" type="password" name="pass" id="pass" placeholder="Enter password">
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
							<a href="signup.php" class="txt1">
								Don't have an account?
							</a>
							<!-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label> -->
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>

							
						</div>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn ">
							Login
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