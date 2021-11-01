
<?php 
$title="pricing";

$link1='<span >HOME</span>';
$link2='<span >HOW IT WORK</span>';
$link3='<span >PRICING</span>';
$link4='<span >CONTACT</span>';
$link6='<span >LOG IN</span>';

include 'controller/db.php';

 
session_start();
if( $_SESSION['username'] =='')
    header('location:login.php');

  $error=array('fname'=>'','lname'=>'','email'=>'','phone'=>'','address'=>'','date'=>'');

  if(isset($_POST['booking_now']))
{

/****************validation*******/



            if(empty($_POST['lastname']))
{
$error['lname']='A last name is required <br/>';
}
else
{
    $lname=$_POST['lastname'];
    if(!preg_match('/^[a-zA-z\s]+$/', $lname))
    {
        $error['lname']='Name must be letters and spaces only';
    }

}
           if(empty($_POST['fristname']))
{
$error['fname']='A first name is required <br/>';
}
else
{
    $fname=$_POST['fristname'];
    if(!preg_match('/^[a-zA-z\s]+$/', $fname))
    {
        $error['fname']='Name must be letters and spaces only';
    }

}

if(empty($_POST['email']))
{
$error['email']='An email is required <br/>';
}
else
{
    $email=$_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error['email']='email must be a valid email address';
    }

}
if(empty($_POST['phone']))
{
$error['phone']='A phone is required <br/>';
}
else
{
    $phone=$_POST['phone'];
    if(!preg_match('/^[0-9]+$/', $phone))
    {
        $error['phone']='phone must be numbers  only';
    }
    if(strlen($phone)<11)
           $error['phone']='phone must be 11 number';

}
if(empty($_POST['address']))
{
$error['address']='An address is required <br/>';
}
else
{
    $address=$_POST['address'];
    if(!preg_match('/^[0-9a-zA-z]+$/', $address))
    {
        $error['address']='address must be letters and numbers only';
    }

}
if(empty($_POST['bdate']))
{
$error['date']='A date is required <br/>';
}



if($error['fname']==''&&$error['lname']==''&&$error['email']==''&&$error['phone']==''&&$error['address']==''){




    $frist=  $_POST['fristname'];
  $last=$_POST['lastname'];
 $email=$_POST['email'];
 $phone= $_POST['phone'];
  $address=$_POST['address'];
  $bookdate=$_POST['bdata'];
  $package=$_POST['package'];
    $chk=""; 
   $price;
        $Duration;
   
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
if(!$dbconnect)
 echo 'Error in connection : '.mysqli_connect_error();
else
{


      $query = "SELECT * FROM sign_up where email= '$email'";
         $result = mysqli_query($dbconnect, $query);
$user_id='';
    if (mysqli_num_rows($result) > 0)
{ while($row = $result->fetch_assoc()) {
    $user_id=$row["users_id"];

}}
if(isset($_POST['techno1']))
      $chk .= 'Oven'.",";  
 if(isset($_POST['techno2']))
      $chk .= 'Fridge'.",";  
 if(isset($_POST['techno3']))
      $chk .= 'Cabinets'.","; 


      if($chk!="") 
    { if ($chk=="Oven,Fridge,Cabinets,") {
   
   if ($package=="80-120 M") {

    $price=340;

    $Duration="420 mins (5 Hours and half)";
       $connection= mysqli_connect($host, $user, $passwd, $database);
    
     $query = sprintf("INSERT INTO customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
                           mysqli_real_escape_string($connection,''),

                     mysqli_real_escape_string($connection,$first),
                                          mysqli_real_escape_string($connection,$last),

                      mysqli_real_escape_string($connection,$email),
                       mysqli_real_escape_string($connection,$phone),
                       mysqli_real_escape_string($connection,$address),
                       mysqli_real_escape_string($connection,$bookdate),
                       mysqli_real_escape_string($connection,$package),
                           mysqli_real_escape_string($connection,$chk),
                       mysqli_real_escape_string($connection,$price),
                       mysqli_real_escape_string($connection,$Duration),
                                    mysqli_real_escape_string($connection,"Unseen"),
                                      mysqli_real_escape_string($connection,$user_id)


        );
      
            mysqli_query($connection,$query) or die(mysqli_error($connection));
   }
   elseif ($package=="120-160 M") {
    $price=370;
    $Duration="480 mins (6 Hours and half)";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="160-200 M") {
    $price=410;
    $Duration="540 mins (7 Hours and half)";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
    $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="200-250+ M") {
    $price=420;
    $Duration="540 mins (7 Hours and half)";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
   $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }

    } 
     else if ($chk=="Oven,Fridge,"||$chk=="Oven,Cabinets,"||$chk=="Fridge,Cabinets,"||$chk=="Fridge,Oven,"||$chk=="Cabinets,Oven,"||$chk=="Cabinets,Fridge,") {
        
    
     
   if ($package=="80-120 M") {
    $price=300;
    $Duration="360 mins (5 Hours )";

       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
   }
   elseif ($package=="120-160 M") {
    $price=330;
    $Duration="420 mins (6 Hours )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
   $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="160-200 M") {
    $price=370;
    $Duration="480 mins (7 Hours )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
    $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="200-250+ M") {
    $price=380;
    $Duration="480 mins (7 Hours )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }

    } 
    else if ($chk=="Oven," ||$chk=="Fridge,"||$chk=="Cabinets,")  {
        
    
     
   if ($package=="80-120 M") {
    $price=260;
    $Duration="300 mins (4 Hours and half )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
   }
   elseif ($package=="120-160 M") {
    $price=290;
     $Duration="360 mins (5 Hours and half )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
    $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="160-200 M") {
    $price=330;
    $Duration="420 mins (6 Hours and half )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="200-250+ M") {
    $price=340;
    $Duration="420 mins (6 Hours and half )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
   $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
/* end of else if*/
    } /* end of else if one of three*/
}
  else{

   if ($package=="80-120 M") {
    $price=220;
    $Duration="240 mins (4 Hours  )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
   }
   elseif ($package=="120-160 M") {
    $price=250;
     $Duration="300 mins (5 Hours  )";

       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
    $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="160-200 M") {
    $price=290;
    $Duration="360 mins (6 Hours )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
    $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }
   elseif ($package=="200-250+ M") {
    $price=300;
    $Duration="360 mins (6 Hours )";
       $dbconnect= mysqli_connect($host, $user, $passwd, $database);
  $sql="insert into customer (customer_id,fristname,lastname, email,phone,address,booking_date,area,EXTERA_SERVICES,price,Duration,message_state,user_id) values('','$frist','$last','$email',$phone,'$address','$bookdate','$package','$chk',$price,'$Duration','Unseen','$user_id')";
    $data=mysqli_query($dbconnect,$sql);
    
    
   }

}
 }/*end of else*/
mysqli_close($dbconnect);
   
$_SESSION['duration']=$Duration;
$_SESSION['price']=$price;
        header('location:insert.php');
}
}



$content='
 <!-- Turquoise Section -->
 <div class="price">
    <section class="section-1">
        <div class="section-1-item">
            <h1>BOOK YOUR TRUSTED CLEANERS</h1>
        </div>
        <div class="section-1-item">
            <a href="index.html">HOME &nbsp;</a>
            <span>&gt;</span>
            <a href="how_it_works.html">&nbsp; BOOK A MAID</a>
        </div>
    </section> <!-- End of Section-1 -->

    <section>
        <div class="cross-bar-1">
            <div class="cross-bar-1-item">
                <h3>1.SELECT BASE PACKAGES</h3>
                <p>Which package do you need?</p>
            </div>
        </div>
    </section>

    <!-- <section class="cross-bar-1">
        <div class="cross-bar-1-item">
            <h3>SELECT BASE PACKAGES</h3>
            <p>Which package do you need?</p>
        </div>
        <div class="cross-bar-1-item">
        </div>
    </section> -->

    <section class="base-packages">
        <div class="base-packages-item">
            <hr>
            <h3>HOUSE SPACE 80-120 M</h3>
            <h4><span>EGP</span>220</h4>
            <hr>
            <p><i class="far fa-clock"></i>240 mins (4 Hours)</p>
            <hr>
            <p class="description">
                Dusting and sweeping of all surfaces.
                Kitchen and bathrooms cleaning.
                Glass/Mirror cleaning.
                Vacuuming carpets.
                Tables and chairs cleaned.
                Furniture dusted.
                Tub and shower tiles scrubbed.
                disinfected and rinsed Toilets.
                Cabinets exterior cleaned.
                Vacuuming carpets.
                Setting up beds.
            </p>
            <hr>
        </div>
        <div class="base-packages-item">
            <hr>
            <h3>HOUSE SPACE 120-160 M</h3>
            <h4><span>EGP</span>250</h4>
            <hr>
            <p><i class="far fa-clock"></i>300 mins (5 Hours)</p>
            <hr>
            <p class="description">
                Dusting and sweeping of all surfaces.
                Kitchen and bathrooms cleaning.
                Glass/Mirror cleaning.
                Vacuuming carpets.
                Tables and chairs cleaned.
                Furniture dusted.
                Tub and shower tiles scrubbed.
                disinfected and rinsed Toilets.
                Cabinets exterior cleaned.
                Vacuuming carpets.
                Setting up beds.
            </p>
            <hr>
        </div>
        <div class="base-packages-item">
            <hr>
            <h3>HOUSE SPACE 160-200 M</h3>
            <h4><span>EGP</span>290+</h4>
            <hr>
            <p><i class="far fa-clock"></i>360 mins (+6 Hours)</p>
            <hr>
            <p class="description">
                Dusting and sweeping of all surfaces.
                Kitchen and bathrooms cleaning.
                Glass/Mirror cleaning.
                Vacuuming carpets.
                Tables and chairs cleaned.
                Furniture dusted.
                Tub and shower tiles scrubbed.
                disinfected and rinsed Toilets.
                Cabinets exterior cleaned.
                Vacuuming carpets.
                Setting up beds.
            </p>
            <hr>
        </div>
        <div class="base-packages-item">
            <hr>
            <h3>HOUSE SPACE 200-250+ M</h3>
            <h4><span>EGP</span>300+</h4>
            <hr>
            <p><i class="far fa-clock"></i>360 mins (6+ Hours)</p>
            <hr>
            <p class="description">
                Dusting and sweeping of all surfaces.
                Kitchen and bathrooms cleaning.
                Glass/Mirror cleaning.
                Vacuuming carpets.
                Tables and chairs cleaned.
                Furniture dusted.
                Tub and shower tiles scrubbed.
                disinfected and rinsed Toilets.
                Cabinets exterior cleaned.
                Vacuuming carpets.
                Setting up beds.
            </p>
            <hr>
        </div>
    </section>

    <section class="cross-bar-2">
        <div class="cross-bar-2-item">
            <h3>2.EXTRA SERVICES</h3>
            <p>Add Custom Extra Services to your selected package.</p>
        </div>
    </section>

    <section class="extra-services">
        <!-- FIRST ITEM -->
        <div class="extra-services-item extra-services-item-1">
            <div class="detergents">
                <h4>Detergents</h4>
                <p>If you will not select this service, please make sure you have all cleaning materials and cleaning cloths.</p>
            </div>
            <div class="detergents">
                <p><i class="far fa-clock"></i>0 min</p>
            </div>
            <div class="detergents">
                <p><i class="fas fa-tag"></i>EGP FREE</p>
            </div>
            <div class="detergents">
            </div> <!-- END OF FIRST ITEM -->
        </div>
        <!-- SECOND ITEM -->
        <div class="extra-services-item extra-services-item-2">
            <div class="oven">
                <h4>Oven Cleaning </h4>
                <p>Insides Cleaning</p>
            </div>
            <div class="oven">
                <p><i class="far fa-clock"></i>30 min</p>
            </div>
            <div class="oven">
                 <p><i class="fas fa-tag"></i>EGP 40.00</p>
             </div>
            <div class="oven">
             </div>
        </div> <!-- END OF SECOND ITEM -->
        <!-- THIRD ITEM -->
        <div class="extra-services-item extra-services-item-3">
                <div class="fridge">
                    <h4>Fridge Cleaning </h4>
                    <p>Insides Cleaning</p>
                </div>
                <div class="fridge">
                    <p><i class="far fa-clock"></i>30 min</p>
                </div>
                <div class="fridge">
                     <p><i class="fas fa-tag"></i>EGP 40.00</p>
                </div>
                <div class="fridge">
                </div>
        </div> <!-- END OF THIRD ITEM -->
        <!-- FOURTH ITEM -->
        <div class="extra-services-item extra-services-item-4">
                <div class="cabinet">
                    <h4>Cabinets  Cleaning </h4>
                    <p>Insides Cleaning</p>
                </div>
                <div class="cabinet">
                    <p><i class="far fa-clock"></i>30 min</p>
                </div>
                <div class="cabinet">
                    <p><i class="fas fa-tag"></i>EGP 40.00</p>
                </div>
                <div class="cabinet">
                </div>
        </div> <!-- END OF FOURTH ITEM -->
    </section>

    <section class="cross-bar-3">
        <div class="cross-bar-3-item">
            <h3>3.BOOKING SUMMARY</h3>
            <p>Please provide us with your contact information.</p>
         </div>
    </section>


    <!-- INFO SECTION -->
    <div class="form1">
    <form action="" method="POST">
    <section class="user-info">
        <div class="user-info-item" style="  margin-bottom: 35px;">
            <div class="inner-item">
                <h4>First Name *</h4>
                <input type="text" name="fristname">
                                    <div class="red-text" >'. $error['fname'].'</div>

            </div>
            <div class="inner-item">
                <h4>Last Name *</h4>
                <input type="text" name="lastname">
                                    <div class="red-text" >'. $error['lname'].'</div>

            </div>
        </div>
        <div class="user-info-item" style="  margin-bottom: 35px;">
            <div class="inner-item">
                <h4>E-mail Address *</h4>
                <input type="email" name="email">
                                    <div class="red-text" >'. $error['email'].'</div>

            </div>
            <div class="inner-item">
                <h4>Phone Number *</h4>
                <input type="text" name="phone">
                                    <div class="red-text" >'. $error['phone'].'</div>

            </div>
        </div>
        <div class="user-info-item" style="  margin-bottom: 35px;">
            <div class="inner-item">
                <h4>Full Address *</h4>
                <input type="text" name="address">
                                    <div class="red-text" >'. $error['address'].'</div>

            </div>
            <div class="inner-item">
                <h4>Booking Date *</h4>
                <input type="date" name=" bdata" >
                                                    <div class="red-text" >'. $error['date'].'</div>

            </div>
            </div>
        <div class="user-info-item" style="  margin-bottom: 35px;">

                <div class="inner-item">
                <h4>SELECT PACKAGE *</h4>
                <select class="" name="package">

         <option value="80-120 M">80-120 M</option>
          <option value="120-160 M">120-160 M</option>
          <option value="160-200 M">160-200 M</option>
        <option value="200-250+ M">200-250+ M</option>
        </select>
            </div>
          
    <div class="inner-item">
                <h4>EXTERA SERVICES *</h4>
               <div id="checkb" >
        <label for="checkbox_agree">
          <input  id="checkbox_agree" class="ch" type="checkbox" name="techno1" value=" Oven">
          Oven
          </label>
        <label for="checkbox1_agree">
          <input id="checkbox1_agree"  class="ch" type="checkbox" name="techno2" value=" Fridge">
        
         Fridge
          </label>
       
        <label for="checkbox2_agree">
        <input id="checkbox2_agree" class="ch"  style="border:  darkgrey;
  outline: none;
  margin: 0;
  padding: 0;
  height: 20px;
  width: 20px;
  right: calc(50% - 35px);
  
" type="checkbox" name="techno3" value="Cabinets">
        Cabinets
        </label>
        </div>
            </div>
        </div>
    </section> <!-- END OF INFO SECTION -->

    <section class="cross-bar-4">
        <div class="cross-bar-4-item">
            <p>We will confirm your appointment with you by phone or e-mail within 24 hours of receiving your request.</p>
        </div>
        <div class="cross-bar-4-item">
            <input type="submit" name="booking_now" value="CONFIRM BOOKING">
        </div>      
    </section>
    </div>
    
    </form>
    </div>
';  

     include'index.php';
    ?>
  
 
