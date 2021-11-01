
<?php 
$title="how it work";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');
if(isset($_POST['book']))
    header('location:pricing.php');
$content='  
<section class="how">
    <section class="section-1">
        <div class="section-1-item">
            <h1>HOW IT WORKS</h1>
        </div>
        <div class="section-1-item">
            <a href="home.php">HOME &nbsp;</a>
            <span>&gt;</span>
            <a href="how_it_works.html">&nbsp; HOW IT WORKS</a>
        </div>
    </section>
   
    <section class="section-2">
        <div class="section-2-item">
            <h2>IT IS NEVER BEEN EASIER</h2>
        </div>
        <div class="section-2-item">
            <p><em>Simple steps to get your house cleaned</em></p>
        </div>
        <div class="section-2-item">
            <p>We are redefining cleaning as you know it. We offer a service we all need, all the time. Forget the hassle of looking for a trusted reliable cleaner and get your maid NOW!</p>
        </div>
        <div class="section-2-item">
        <form method="POST">
            <input type="submit" name="book" value="BOOK NOW" class="section-2-button">
            </form>
        </div>
    </section>

    <div class="section-3">
        <div class="section-3-item">
            <i class="fas fa-user-friends"></i>
            <h3>SKLILLED CLEANERS</h3>
            <p>All our Maids are professional cleaners. Trained, trusted and love to help our customers and <br> give your home the care it needs.</p>
        </div>
        <div class="section-3-item">
            <i class="fas fa-clock"></i>
            <h3>ALWAYS ON TIME</h3>
            <p>You can count on us! Our maids are on always on time, we show up on time and finish our task on time.</p>
        </div>
        <div class="section-3-item">
            <i class="fas fa-broom"></i>
            <h3>BEST CLEANING EQUIPMENT</h3>
            <p>Cleaning is our game, and being attentive to details is what makes Cleanak special!</p>
        </div>
    </div>
    </section>';

     include'index.php';
    ?>