<?php
$em;
$error= array('verify' =>'' );
session_start();
if(isset($_POST['verify']))
{

$verify='';

if(empty($_POST['ver']))
{
$error['verify']='A verifying code is required <br/>';
}
else
{
    $verify=$_POST['ver'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $verify))
    {
        $error['verify']='code must be letters , numbers and spaces only';
    }

}



//check if it is recorded in database

              
include 'db.php';
 if ($error['verify']=='') {
            // Create connection
    if($verify==$_SESSION['verify'])
    {
             $connection = mysqli_connect($host, $user, $passwd, $database);
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {
$tokenn=$_SESSION['verify'];
// $emaill= $_SESSION['email_v'] ;
$emm=$_GET['em'];
$query = sprintf("UPDATE sign_up
                            SET  verified='%s' WHERE email = '$emm'",
                mysqli_real_escape_string($connection,1));
          
                mysqli_query($connection,$query) or die(mysqli_error($connection));

                
} mysqli_close($connection);
        header('location:home.php');
    }

    }

        }


$content='<div class="log">
 <img src="images/wallpaper2.jpg" class="backimg">

<div class="login-box">
        <h1>Verify  Your Code</h1>
        <form  action="" method="POST">
            <p>Verifying Code : </p>
            <input type="text" name="ver" placeholder="Enter Verifying Code">
            <div class="red-text" > '.$error['verify'].' </div>
          
            <input type="submit" name="verify" value="Verify">
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