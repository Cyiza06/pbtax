<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Generate a random OTP
    $otp = rand(100000, 999999);

    // Store OTP in session or database for verification
    session_start();
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    // Email subject and message
    $subject = "Your OTP Code";
    $message = "Your OTP code is $otp. Please use this to complete your signup process.";

    // Send the email
    $headers = "From: no-reply@example.com";
    if (mail($email, $subject, $message, $headers)) {
        echo "An OTP has been sent to your email.";
        // Redirect to OTP verification page
        header('Location: verify_otp.php');
    } else {
        echo "Failed to send OTP. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>

<!-- verification code -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <h2>Verify OTP</h2>
    <form action="verify_otp_process.php" method="POST">
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required><br><br>
        <input type="submit" value="Verify">
    </form>
</body>
</html>

<!-- otp verification -->
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];

    if (isset($_SESSION['otp'])&&$otp == $_SESSION['otp']) {
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];

        // Save user to database (hash password before saving)
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // Database connection code (adjust to your settings)
        $conn = new mysqli('localhost', 'username', 'password', 'database');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

        // Clear session data
        session_unset();
        session_destroy();
    } else {
        echo "Invalid OTP. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
