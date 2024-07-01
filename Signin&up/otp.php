<?php
    include './connect.php';
    session_start();
    
    if (isset($_POST['sentOtp'])) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $email = validate($_POST['email']);
        $user_otp = validate($_POST['otp']);
        
        if (empty($email)) {
            header('location: otp.php?error=Please Provide your email !');  
        }
        elseif (empty($user_otp)) {
            header('location: otp.php?error=Please Provide your verification code!');
        }else{
            function generateOTP($length = 6) {
                $characters = '0123456789';
                $otp = '';
                for ($i = 0; $i < $length; $i++) {
                    $otp .= $characters[rand(0, strlen($characters) - 1)];
                }
                return $otp;
            };
            $otp = generateOTP();
    
            function storeOTP($email,$otp,$conn){
                $timestamp = time();
                $insert = "INSERT INTO otp_table VALUES('','$email','$otp','$timestamp')";
    
                $resulr =mysqli_query($conn,$insert);
                if (!$resulr) {
                    echo "not inserted";
                }
            }
                // function sendOTPEmail($email, $otp) {
                //     $subject = "Sign Up Email Verification Code";
                //     $message = "Your Email Verification code is: " . $otp;
                //     $headers = "From: no-reply@gmail.com";
                
                //     $sendEmail = mail($email,$subject,$message,$headers);
                //     if ($sendEmail) {
                //         return true;
                //     }else{
                //         return false;
                //     }
                // }
                // function verifyOTP($email, $user_otp, $conn) {
                //     $select = "SELECT otp,timestamp FROM otp_table WHERE email = $email ORDER BY timestamp DESC LIMIT 1";
                //     $runSelect = mysqli_query($conn,$select);
                // if (mysqli_num_rows($runSelect) == 1) {
                //     $row = mysqli_fetch_assoc($runSelect);
                //     if ($row['email'] === $email ) {
                //         $_SESSION['User_id'] = $row['otp_id'];
                //     }
                //     $current_time = time();
                //     $time_diff = $current_time - $row['timestamp'];

                //     if ($user_otp === $row['otp'] && $time_diff <= 300) {
                //         return true;
                //         echo "<script>alert('Created Account Successfully')</script>";
                //         header('location:index.php');
                //     }else{
                //         header('location: otp.php?error=Invalid code or code expired.');
                //     }
                //     return $row;
                // }
            }
            
            // $conn->close();
        // }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
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
    .error{
        height: 30px;
        padding: 6px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: red;
    }
</style>
</head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(./images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Provide Verification Code that sent to your Email
					</span>
				</div>
				<form action="" method="post" class="login100-form validate-form" enctype="multipart/form-data">
                    
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                        <span class="label-input100">Code :</span>
						<input class="input100" type="email" name="email" placeholder="Enter Your Verfication code">
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
                        <span class="label-input100">Code :</span>
						<input class="input100" type="text" name="otp" placeholder="Enter Your Verfication code">
						<span class="focus-input100"></span>
					</div>
                    <?php if (isset($_GET['error'])){ ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php };?>
                    <!-- <a sytle="display:flex;justify-content:center;align-items:center" href="./updatOtp.php?updatId=<?php echo $row['otp_id'];?>">Resend Code</a> -->
                        <br><br>
					<div class="container-login100-form-btn">
						<button type="submit" name="sentOtp" class="login100-form-btn">
							Confirm
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>