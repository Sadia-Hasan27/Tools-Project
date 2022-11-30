<?php

include './components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location:messages.php');
}
if(isset($_POST['send'])){

    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_STRING);
 
    $verify_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $verify_message->execute([$name, $email, $number, $message]);
 
    if($verify_message->rowCount() > 0){
       $warning_msg[] = 'message sent already!';
    }else{
       $insert_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
       $insert_message->execute([$id, $name, $email, $number, $message]);
       $success_msg[] = 'message send successfully!';
    }
 
 }
 
 ?>
 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint"content= "width =divice-width,initial-scale=1.0">
        <script src="js/script.js" ></script>
            <title>Online Product Transportation Booking System</title>
            <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">-->
            <link rel="stylesheet" href="messages.css">
            <script src="message.js"></script>
            
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
                            <li><a href="pricechart.php">Price-chart</a></li>
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
                <img src="img/contact.jpg" id="img-slider" >
                <!-- <div class="content">
                    <h2>Booking</h2>
                </div> -->
                
            </div>
        </section>
        <!-- <section class="reviews" id="reviews">

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">
         <div class="swiper-slide box">
            <img src="img/profile1.png" alt="">
            <h3>Kamrul Hasan</h3>
            <p>They have best transport system.they never desponded me by their service.</p>
         </div>
         <div class="swiper-slide box">
            <img src="img/profile1.png" alt="">
            <h3>Anwar Islam</h3>
            <p>They are very good in behaviour and always tranfer product with safety</p>
         </div>
         <div class="swiper-slide box">
            <img src="img/profile1.png" alt="">
            <h3>Jahid Hasan</h3>
            <p>Good service</p>
         </div>
         <div class="swiper-slide box">
            <img src="img/profile1.png" alt="">
            <h3>Hasan Ali</h3>
            <p>Their products booking price are effortable and I am setisfy with their service </p>
         </div>
         <div class="swiper-slide box">
            <img src="img/profile1.png" alt="">
            <h3>Jashim</h3>
            <p>Booking system is so easy and price planing also good</p>
         </div>
         
      </div>

      <div class="swiper-pagination"></div>
   </div>

</section> -->
<section class="contact" id="contact">

   <div class="row">

      <form action="" method="post">
         <h3>send us message</h3>
         <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
         <input type="number" name="number" required maxlength="10" min="0" max="9999999999" placeholder="enter your number" class="box">
         <textarea name="message" class="box" required maxlength="1000" placeholder="enter your message" cols="30" rows="10"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>

      <div class="faq">
         <h3 class="title"><b>Frequently asked questions</b></h3>
         <div class="box active">
            <h3>how can I Booking?</h3>
            <p>Please go to the booking section ,then click on price-chart you can find there 'Add to cart' option just click on it, then go to 'My cart' above on this page. Just click on it a page  will a page will show where your order entryed then choose your quantity and then fill the right side form then click on 'make a quote' then  You will show a alert box 'Order placed' that's it , your booking will be  confirm .</p>
         </div>
         <!-- <div class="box active">
            <h3>how to cancel Booking?</h3>
            <p>When you press 'Book Now' then a memo page will appear infront of you. there will be a option 'Cancel booking' just click on this button your order will cancel</p>
         </div> -->
         <div class="box active">
            <h3>is there any vacancy?</h3>
            <p>Go to our Service section then click on Job offer you can see there if any vacancy available</p>
         </div>
         <div class="box active">
            <h3>what are payment methods?</h3>
            <p>For now its only offline .In future we will go through online also</p>
         </div>
         
         
      </div>

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