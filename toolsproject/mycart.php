  <?php
 session_start();
  //session_destroy();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint"content= "width =divice-width,initial-scale=1.0">
        <script src="js/script.js" ></script>
            <title>Online Product Transportation Booking System</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
            
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
           
             <link rel="stylesheet" href="pricechart.css"> 
            
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
    <section class="price-chart" >
        <div class="img-container">
            <img src="img/booking.png" id="img-slider" >
            
        </div>
    </section>

    <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center border rounded bg-light my-5">
            <h1>MY CART</h1>
          </div>

        <div class="col-lg-9 ">
            <table class="table">
                <thead class="text-center">
                     <tr>
                     <th scope="col">Serial No</th>
                     <th scope="col">Category Name</th>
                     <th scope="col">Item Price</th>
                     <th scope="col">Quantity</th>
                     <th scope="col">Total</th>
                     <th scope="col"></th>
                     </tr>
                </thead>
              <tbody class="text-center">
                <?php
               
                if(isset($_SESSION['cart']))
                {
                  foreach($_SESSION['cart'] as $key => $value )
                  {
                    $sr=$key+1;
                    
                    echo"
                    <tr>
                    <td>$sr</td>
                    <td>$value[item_name]</td>
                    <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                    <td>
                    <form action='managecart.php' method='POST'>
                    <input class='text-center iquantity' name='mod_quantity'onchange='this.form.submit();' type='number' value='$value[quantity]'  min='1' max='60'>
                    <input type='hidden' name='item_name' value='$value[item_name]'>
                    </form>
                    </td>
                    <td class='itotal'></td>

                    
                    
                    </tr>
                    ";

                  }
               }
                ?> 
                    
                        
             </tbody>
          </table>
       </div>
    
        
       <div class="col-lg-3">
          <div class="border bg-light rounded p-4">
             <!-- <h4> Grand Total:</h4>
            <h5 class="text-right" id="gtotal"></h5> 
            <br>  -->

          <?php
          if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) 
          {
            ?>
            
               <form action="quote.php" method="POST">
                <div class="form-group">
               <label >Name</label>
               <input type="text" name="name" class="form-control" required >
              </div>
              <div class="form-group">
               <label >Phone number</label>
               <input type="number" name="phone"class="form-control" required>
              </div>
              <div class="form-group">
               <label >Address</label>
               <input type="text" name="address"class="form-control" required>
              </div>
              <div class="form-group">
               <label >Deliver-address</label>
               <input type="text" name="daddress"class="form-control" required>
              </div>
              <br>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                       Cash On Delivery
                      </label>
              </div>
              <br>
              
                <button class="btn btn-primary btn-block" name="quote">Make a Quote</button>
               </form>
           <?php
           }
           ?>
              </div>
        
      </div>
    
    
    </div>
</div>

<script>
  // var gt=0;
  var iprice=document.getElementsByClassName('iprice');
  var iquantity=document.getElementsByClassName('iquantity');
  var itotal=document.getElementsByClassName('itotal');
  //  var gtotal=document.getElementsById('gtotal');
  function subTotal()
  {
    //gt=0;
    for(i=0;i<iprice.length;i++)
    {
       itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        // gt= gt+(iprice[i].value)*(iquantity[i].value);
    }
     //gtotal.innerText=gt;
  }
   subTotal();
</script>


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
                          <li><a href="spservice.php">Special Service</a></li>
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
                  <h3>Follow  Us <div class="underline"><span></span></div></h3>
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
