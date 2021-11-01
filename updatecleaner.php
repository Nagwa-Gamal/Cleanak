<?php
$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
include 'controller/db.php';
  if(isset($_POST['updatecleaner'])) {
        if(empty($_POST['id'])||empty($_POST['id1']))
            alert("Enter all Id Please");
        
        else{
             // delete type
            $id=$_POST['id'];
            $cid=$_POST['id1'];
            $connection = mysqli_connect($host, $user, $passwd, $database);
        //check connection
        if (!$connection) {
            echo 'Error in connection : '.mysqli_connect_error();
        }
          else{ 
            $query = sprintf("UPDATE cleaner
                            SET  order_id='%s'
                          WHERE cleaner_id =$cid ",
                mysqli_real_escape_string($connection,$id));
          
                mysqli_query($connection,$query) or die(mysqli_error($connection));

                
} mysqli_close($connection);
        
        
       }
    }
$content='
<div class="addcleaner">
<h1>Update  Cleaner</h1>
 <form action="" method="POST">
        <section class="cleaner-info">
                <div class="cleaner-info-item">
                    <div class="inner-item">
                     <h3 style="color:#0DA5FF;">Order ID *</h3>
                <input type="text" name="id">

                    </div>
                    <div class="inner-item">
                        <h3 style="color:#0DA5FF;">Cleaner ID *</h3>
                <input type="text" name="id1">
                    </div>
                </div>
                </section>
                    <section class="add-button">
                        <input type="submit" name="updatecleaner" value="Update">

    </section>
                </form>
                </div>
';;
    include 'footer.php';
    ?>