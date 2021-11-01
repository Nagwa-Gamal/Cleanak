

<?php 
include 'db.php';
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');



      
      
      
    

    

 ?>
 <!DOCTYPE html>
 <html>
 <head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Acme|Arizonia|Lobster|Pacifico|Courgette&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="fontawesome-free-5.11.2-web/css/all.css">

        <link rel="stylesheet" href="css/clea.css">
  <title>money</title>
   <style type="text/css">
        
    h1{
    text-align: center;
        color: #0DA5FF;

        }
/***********/
.time-price {
    display: flex;
    margin-top: 100px;
}

.time-price .time-price-item {
    flex: 1;
    margin: 1rem;
    border: 1px #D6DBDF solid;
}

.time-price .time-price-item:nth-child(1) {
    margin-left: 13rem;
}

.time-price .time-price-item:nth-child(2) {
    margin-right: 13rem;
}

.time-price .time-price-item p {
    font-size: 23px;
    letter-spacing: 0.1rem;
    color: #0DA5FF;
    margin: 2.5rem 1.5rem;
}

.time-price .time-price-item i {
    font-size: 30px;
    margin-right: 1rem;
}

   </style>
 </head>
 <body>
   <section class="time-price">
        <div class="time-price-item">
            <p><i class="fas fa-stopwatch"></i>Duration: <?php echo $_SESSION['duration']?></p>
        </div>
        <div class="time-price-item">
            <p><i class="fas fa-shopping-cart"></i>Total Price:<?php echo $_SESSION['price']?> </p>
        </div> <!--END OF TIME PRICE -->
    </section>
    <h1>Thank you for using our app </h1>
 </body>
 </html>
