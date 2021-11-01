<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'cleanak1');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM sign_up WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE sign_up SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $query)) {
               $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;           
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header('location: ind.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}