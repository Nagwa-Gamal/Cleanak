<?php

$title="Orders";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
 include 'controller/db.php';

 if(isset($_POST['reply']))
    header('location:replytoorder.php');
              $connection = mysqli_connect($host, $user, $passwd, $database);

$content='';
// Check connection
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {


        $query = "SELECT * FROM customer ";
         $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0)
{

$content='

<div  id="orders"  style="margin-bottom:auto; height:auto;">
<div class="headd" >
<h1>Look For Orders</h1>


</div>
<hr>
';
    // output data of each row
 
    while($row = $result->fetch_assoc()) {
$name=$row["fristname"]." ".$row["lastname"];

     $content.= '




 
     

            <div class="card"style="height:570px;width:350px;margin-left:10px;  float:left; margin-bottom:2px;">
                                
  

                <div class="order-overlay" >
                    <div class="labels">
                    <form method="POST">
                        <label name="id">ID: '.$row["customer_id"].'</label>

                        <br>
                        <label>Name: '.$name.'</label>
                        <br>
                        <label>Email: '.$row["email"].'</label>
                        <br>
                        <label>Phone: '.$row["phone"].'</label>
                        <br>
                        <label>Address: '.$row["address"].'</label>
                       <br>
                        <label>Booking Date: '.$row["booking_date"].'</label>
                        <br>
                        <label>Area: '.$row["area"].'</label>
                        <br>
                        <label>Extera Area: '.$row["EXTERA_SERVICES"].'</label>
                        <br>
                        <label>Price: '.$row["price"].'</label>
                       <br> 
                      
                        <label>Duration: '.$row["Duration"].'</label>
                       <br>
                     <label>Message_state: '.$row["message_state"].'</label>
                       <br>
                         <label>User_id: '.$row["user_id"].'</label>
                  
                        <hr>
                                             <a href="deleteorder.php?id='.$row["customer_id"].'" style="margin-right:10px;color:black;font-weight:bold;">Delete</a>

    <a href="replytoorder.php"  style="margin-right:10px;color:black;font-weight:bold;">Reply</a>
                                              
       <a href="updateorder.php?id='.$row["customer_id"].'"  style="margin-right:10px;color:black;font-weight:bold;">Replied</a>

                        </form>
                        
                    </div>
                </div>
            </div>';
        }

  
  $content.='  </div>';
       
} 

 mysqli_close($connection);
}



         include'footer.php';


?>

