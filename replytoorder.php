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

$content='
<div class="replyy">
<h1 >Reply To Order</h1>
  <form action="" method="POST">
        <section class="message">        
           <div class="message-item">
                <h3>To *</h3>
                <input type="text">
            </div>
            <div class="message-item">
                <h3>Message *</h3>
                <textarea name="" id="" cols="" rows=""></textarea>
            </div>  
        </section> <!-- OF MESSAGE SECTION -->
          <!-- REPLY SECTION -->
    <section class="reply-button">
        <input type="submit" name="" value="REPLY">
    </section>
    </form></div>';
    include'footer.php';

    ?>

  