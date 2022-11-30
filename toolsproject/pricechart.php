 <?php
 session_start();
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
                       <li><a href="#"> Service</a>
                      
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
                       
                         <!-- <a href="#login"class="top-btn">Login</a>  -->
                    </ul>
            </nav>

            <a href="beforelogin.php" class="icon">
                <i class="fa-regular fa-user" id="login-btn" ></i> 
                
            </a>
             <!-- <button type="button" class="btn-light"><a href="logout-user.php">Logout</a></button>  -->
        </nav>          
                   
        </header>
        <section class="price-chart" >
            <div class="img-container">
                <img src="img/price2.jpg" id="img-slider" >
                
            </div>
        </section>

        <section><div>
            
        <a href="mycart.php" class="btn btn-outline-success text-center" >My Cart</a> 
       </div>
       </section> 
       <h1 class="container text-center text-white bg-warning mt-5 p-3 rounded shadow"> Products</h1>
<div class="container mt-5">
    <div class="row">
              <div class="col-lg-3" >      
                  <form action="managecart.php" method="POST">
                  <div class="card" >
                     <img src="img/cloth.webp" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Cloths item</b></h5>
                          
                          <p class="card-text"> Price : 1 Ton - Tk. 300<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Cloths item">
                          <input type="hidden" name="price" value="300">
                       </div>
                  </div>
                  </form>
              </div>

              <div class="col-lg-3">
                  <form action="managecart.php" method="POST">
                  <div class="card" >
                     <img src="img/mechine.jfif" class="card-img-top"style="height:120px" >
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Machineries item</b></h5>
                          
                          <p class="card-text"> Price: 1 Ton - Tk. 800<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Machineries item">
                          <input type="hidden" name="price" value="800">
                       </div>
                  </div>
                  </form>
              </div>
            
            
              <div class="col-lg-3">
                  <form action="managecart.php" method="POST">
                  <div class="card">
                     <img src="img/pipe.jpg" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Pipe items</b></h5>
                          
                          <p class="card-text"> Price:  1 Ton - 300tk<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Pipe items">
                          <input type="hidden" name="price" value="300">
                       </div>
                  </div>
                  </form>
               </div>

              <div class="col-lg-3">
                  <form action="managecart.php" method="POST">
                  <div class="card" >
                     <img src="img/electronnic.jpg" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Electronic items</b></h5>
                          
                          <p class="card-text"> Price:  1 Ton - 700tk<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Electronic items">
                          <input type="hidden" name="price" value="700">
                       </div>
                  </div>
                  </form>
              </div>


               <div class="col-lg-3 mt-5">
                  <form action="managecart.php" method="POST">
                  <div class="card" >
                     <img src="img/food.webp" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Food items</b></h5>
                          
                          <p class="card-text"> Price:  1 Ton - 600tk<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Food items">
                          <input type="hidden" name="price" value="600">
                       </div>
                  </div>
                  </form>
              </div>

               <div class="col-lg-3 mt-5">
                  <form action="managecart.php"method="POST">
                  <div class="card" >
                     <img src="img/medical.jpg" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Medical items</b></h5>
                          
                          <p class="card-text"> Price:  1 Ton - 500tk<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Medical items">
                          <input type="hidden" name="price" value="500">
                       </div>
                  </div>
                  </form>
              </div>

              <div class="col-lg-3 mt-5">
                  <form action="managecart.php" method="POST">
                  <div class="card">
                     <img src="img/Cosmetic.webp" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Cosmetic items</b></h5>
                          
                          <p class="card-text"> Price:  1 Ton - 550tk<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Cosmetic items">
                          <input type="hidden" name="price" value="550">
                       </div>
                  </div>
                  </form>
             </div>
        

              <div class="col-lg-3 mt-5">
                  <form action="managecart.php" method="POST">
                  <div class="card">
                     <img src="img/cucary.jpg" class="card-img-top" style="height:120px">
                       <div class="card-body text-center">
                         <h5 class="card-title"><b>Cucaries item</b></h5>
                          
                          <p class="card-text"> Price:  1 Ton - 650tk<br><br>
                                                 
                          <button type="submit" name="add_to_cart" class="btn btn-info" >Add To Cart</button>
                          
                          <input type="hidden" name="item_name" value="Cucaries item">
                          <input type="hidden" name="price" value="650">
                       </div>
                  </div>
                  </form>
              </div>
        
        
         </div>
    </div>

        
        
        
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