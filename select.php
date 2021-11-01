
<?php 
$title=" Select Page";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
if(isset($_POST['contacts']))
header('location:contacts.php');

if(isset($_POST['orders']))
header('location:orders.php');
if(isset($_POST['cleaners']))
header('location:cleaners.php');
if(isset($_POST['insert']))
header('location:addcleaner.php');
if(isset($_POST['delete']))
header('location:deletecleaner.php');
$content='  

<div class="select">
<div class="sel">
 <form  action="" method="POST">
        <input type="submit" name="contacts" value="Go To Contacts">
                <input type="submit" name="cleaners" value="Go To Cleaners">

        <input type="submit" name="orders" value="Go To Orders">
                <input type="submit" name="insert" value="Insert Cleaner">
                <input type="submit" name="delete" value="Delete Cleaner">

        </form>
</div>

</div>
';

     include'index.php';
    ?>