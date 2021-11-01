<?php
$title="login page";
$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
//include 'controller/control.php';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
/***********login********/
$error= array('name' =>'' ,'password' =>'');

if(isset($_POST['login']))
{

$name=$pass='';
$error= array('name' =>'' ,'password' =>'');

if(empty($_POST['name']))
{
$error['name']='A name is required <br/>';
}
else
{
    $name=$_POST['name'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $name))
    {
        $error['name']='Name must be letters and spaces only';
    }

}
if(empty($_POST['password']))
{
$error['password']='A password is required <br/>';
}
else
{
    $pass=$_POST['password'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $pass))
    {
        $error['password']='password must be letters  only and spaces only ';
    }

}

//check if it is recorded in database

              

$host = "localhost";
$user = "root";
$passwd = "";
$database = "cleanak1";

 if ($error['password']==''&&$error['name']=='') {
            // Create connection
            $connection = mysqli_connect($host, $user, $passwd, $database);
// Check connection
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {

      /*  $query = "SELECT * FROM sign_up WHERE username='$name' LIMIT 1";
         $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0)
{

    while($row = $result->fetch_assoc()) {
      if($row['username']=="mohamed"&&$row['pass']=="mo")
    header('location:select.php');
}}*/
  if($name=="cleanak"&&$pass=="12345678")
    header('location:select.php');

} 
 mysqli_close($connection);
        }

          

/*
 if (count($error) === 0) {

            $name=$_POST['name'];
            $pass=$_POST['password'];
        $query = "SELECT * FROM sign_up WHERE username=? or email=? LIMIT 1";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('ss', $username, $username);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($pass, $user['password'])) { // if password matches
                $stmt->close();

           // $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['verified'] = false;

                       // sendVerificationEmail($email, $token);

            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: ind.php');
             
                exit(0);
            } else { // if password does not match
                $error['password'] .= "    Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }


*/
}
$content='<div class="log">
 <img src="images/wallpaper2.jpg" class="backimg">

<div class="login-box">
      <img src="images/avatar3.png" class="avatar1">
        <h1>Admin Login </h1>
        <form  action="" method="POST">
            <p>Username</p>
            <input type="text" name="name" placeholder="Enter Username">
            <div class="red-text" > '.$error['name'].' </div>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
                        <div class="red-text" > '.$error['password'].'</div>


            <input type="submit" name="login" value="Login">
           
        </form>
    </div>
    </div> ';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Acme|Arizonia|Lobster|Pacifico|Courgette&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">

        <link rel="stylesheet" href="css/clea.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php echo $title ?></title>
    
    
</head>
<body>
     <?php echo $content; ?>
 

   </body>
</html>