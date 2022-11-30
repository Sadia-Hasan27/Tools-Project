<?php
 session_start();
  //session_destroy();
  $con=mysqli_connect("localhost","root","","userform");
 
if(mysqli_connect_error()){
    echo"<script>
              alert('cannot connect to database');  
                window.location.href='mycart.php';
                </script>";
                exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['quote']))
    {
        $query1="INSERT INTO `order_manager`( `name`, `phone`, `address`, `daddress`,`pay_mode`) VALUES ('$_POST[name]','$_POST[phone]','$_POST[address]','$_POST[daddress]','$_POST[pay_mode]')";
        
        if(mysqli_query($con,$query1))
        {
            $order_id=mysqli_insert_id($con);
        $query2="INSERT INTO `user_order`( `order_id`,`item_name`, `price`, `quantity`) VALUES (?,?,?,?)";
        $stmt=mysqli_prepare($con,$query2);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt,"isii",$order_id,$item_name,$price,$quantity);
            foreach($_SESSION['cart'] as $key => $values)
            {
                $item_name=$values['item_name'];
                $price=$values['price'];
                $quantity=$values['quantity'];
                 mysqli_stmt_execute($stmt);
            }
            
          unset($_SESSION['cart']);
          
            echo"<script>
            alert('order placed');  
              window.location.href='pricechart.php';
              </script>";
          
        }
        else{
            echo"<script>
              alert('sql query prepare error');  
                window.location.href='mycart.php';
                </script>";

        }
        }
        else{
            echo"<script>
              alert('sql error');  
                window.location.href='mycart.php';
                </script>";

        }
    }
}
?>