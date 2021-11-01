<?php
 include 'controller/db.php';
              $connection = mysqli_connect($host, $user, $passwd, $database);
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {
$id=$_GET['id'];

$query = sprintf("UPDATE customer
                            SET  message_state='%s'
                          WHERE customer_id = $id",
                mysqli_real_escape_string($connection,'Seen'));
          
                mysqli_query($connection,$query) or die(mysqli_error($connection));

            	
} mysqli_close($connection);
    header('location:orders.php');

?>