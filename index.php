<?php 
//include 'controller/control.php';

$error= array('email' =>'','message' =>'');

if(isset($_POST['contact_footer']))
{

$email=$message='';
$phone='unknown';
$name='unknown';
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


///message

if(empty($_POST['message']))
{
$error['message']='A message is required <br/>';
}
else
{
    $message=$_POST['message'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $message))
    {
        $error['message']='message must be letters , numbers and spaces only';
    }

}
////add to database 

$host = "localhost";
$user = "root";
$passwd = "";
$database = "cleanak1";

            $connection = mysqli_connect($host, $user, $passwd, $database);

 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
         

else
{
        ////
if ($error['message']==''&&$error['email']=='')
  {


      $query = "SELECT * FROM sign_up where email= '$email'";
         $result = mysqli_query($connection, $query);
$user_id='';
    if (mysqli_num_rows($result) > 0)
{ while($row = $result->fetch_assoc()) {
    $user_id=$row["users_id"];

}}
     $query = sprintf("INSERT INTO contact (username, email,phone,message,message_state,user_id) VALUES ('%s','%s','%s','%s','%s','%s')",
                     mysqli_real_escape_string($connection,$name),
                      mysqli_real_escape_string($connection,$email),
                       mysqli_real_escape_string($connection,$phone),
                       mysqli_real_escape_string($connection,$message),
                             mysqli_real_escape_string($connection,"Unseen"),
                              mysqli_real_escape_string($connection,$user_id)

        );
            mysqli_query($connection,$query) or die(mysqli_error($connection));
        }
        mysqli_close($connection);
    }
            

}


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
	<style>
    .price #checkbox2_agree input[type="checkbox"]
{
  border:  darkgrey;
  outline: none;
  margin: 0;
  padding: 0;
  height: 20px;
  width: 20px;
  right: calc(50% - 35px);
  
}
  </style>
	
</head>

<body>
    <!-----header--->
	<header  >
        <div id="content-area" style="width:100%; height: auto; overflow: auto; overflow: hidden;">
        <?php echo $content; ?>
    </div>
        <!--navbar----->
      

        <div class="container " >

  
            <h1 class="logo-text" >Cleanak</h1>
                  <nav >

                <ul  class="nav-links">
                    <li >
                        <a  href="home.php"  ><?php echo $link1 ?>  </a>
                    </li>
                    <li >
                        <a  href="howitwork.php"  ><?php echo $link2 ?></a>
                    </li>
                     <li >
                        <a  href="pricing.php"  ><?php echo $link3 ?></a>
                    </li>
                    <li >
                        <a   href="contact.php"  ><?php echo $link4 ?></a>
                    </li>
                 
                      
            <li> <a name="admin" href="admin_login.php">ADMIN</a></li>
           
         
      
      
      
                    <li>

                        <a href="login.php"><?php echo $link6 ?></a>
                    </li>
            <li> <a name="" href="logout1.php">LOGOUT</a></li>



                </ul>
       
    </nav>
    </div>

  
</header>
<!----------------section---------------->
<section>
 
</section>
<!-----------------------------------footer---------------------->
    <div class="footer">
      <div class="footer-content">
        <div class="footer-section about">
          <h1 class="logo-text"><span>Clean</span>ak</h1>
          <p>
            Cleanak is a professional on demand house cleaning service based in Egypt.
          </p>
          <div class="contact">
            <span><i class="fas fa-phone"></i> &nbsp; 77777777777</span>
            <span><i class="fas fa-envelope"></i> &nbsp; mohsen@cleanak.com</span>
          </div>
          <div class="socials">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
        </div>
        <div class="footer-section join-us">
          <h2>Join Us</h2>
          <br>
          <ul>
            <a href="#"><li>Book a maid now</li></a>
            <a href="#"><li>Subscribe</li></a>
          </ul>
        </div>
        <div class="footer-section contact">
          <h2>Contact Us</h2>
          <br>
          <form action="" method="POST">
            <input type="email" name="email" class="contact-input text-input " placeholder="Enter email address">   
                       <div class="red-text" > <?php echo $error['email'] ?></div>

            <textarea name="message" class="contact-input" placeholder="Enter message"></textarea>
                                   <div class="red-text" > <?php echo $error['message'] ?></div>

            <button type="submit"  name ="contact_footer" class="btn btn-big contact-btn">
              <i class="fas fa-envelope"></i>
              Send
            </button>
          </form>
        </div>
      </div>
      <div class="footer-bottom">
        &copy; Cleanak.com | All rights are received.
      </div>

      </div>


      <script type="text/javascript">
        function ischeck() {
          
var ch=document.getElementByClassName('ch');
var extera='';
for (var i = 0;i<3;i++) {
  if(ch[i].checked===true)
    extera+=ch[i].value+",";
}
return extera;
        }
      </script>
</body>
</html>
