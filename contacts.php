<?php

$title="contacts";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
 include 'controller/db.php';

              $connection = mysqli_connect($host, $user, $passwd, $database);

$content='';
// Check connection
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {


        $query = "SELECT * FROM contact ";
         $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0)
{

$content='

<div  id="contacts" class="cont"  style="margin-bottom:auto; height:auto;">
<div class="headd" >
<h1>Look For Contacts</h1>
 
</div>
<hr>
';
    // output data of each row

    while($row = $result->fetch_assoc()) {

     $id=$row["users_id"];
     $content.= '




 
     

            <div class="card"style="height:380px;width:350px;margin-left:10px;  float:left; margin-bottom:10px;">
                                
  

                <div class="contact-overlay" >
                    <div class="labels">
                    <form method="POST">
                        <label name="id">ID: '.$row["users_id"].'</label>

                        <br>
                        <label>Name: '.$row["username"].'</label>
                        <br>
                        <label>Email: '.$row["email"].'</label>
                        <br>
                        <label>Phone: '.$row["phone"].'</label>
                        <br>
                        <label>Message: '.$row["message"].'</label>
                       <br>
                        
 <label>Message_state: '.$row["message_state"].'</label>
                       <br>
                      <label>User_id: '.$row["user_id"].'</label>
                       
                        <hr>
                                        
 <a href="delete.php?id='.$row["users_id"].'" style="margin-right:10px;color:black;font-weight:bold;">Delete</a>

    <a href="replytocontact.php"  style="margin-right:10px;color:black;font-weight:bold;">Reply</a>
                                              
       <a href="update.php?id='.$row["users_id"].'"  style="margin-right:10px;color:black;font-weight:bold;">Replied</a>

                        </form>
                        
                    </div>
                </div>
            </div>';
           
        }

  
  $content.='  </div>';
       
} 

 mysqli_close($connection);
}
/**********************delete*****************/


 

 /*if (isset($_POST['reply'])) {
      
                        $connection = mysqli_connect($host, $user, $passwd, $database);

                // delete contact

$id=$_POST['id'];
                //check connection
                if (!$connection) {
                    echo 'Error in connection : '.mysqli_connect_error();
                }
        $query = "DELETE FROM contact WHERE users_id = $id";
        mysqli_query($connection,$query) or die(mysqli_error($connection));
        mysqli_close($connection);
    

    
}
*/


     include'footer.php';

?>

