<?php 
$title="Add cleaner";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
include 'controller/db.php';
    $error= array('id'=>'','name' =>'' ,'email' =>'','gender' =>'','age' =>'','img' =>'','salary' =>'','phone' =>'');

 if (isset($_POST['addcleaner'])) {
           if(empty($_POST['name']))
{
$error['name']='A name is required <br/>';
}
else
{
    $name=$_POST['name'];
    if(!preg_match('/^[0-9a-zA-z\s]+$/', $name))
    {
        $error['name']='Name must be letters , numbers and and spaces only';
    }

}
if(empty($_POST['id']))
{
$error['id']='An id is required <br/>';
}
else
{
    $id=$_POST['id'];

    if(!preg_match('/^[0-9]+$/', $id))
    {
        $error['id']='id must be numbers  only';
    }
   if(strlen($id)!=14)
    {
        $error['id']='id must be 14 number';
    }

}
if(empty($_POST['gender']))
{
$error['gender']='A gender is required <br/>';
}
else
{
    $gender=$_POST['gender'];
    if(!preg_match('/^[a-zA-z\s]+$/', $gender))
    {
        $error['gender']='gender must be letters  only';
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
if(empty($_POST['age']))
{
$error['age']='An age is required <br/>';
}
else
{
    $age=$_POST['age'];
    if(!preg_match('/^[0-9]+$/', $age))
    {
        $error['age']='age must be numbers  only';
    }

}
if(empty($_POST['img']))
{
$error['img']='An image is required <br/>';
}
else
{
    $img=$_POST['img'];
    if(!preg_match('/^[0-9a-zA-z]+$/', $img))
    {
        $error['img']='img must be letters and numbers only';
    }

}
if(empty($_POST['salary']))
{
$error['salary']='A salary is required <br/>';
}
else
{
    $salary=$_POST['salary'];
    if(!preg_match('/^[0-9]+$/', $salary))
    {
        $error['salary']='salary must be numbers  only';
    }

}
if(empty($_POST['phone']))
{
$error['phone']='A phone is required <br/>';
}
else
{
    $phone=$_POST['phone'];
    if(!preg_match('/^[0-9]+$/', $phone))
    {
        $error['phone']='phone must be numbers  only';
    }
    if(strlen($phone)!=11)
        $error['phone']='phone must be consist of 11 number';

}
           
    
      if($error['id']==''&&$error['name']==''&&$error['email']==''&&$error['age']==''&&$error['phone']==''&&$error['img']==''&&$error['salary']==''&&$error['gender']=='')
   {$connection = mysqli_connect($host, $user, $passwd, $database);
        //check connection
        if (!$connection) {
            echo 'Error in connection : '.mysqli_connect_error();
        }
        else
       { $query = sprintf("INSERT INTO cleaner
                          (cleaner_id, name,gender,age,cleaner_image,salary,email,phone)
                          VALUES
                          ('%s','%s','%s','%s','%s','%s','%s','%s')",
               // mysqli_real_escape_string($connection,$id),
                mysqli_real_escape_string($connection,$id),
                mysqli_real_escape_string($connection,$name),
                mysqli_real_escape_string($connection,$gender),
                mysqli_real_escape_string($connection,$age),
                mysqli_real_escape_string($connection,$img),
                                mysqli_real_escape_string($connection,$salary),
                mysqli_real_escape_string($connection,$email),
                                mysqli_real_escape_string($connection,$phone)


            );
                mysqli_query($connection,$query) or die(mysqli_error($connection));
                mysqli_close($connection);      
            }}
    }
$content='
<div class="addcleaner">
<h1>Add Cleaner</h1>
 <form action="" method="POST">
        <section class="cleaner-info">
                <div class="cleaner-info-item">
                    <div class="inner-item">
                        <h4>Cleaner ID *</h4>
                        <input type="text" name="id">
                                            <div class="red-text" >'. $error['id'].'</div>

                    </div>
                    <div class="inner-item">
                        <h4>Full Name *</h4>
                        <input type="text" name="name">
                                            <div class="red-text" >'. $error['name'].'</div>

                    </div>
                </div>
                <div class="cleaner-info-item">
                    <div class="inner-item">
                        <h4>Gender *</h4>
                        <input type="text" name="gender">
                                            <div class="red-text" >'. $error['gender'].'</div>

                    </div>
                    <div class="inner-item">
                        <h4>Age *</h4>
                        <input type="text" name="age">
                                            <div class="red-text" >'. $error['age'].'</div>

                    </div>
                </div>
                <div class="cleaner-info-item">
                    <div class="inner-item">
                        <h4>Cleaner Image *</h4>
                        <input type="text" name="img">
                                            <div class="red-text" >'. $error['img'].'</div>

                    </div>
                    <div class="inner-item">
                        <h4>Salary *</h4>
                        <input type="text" name="salary">
                                            <div class="red-text" >'. $error['salary'].'</div>

                    </div>
                </div>
                 <div class="cleaner-info-item">
                    <div class="inner-item">
                        <h4>Cleaner Email *</h4>
                        <input type="email" name="email" style="background-color:white;">
                                            <div class="red-text" >'. $error['email'].'</div>

                    </div>
                    <div class="inner-item">
                        <h4>Phone *</h4>
                        <input type="text" name="phone">
                                            <div class="red-text" >'. $error['phone'].'</div>

                    </div>
                </div>
        </section> <!-- END OF INFO SECTION -->
           <section class="add-button">
        <input type="submit" name="addcleaner" value="ADD">
    </section>
    </form>
    </div>
';


include 'footer.php';
?>