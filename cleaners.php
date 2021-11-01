<?php

$title="contacts";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
 include 'controller/db.php';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
 
              $connection = mysqli_connect($host, $user, $passwd, $database);

$content='';
// Check connection
 if (!$connection) {
                echo 'Error in connection : '.mysqli_connect_error();
            }
            else
            {


        $query = "SELECT * FROM cleaner ";
         $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0)
{

$content='

<div  id="cleaners"   style="margin-bottom:auto; height:auto;">
<div class="headd" >
<h1>Look For Cleaners</h1>


</div>
<hr>
';
    // output data of each row
 
    while($row = $result->fetch_assoc()) {

     
     $content.= '




 
     

            <div class="card"style="height:320px;width:350px;margin-left:10px;  float:left; margin-bottom:20px;">
                                
  

                <div class="cleaner-overlay" >
                    <div class="labels">
                    <form method="POST">
                        <label name="id">ID: '.$row["cleaner_id"].'</label>

                        <br>
                        <label>Name: '.$row["name"].'</label>
                        <br>
                        <label>Email: '.$row["email"].'</label>
                        <br>
                        <label>Gender: '.$row["gender"].'</label>
                        <br>
                        <label>Age: '.$row["age"].'</label>
                       <br>
                        <label>Salary: '.$row["salary"].'</label>
                       <br>
                       <label>Phone: '.$row["phone"].'</label>
                        <br>
                         <label>Order_id: '.$row["order_id"].'</label>
                        
                        <hr>
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

