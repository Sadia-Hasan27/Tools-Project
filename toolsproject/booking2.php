<?php

include './components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location: booking2.php');
}

if(isset($_POST['cancel'])){

   $booking_id = $_POST['booking_id'];
   $booking_id = filter_var($booking_id, FILTER_SANITIZE_STRING);

   $verify_booking = $conn->prepare("SELECT * FROM `bookings` WHERE booking_id = ?");
   $verify_booking->execute([$booking_id]);

   if($verify_booking->rowCount() > 0){
      $delete_booking = $conn->prepare("DELETE FROM `bookings` WHERE booking_id = ?");
      $delete_booking->execute([$booking_id]);
      $success_msg[] = 'Memo cancelled successfully!';
   }else{
      $warning_msg[] = 'Memo cancelled already!';
   }
   
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint"content= "width =divice-width,initial-scale=1.0">
         <!-- <script src="js/script.js" ></script>  -->
            <title>Online Product Transportation Booking System</title>
            <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">-->
            <link rel="stylesheet" href="booking2.css">
            
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://kit.fontawesome.com/83cf55c0de.js"></script>
            
           
    </head>
    <body>
        <header>
            
           
            
                <img class="logo"src="img/complogo1.png" style="margin-top:2%" width="140" height="130" alt="logo">
                <!--<img class="logo"src="clogo.png" width="140" height="100">-->
               
                <nav class="navbar">
            
                  <ul>
                       <li ><a href="index.php">Home</a></li>
                       <li><a href="about.php">About</a></li>
                       <li><a href="#">Service</a>
                      
                        <ul class="dropdown">
                            <li><a href="joboffer.php">Post A Job</a></li>
                           
                           

                        </ul>
                        </li>
                       
                       <li><a href="#">Booking</a>
                        <ul>
                            <li><a href="price-chart.php">Price-chart</a></li>
                            <li><a href="booking.php">Quote</a></li>
                            <li><a href="booking2.php">Get memo</a></li>
                            
                        </ul>
                       </li>
                       <li><a href="contact.php">Contact Us</a></li>
                       <li><a href="messages.php">Feedback</a></li>
                       
                        <!-- <a href="#login"class="top-btn">Login</a> -->
                    </ul>
            </nav>

            <a href="beforelogin.php" class="icon">
              <i class="fa-regular fa-user" id="login-btn" ></i> 
              
          </a>
                       
                   
        </header>

        <section class="book" >
            <div class="img-container">
                <img src="img/booking.png" id="img-slider" >
                <!-- <div class="content">
                    <h2>Booking</h2>
                </div> -->
                
            </div>
        </section>

        
        <section class="bookings">

   <h1 class="heading" >My Memo</h1>

   <div class="box-container">

   <?php
      $select_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE user_id = ?");
      $select_bookings->execute([$user_id]);
      if($select_bookings->rowCount() > 0){
         while($fetch_booking = $select_bookings->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Booking id : <span><?= $fetch_booking['booking_id']; ?></span></p>
      <p>Name : <span><?= $fetch_booking['name']; ?></span></p>
      <p>Email : <span><?= $fetch_booking['email']; ?></span></p>
      <p>Number : <span><?= $fetch_booking['number']; ?></span></p>
      <p>Adddress : <span><?= $fetch_booking['address']; ?></span></p>
      <p>Destination Address : <span><?= $fetch_booking['daddress']; ?></span></p>
      <p>Item-name : <span><?= $fetch_booking['items']; ?></span></p>
      <p>Check in : <span><?= $fetch_booking['check_in']; ?></span></p>
      
      <p>Quantity : <span><?= $fetch_booking['quantity']; ?></span></p>
      <p>Quantity type : <span><?= $fetch_booking['qty_type']; ?></span></p>
      <p>Payment method : <span><?= $fetch_booking['payment_method']; ?></span></p>
      <p>Payment Status : <span><?= $fetch_booking['pay_status']; ?></span></p>
      
      <form action="booking2.php" method="POST">
         <input type="hidden" name="booking_id" value="<?= $fetch_booking['booking_id']; ?>">
         <input type="submit" value="Cancel Memo" name="cancel" class="btn" onclick="return confirm('cancel this Memo?');">
         
      </form>
   </div>
   <?php
    }
   }else{
   ?>   
   <div class="box" style="text-align: center;">
      <p style="padding-bottom: .5rem; text-transform:capitalize; color:black;">No Memo found!</p>
      <a href="booking.php#reservation" style="text-decoration:none" class="btn">Get new </a>
   </div>
   <?php
   }
   ?>
   </div>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include './components/message.php'; ?>

<footer>
                  
                    
                  <div class="row">
                      <div class="col">
                       <h3>Office <div class="underline"><span></span></div></h3>
                       <p>Cinema Place,K.C.D road,<br> Chittagong</p> 
                       <p class="email-id">fourstaren23@gmail.com</p> 
                       <h4>+088-01849882662</h4> 
                          
                  </div>
                  <div class="col">
                      <h3>Links <div class="underline"><span></span></div></h3>
                      <ul class="link">
                          <li><a href="index.php">Home</a></li>
                          <li><a href="about.php">About</a></li>
                          <li><a href="joboffer.php">Post A Job</a></li>
                          <li><a href="booking.php">Booking</a></li>
                          <li><a href="contact.php">Contact Us</a></li>
                          <li><a href="messages.php">Feedback</a></li>
                           
                      </ul>
                         
                 </div>
                 <div class="col">
                  <h3>Contact Hour <div class="underline"><span></span></div></h3>
                  <p>Saturday - Thursday<br> 11.00 AM - 3.00 PM<br>4.30 PM - 3.00 AM</p> 
                  <br><br>
                  <p >Friday we close our office</p> 
                  
                     
             </div>
                 <div class="col">
                  <h3>Follow Us <div class="underline"><span></span></div></h3>
                  <!-- <form >
                      
                      <i class="fa-solid fa-envelope fa-bounce" style=" --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; --fa-bounce-rebound: 0;" ></i>
                      
                      <input type="email" placeholder="Enter your email" required>
                      <button type="submit"><i class="fa-solid fa-arrow-right"></i></button>
      
                  </form> -->
                  <div class="social-icons">
                      <i class="fa-brands fa-facebook"></i>
                      <i class="fa-brands fa-instagram"></i>
                      <i class="fa-brands fa-whatsapp"></i>
                  </div>
             </div>
              </div>
              <hr>
              <p class="copyright"> Easy Transportation System <i class="fa-regular fa-copyright"></i> 2022- All Rights Reserved</p>
          </footer>
    </body>
</html>