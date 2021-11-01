<?php
 include 'controller/db.php';
              $connection = mysqli_connect($host, $user, $passwd, $database);
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {
$id=$_GET['id'];
$query = "DELETE FROM contact WHERE users_id = $id";
        mysqli_query($connection,$query) or die(mysqli_error($connection));


}
 mysqli_close($connection);
     header('location:contacts.php');

?>