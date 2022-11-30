<?php
require("./components/dbcon.php");
?>
<html>
    <head>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://kit.fontawesome.com/83cf55c0de.js"></script>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
<table class='table text-center table-dark'>
  <thead>
    <tr>
      <th scope="col">Order_ID</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Address</th>
      <th scope="col">Deliver_address</th>
      <th scope="col">Pay_mode</th>
      <th scope="col">Orders</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query="SELECT * FROM `order_manager` ";
    $user_result=mysqli_query($con,$query);
    while($user_fetch=mysqli_fetch_assoc($user_result))
    {
        echo"
        <tr>
      
        <td>$user_fetch[order_id]</td>
        <td>$user_fetch[name]</td>
        <td>$user_fetch[phone]</td>
        <td>$user_fetch[address]</td>
        <td>$user_fetch[daddress]</td>
        <td>$user_fetch[pay_mode]</td>
        <td>
        <table class='table text-center table-dark'>
                   <thead>
                    <tr>
                  <th scope='col'>Item Name</th>
                 <th scope='col'>Price</th>
                  <th scope='col'>Quantity</th>
                  
                </tr>
                 </thead>
                 <tbody>
                 ";
                 $order_query="SELECT * FROM `user_order` WHERE 'order_id' ='$user_fetch[order_id]'";
                 $order_result = mysqli_query($con,$order_query);
                 while($order_fetch=mysqli_fetch_assoc($order_result))
                 {
                  echo"
                  <tr>
                  <td>$user_fetch[item_name]</td>
                  <td>$user_fetch[price]</td>
                  <td>$user_fetch[quantity]</td>
                  </tr>
                  ";
                 }
                 echo"
                 
                 </tbody>
                 </table>
        
        </td>
       
      </tr>
         ";
    }
    ?>
   
    
  </tbody>
</table>
                </div>
            </div>
        </div>
    </body>
</html>