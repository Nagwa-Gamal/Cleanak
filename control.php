<?php
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
//require 'controller/sendemail.php';
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
    if(!preg_match('/^[a-zAz\s]+$/', $name))
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
    if(!preg_match('/^[a-zAz\s]+$/', $pass))
    {
        $error['password']='password must be letters and spaces only';
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
    if(!preg_match('/^[a-zAz\s]+$/', $passconfirm))
    {
        $error['passwordconfirm']='password must be letters  and spaces only';
    }

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
if (count($error) === 0)
  {
     $query = sprintf("INSERT INTO sign_up (username, pass,email,gender) VALUES ('%s','%s','%s','%s')",
                     mysqli_real_escape_string($connection,$name),
                      mysqli_real_escape_string($connection,$pass),
                       mysqli_real_escape_string($connection,$email),
                       mysqli_real_escape_string($connection,$gender)
        );
            mysqli_query($connection,$query) or die(mysqli_error($connection));
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
    if(!preg_match('/^[a-zAz\s]+$/', $name))
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
    if(!preg_match('/^[a-zAz\s]+$/', $pass))
    {
        $error['password']='password must be letters  only and spaces only ';
    }
    if(strlen($pass)<8)
        $error['password']='password must be greater than 8 number ';

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

        $query = "SELECT * FROM sign_up WHERE username='$name' LIMIT 1";
         $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0)
{

    while($row = $result->fetch_assoc()) {
      if($row['username']==$name&&$row['pass']==$pass)
	header('location:home.php');
}
}
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
//////////contact//////////////////
$error= array('name' =>'' ,'email' =>'','phone' =>'','message' =>'');

if(isset($_POST['contact']))
{

$name=$email=$phone=$message='';
////////name
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

///email

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

///phone
if(empty($_POST['phone']))
{
$error['phone']='A phone is required <br/>';
}
else
{
    $phone=$_POST['phone'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $phone))
    {
        $error['phone']='phone must be letters ,numbers and spaces only';
    }
    if(strlen($phone)!=11)
        $error['phone']='phone must be 11 number';

}
///message

if(empty($_POST['message']))
{
$error['message']='A message is required <br/>';
}
else
{
    $message=$_POST['message'];
    if(!preg_match('/^[a-zA-z\s]+$/', $message))
    {
        $error['message']='message must be letters and spaces only';
    }

}
////add to database 


 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
         

else
{
        ////
if ($error['message']==''&&$error['phone']==''&&$error['email']==''&&$error['name']=='')
  {
     $query = sprintf("INSERT INTO contact (username, email,phone,message) VALUES ('%s','%s','%s','%s')",
                     mysqli_real_escape_string($connection,$name),
                      mysqli_real_escape_string($connection,$email),
                       mysqli_real_escape_string($connection,$phone),
                       mysqli_real_escape_string($connection,$message)
        );
            mysqli_query($connection,$query) or die(mysqli_error($connection));
        }
        mysqli_close($connection);
    }
            

}





?>