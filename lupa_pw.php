<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2>Password Recovery</h2>
                <form action="lupa_pw.php" method="POST">
                    <div class="form-group">
                        <label for="email">Registered E-mail Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-success">Recovery</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3 id="info"></h3>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</body>
</html>


<?php
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection
$host = 'localhost';
$db = 'spdempstershaferv1';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);
// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Query to find the user by email
        // Prepare the query
        $email = $mysqli->real_escape_string($email);
        $query = "SELECT * FROM admin WHERE email = '$email'";

        // Execute the query
        $result = $mysqli->query($query);

        // Fetch the result
        if ($result) {
            $user = $result->fetch_assoc();
        } else {
            $user = null;
        }

        // Close the connection
        $mysqli->close();
        
        if ($user) {
            $password = $user['password'];

            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = 'mail.neo-hi-instrument.my.id';
                $mail->SMTPAuth = true;
                $mail->Username = 'dempster-shafer@neo-hi-instrument.my.id';
                $mail->Password = 'PAKAR2024.id';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('dempster-shafer@neo-hi-instrument.my.id', 'Dempster Shafer-admin');
                $mail->addAddress($email);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password recovery';
                $mail->Body    = 'Your Last Saved Password is: <b>'.$password."</b> please do not tell anyone, best regard --Admin--";

                $mail->send();
                echo "<script>
                        document.getElementById('info').innerHTML = 'Password sent to your email address';
                    </script>";
            } catch (Exception $e) {
                echo "<script>
                        document.getElementById('info').innerHTML = 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
                    </script>";
            }
        } else {
            echo "<script>
                        document.getElementById('info').innerHTML = 'No user found with that email address';
                    </script>";
        }
    } else {
        // echo 'Invalid email address.';
        echo "<script>
                document.getElementById('info').innerHTML = 'Invalid email address';
            </script>";
    }
    unset($_POST['email']);
} else {
    // echo 'Invalid request.';
}

?>
