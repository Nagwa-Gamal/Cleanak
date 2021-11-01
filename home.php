
<?php 
$title="home";
$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link5='<span ></span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');

if(isset($_POST['booking']))
    header('location:pricing.php');
$content='

 <div class="main-pic-box ">
        <h2>WELCOME TO CLEANAK</h2>
        <h1>THE MOST TRUSTED CLEANING</h1>
        <h1>SERVICE IN EGYPT</h1>
        <div class="main-pic-box-button">
                <form method="POST">

            <input type="submit" name="booking" value="BOOK NOW">
            </form>
        </div>
    </div>
    <div class="cross-box1">
        <h1>SPONSORED BY</h1>
        <img src="images/sponsor2.jpg" alt="">
        <img src="images/sponsor5.jpg" alt="">
    </div>
    <!-- end of cross-box1 -->
    <div class="info-text">
        <h3>WHAT IS CLEANAK</h3>
        <p>On demand cleaning services</p>
        <p>Cleanak is the best solution to get a professional trusted cleaner!</p>
    </div>
    <div class="info-box">
        <div class="item pic-item">

        </div>
        <div class="item text-item1">
            <!-- <p>Cleanak is the best solution to get a professional trusted cleaner!</p> -->
            <i class="fas fa-tint"></i>
            <h4>THE BEST HOUSE CLEANING SERVICE</h4>
            <ul>
                <li>Quality Guaranteed</li>
                <li>Trained and trusted professionals</li>
                <li>Best market materials</li>
            </ul>
        </div>
        <div class="item text-item2">
            <i class="fas fa-comment-dots"></i>
            <h4>CONTACT US</h4>
            <ul>
                <li>Happy to help you</li>
                <li>Our customer service are here for you</li>
                <li>Chat with us on facebook</li>
            </ul>
        </div>
    </div>
    <!-- end of info-box -->
    <div class="cross-box2">
        <h2 class="cross-box2-item">NO 1. HOUSE CLEANING SERVICE</h2>
                <form method="POST">

        <input type="submit" name="booking" value="BOOK NOW" class="cross-box2-item">
        </form>
    </div>
    <!-- end of cross-box2 -->
    <div class="info-box2">
        <div class="info-box2-item">
            <i class="fas fa-phone"></i>
            <h3>CALL US AT</h3>
            <p>(+20)7777 777 7777</p>
        </div>
        <div class="info-box2-item">
            <i class="fas fa-map-marked"></i>
            <h3>AVAILABLE AT</h3>
            <p>El Minya</p>
        </div>
        <div class="info-box2-item">
            <i class="far fa-clock"></i>
            <h3>WORKING HOURS</h3>
            <p>Everyday: 8 am - 6 pm</p>
        </div>
    </div>'
    ;
     include'index.php';
    ?>