
<?php 
$title="contact";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
//include 'controller/control.php';

session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
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
        $error['name']='Name must be letters , numbers and spaces only';
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
if ($error['message']==''&&$error['phone']==''&&$error['email']==''&&$error['name']=='')
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
$content='   

<section class="contact">
    <section class="section-1">
        <div class="section-1-item">
            <h1>CONTACT</h1>
        </div>
        <div class="section-1-item">
            <a href="index.html">HOME &nbsp;</a>
            <span>&gt;</span>
            <a href="how_it_works.html">&nbsp; CONTACT</a>
        </div>
    </section>
    <!-- End of Section-1 -->

    <!-- Info Section -->
    <section class="info-section">
        <div class="info-section-item">
            <i class="fas fa-phone"></i>
            <h3>CALL US AT</h3>
            <p>(+20)7777 777 7777</p>
        </div>
        <div class="info-section-item">
            <i class="fas fa-map-marked"></i>
            <h3>AVAILABLE AT</h3>
            <p>El Minya</p>
        </div>
        <div class="info-section-item">
            <i class="far fa-clock"></i>
            <h3>WORKING HOURS</h3>
            <p>Everyday: 8 am - 6 pm</p>
        </div>
    </section>
    <!-- End of Info Section -->

    <section class="form-section">
     <form   action="" method="POST">
        <div class="full-form">
            <div class="half-from">
               
                    <div class="form-item">
                        <label for="">Your Name *</label>
                        <input type="text" name="name">
                      <div class="red-text" > '.$error['name'].' </div>

                    </div>
                    <div class="form-item">
                        <label for="">Your E-mail *</label>
                        <input type="email" name="email">
                    <div class="red-text" > '.$error['email'].' </div>

                    </div>
                    <div class="form-item">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone">
                                    <div class="red-text" > '.$error['phone'].' </div>

                    </div>
                    </div>
                   <div class="half-form">
                <textarea name="message" id="" cols="70" rows="21" placeholder="Message *"></textarea>
                            <div class="red-text" > '.$error['message'].' </div>

            </div>  </div> 
    <section class="submit-button-section">
        <input type="submit" name="contact" value="SUBMIT MESSAGE" class="section-2-button">
    </section>
    
           
       
                </form>
          
    </section>

    </section>';
     include'index.php';
    ?>