<?php 
$title="signup page";
$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
include 'controller/control.php';
session_start();
/*****************signup************/
$host = "localhost";
$user = "root";
$passwd = "";
$database = "cleanak1";

            $connection = mysqli_connect($host, $user, $passwd, $database);


//session_start();
    $error= array('name' =>'' ,'email' =>'','password' =>'','passwordconfirm' =>'');

if(isset($_POST['signup']))
{
    
$host = "localhost";
$user = "root";
$passwd = "";
$database = "cleanak1";

            $connection = mysqli_connect($host, $user, $passwd, $database);

$name=$email=$pass=$passconfirm='';

            $gender=$_POST['gender'];

if(empty($_POST['name']))
{
$error['name']='A name is required <br/>';
}
else
{
    $name=$_POST['name'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $name))
    {
        $error['name']='Name must be letters  , numbers and spaces only';
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
        $error['password']='password must be letters , numbers and spaces only';
    }
    if(strlen($pass)<8)
        $error['password']='password must be greater than 8 number ';


}
if(empty($_POST['passwordconfirm']))
{
$error['passwordconfirm']='A password is required <br/>';
}
else
{
    $passconfirm=$_POST['passwordconfirm'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $passconfirm))
    {
        $error['passwordconfirm']='password must be letters  , numbers and spaces only';
    }
    if(strlen($passconfirm)<8)
        $error['password']='password must be greater than 8 number ';


}

if(empty($_POST['email']))
{
$error['email']='An email is required <br/>';
}
else
{
    $email=$_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error['email']='email must be a valid email address';
    }

}
if($_POST['password']!=$_POST['passwordconfirm'])
{
$error['passwordconfirm'] .="   the two passwords do not match!";

}

//add to database without verification
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
         
else
{
      $sql = "SELECT * FROM sign_up WHERE email='$email' LIMIT 1";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error['email'] = "Email already exists";
}
else
{
        ////
if ($error['email']==''&&$error['name']==''&&$error['password']==''&&$error['passwordconfirm']=='')
  {
     $token = bin2hex(random_bytes(50)); 
     $verified=0;
     $query = sprintf("INSERT INTO sign_up (username, pass,email,gender,verified,token) VALUES ('%s','%s','%s','%s','%s','%s')",
                     mysqli_real_escape_string($connection,$name),
                      mysqli_real_escape_string($connection,$pass),
                       mysqli_real_escape_string($connection,$email),
                       mysqli_real_escape_string($connection,$gender),
                       mysqli_real_escape_string($connection,$verified),
                       mysqli_real_escape_string($connection,$token)
        );
    
            mysqli_query($connection,$query) or die(mysqli_error($connection));
 $_SESSION['username'] =$name;

            $_SESSION['verify'] =$token;
             $_SESSION['email'] =$email;

             header('location:verify.php?em='.$email.'');
        }
    }
       }     mysqli_close($connection);



/*
//verify
    $email=$_POST['email'];
            $name=$_POST['name'];
            $gender=$_POST['gender'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $pass= password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password



    // Check if email already exists


$host = "localhost";
$user = "root";
$passwd = "";
$database = "cleanak1";

            $connection = mysqli_connect($host, $user, $passwd, $database);

    $sql = "SELECT * FROM sign_up WHERE email='$email' LIMIT 1";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
        $error['email'] = "Email already exists";
    }

    if (count($error) === 0) {


        $query = "INSERT INTO sign_up SET username=?, pass=?,email=?,gender=?, token=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param('sssss', $username,$pass, $email, $gender,$token);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
          // sendVerificationEmail($email, $token);

             $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $email;
            $_SESSION['gender'] = $gender;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: ind.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }

*/
}
$content='
<div class="log">
 <img src="images/wallpaper2.jpg" class="backimg">


    <div class="signup-box">
      <img src="images/avatar3.png" class="avatar">
      <h1>Sign Up</h1>
      <form  action="" method="POST">
        <p>Username</p>
        <input type="text" name="name" placeholder="Enter Username">
                    <div class="red-text" > '.$error['name'].' </div>

        <p>Email</p>
        <input type="email" name="email" placeholder="Enter Email">
                    <div class="red-text" > '.$error['email'].' </div>

        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
                    <div class="red-text" > '. $error['password'].' </div>

        <p>Confirm Password</p>
        <input type="password" name="passwordconfirm" placeholder="Confirm Password">
                    <div class="red-text" >'. $error['passwordconfirm'].'</div>

                <p>Gender</p>

        <select class="" name="gender">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
        <input type="submit" name="signup" value="Sign Up">

        <label for="checkbox_agree">
          <input id="checkbox_agree" type="checkbox" name="" value="Terms">
          I agree to all terms and conditions
        </label>
      </form>
    </div>

  </div>';

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