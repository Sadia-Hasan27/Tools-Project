<?php

include './components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   setcookie('user_id', create_unique_id(), time() + 60*60*24*30, '/');
   header('location: booking2.php');
}
if(isset($_POST['check'])){

   $check_in = $_POST['check_in'];
   $check_in = filter_var($check_in, FILTER_SANITIZE_STRING);

   $total_quantity = 0;

   $check_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE check_in = ?");
   $check_bookings->execute([$check_in]);

   while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
      $total_quantity += $fetch_bookings['quantity'];
   }

    
   if($total_quantity >= 60){
      $warning_msg[] = 'Memo not available';
   }else{
      $success_msg[] = 'Memo are available';
   }

}
if(isset($_POST['book'])){

$booking_id = create_unique_id();
$name = $_POST['name'];
$name = filter_var($name, FILTER_SANITIZE_STRING);
$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_STRING);
$number = $_POST['number'];
$number = filter_var($number, FILTER_SANITIZE_STRING);
$address = $_POST['address'];
$address = filter_var($address, FILTER_SANITIZE_STRING);
$daddress = $_POST['daddress'];
$daddress = filter_var($daddress, FILTER_SANITIZE_STRING);
$item_name = $_POST['items'];
$item_name = filter_var($item_name, FILTER_SANITIZE_STRING);
$check_in = $_POST['check_in'];
$check_in = filter_var($check_in, FILTER_SANITIZE_STRING);

$quantity = $_POST['quantity'];
$quantity = filter_var($quantity, FILTER_SANITIZE_STRING);
$qty_type = $_POST['qty_type'];
$qty_type = filter_var($qty_type, FILTER_SANITIZE_STRING);
$payment_method = $_POST['payment_method'];
$payment_method= filter_var($payment_method, FILTER_SANITIZE_STRING);
$pay_status = $_POST['pay_status'];
$pay_status= filter_var($pay_status, FILTER_SANITIZE_STRING);

$total_quantity =0;

$check_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE check_in = ?");
$check_bookings->execute([$check_in]);

while($fetch_bookings = $check_bookings->fetch(PDO::FETCH_ASSOC)){
    $total_quantity  += $fetch_bookings['quantity'];
}

if( $total_quantity >= 60){
   $warning_msg[] = 'Memo not available';
}else{

   $verify_bookings = $conn->prepare("SELECT * FROM `bookings` WHERE user_id = ? AND name = ? AND email = ? AND number = ? AND address = ? AND daddress = ? AND items = ? AND check_in = ? AND  quantity = ? AND qty_type = ? AND payment_method = ? AND pay_status = ?");
   $verify_bookings->execute([$user_id, $name, $email, $number,$address,$daddress,$item_name, $check_in,  $quantity,$qty_type,$payment_method,$pay_status]);

   if($verify_bookings->rowCount() > 0){
      $warning_msg[] = 'Booked alredy!';
   }else{
      $book = $conn->prepare("INSERT INTO `bookings`(booking_id, user_id, name, email, number, address,daddress,items, check_in, quantity, qty_type,payment_method,pay_status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $book->execute([$booking_id, $user_id, $name, $email, $number,$address, $daddress, $item_name, $check_in,  $quantity, $qty_type,$payment_method,$pay_status]);
      $success_msg[] = ' Memo ready successfully!';
   }

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
            <link rel="stylesheet" href="book.css">
            
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
                            <li><a href="booking2.php">Get Memo</a></li>
                            
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

        <div class="book" >
            <div class="img-container">
                <img src="img/booking.png" id="img-slider" >
                <!-- <div class="content">
                    <h2>Booking</h2>
                </div> -->
                
            </div>
        </div>
        
        
        <section class="reservation" id="reservation">

<form action="" method="post">
   <h3>make a memo</h3>
   <div class="flex">
      <div class="box">
         <p>Your name <span>*</span></p>
         <input type="text" name="name" maxlength="50" required placeholder="enter your name" class="input">
      </div>
      <div class="box">
         <p>Your email <span>*</span></p>
         <input type="email" name="email" maxlength="50" required placeholder="enter your email" class="input">
      </div>
      <div class="box">
         <p>Your number <span>*</span></p>
         <input type="number" name="number" maxlength="10" min="0" max="9999999999" required placeholder="enter your number" class="input">
      </div>
      <div class="box">
         <p>Address <span>*</span></p>
         <input type="text" name="address" maxlength="150" required placeholder="enter your address" class="input">
      </div>
      <div class="box">
         <p>Destination address <span>*</span></p>
         <input type="text" name="daddress" maxlength="150" required placeholder="enter your destination address" class="input">
      </div>
      <div class="box">
         <p>Item name <span>*</span></p>
         
         <select name="items" class="input" required>
            
            <option value="1">Pipe</option>
            
            <option value="3">Food items</option>
            <option value="4">Cloths</option>
            
            <option value="6">Machineries item</option>
            <option value="7">Cosmetic items</option>
            <option value="8">Medical items</option>
            <option value="9">Electronnic items
               </option>
            <option value="10">Cucaries item</option>
          </select> 
      </div>
      <div class="box">
         <p>check in <span>*</span></p>
         <input type="date" name="check_in" class="input" required>
      </div>
      
      <div class="box">
         <p>Quantity <span>*</span></p>
         <select name="quantity" class="input" required>
            <option value="1" selected>1-5</option>
            <option value="2">6-10 </option>
            <option value="2">11-15 </option>
            <option value="2">16-20 </option>
            <option value="3">21-25 </option>
            <option value="4">26-30 </option>
            <option value="5">31-35 </option>
            <option value="2">36-40 </option>
            <option value="2">41-45 </option>
            <option value="2">46-50 </option>
            <option value="2">51-55 </option>
            <option value="2">56-60 </option>
        </select>
      </div>
      <div class="box">
         <p>Quantity type <span>*</span></p>
         <select name="qty_type" class="input" required>
            
            <option value="1">Ton</option>
            
        </select>
      </div>
      <div class="box">
         <p>Payment_method <span>*</span></p>
         <select name="payment_method" class="input" required>
            
            <option value="1">Chash</option>
            </select>
      </div>
      <div class="box">
         <p>Pay_status <span>*</span></p>
         <input type="number" name="pay_status"  required placeholder="enter your number" class="input">
      </div>
   </div>
   <input type="submit" value="book now" name="book" class="btn">
</form>

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