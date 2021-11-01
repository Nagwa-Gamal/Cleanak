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
  if(isset($_POST['delete1'])) {
        if(empty($_POST['id'])){
            alert("Enter Id Please");
        }
        else{
             // delete type
            $id=$_POST['id'];
            $connection = mysqli_connect($host, $user, $passwd, $database);
        //check connection
        if (!$connection) {
            echo 'Error in connection : '.mysqli_connect_error();
        }
          else{ 
            $query ="DELETE FROM cleaner WHERE cleaner_id = '$id'";
            mysqli_query($connection,$query) or die(mysqli_error($connection));
            mysqli_close($connection);
        }
        }
       
    }
$content='
<div class="deletecleaner">
<h1>Delete Cleaner</h1>
 <form action="" method="POST">
        <div class="delete">
            <div class="delete-item">
                <h3>Cleaner ID *</h3>
                <input type="text" name="id">
            </div>
            <div class="delete-item">
                <input type="submit" name="delete1" value="DELETE">
            </div>
        </div>
    </form>
    </div>';
    include 'footer.php';
    ?>