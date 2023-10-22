
<?php  include('../connection.php');
if(!isset($_SESSION['user_email'])){
  header('Location:../loginform.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .product-form {
    margin-top: 100px;
}
    </style>
</head>
<body>
<?php include('include/header.php');?>


   <div class="container">
        <div class="product-form container-fluid text-bg-light p-3">
            <?php
              
    

    $order_id = $_POST['orderCartTotalPayment'];

    $total = 0;
    $sql = "SELECT * FROM cart WHERE order_action = '$order_id'";
    $query_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($query_run)){
        $orname = $row['order_name'];
        $Product_image = $row['order_image'];
        $orPrice = $row['order_price'];
        $orQty = $row['order_qty'];
        $subTotal = $orPrice * $orQty;
        $total +=$subTotal;

        echo'
                        <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" readonly  class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="'.$orname.'">
                    <label for="floatingInputGrid">Product Name</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" readonly  class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="Php '.number_format($orPrice, 2).'">
                    <label for="floatingInputGrid">Price</label>

                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" readonly  class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="'.$orQty.'">
                    <label for="floatingInputGrid">Quantity</label>

                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <input type="text" readonly  class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="Php '.number_format($subTotal, 2).'">
                    <label for="floatingInputGrid">Subtotal</label>

                    </div>
                </div>
                </div>';

    }
            ?>
            
                    <div class="form-floating">
                        <input type="text" readonly class="form-control " id="floatingPassword" value = "Php: <?php echo number_format($total,2) ?>">
                        <label for="floatingPassword">Total price:</label>
                    </div>

              
                    <form action="receipt.php" method="post">

                                <?php

                                $order_id = $_POST['orderCartTotalPayment'];

                                $total = 0;
                                $sql = "SELECT * FROM cart WHERE order_action = '$order_id'";
                                $query_run = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($query_run)){
                                    $orname = $row['order_name'];
                                    $orPrice = $row['order_price'];
                                    $orQty = $row['order_qty'];
                                    $dateInserted = $row['date_inserted'];
                                    $PID= $row['pid'];
                                    $subTotal = $orPrice * $orQty;
                                    $total +=$subTotal;

                                    // echo''.$orname.' <br>';
                                    // echo '<input type="text" value="'.$orname.'" > <br>';
                                    // echo''.$orPrice.' <br>';
                                    // echo''.$orQty.' <br>';
                                    // echo''.$subTotal.' <br>';
                                }
                                ?>
                                <input type="hidden" value="<?php echo $dateInserted ?>" name="Date_inserted">
                                <input type="hidden" value="<?php echo $PID ?>" name="pid">
                                <input type="hidden" value="<?php echo $subTotal ?>" name="subTotal">
                                <input type="hidden" value="<?php echo $order_id ?>" name="Product_name"> 
                                <!-- <input type="text" value="Total price is: <?php echo $total ?>"> -->
                                <input type="hidden" value="<?php echo $total ?>" name="Total_payment">
                                <!-- <input type="text" name="amountReceived" > -->
                                
                                <div class="form-floating">
                                <input type="number" value="<?php echo $total ?>" min="<?php echo $total ?>" name="amountReceived" required class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Payment Amount</label>
                            </div>
                            <div class="d-grid gap-2">
                               
                            <input type="submit"  class="btn btn-primary" value="sumbit" name="submit">
                            </div>
                            
                                </form>
    </div>


<?php include('include/footer.php');?>    
</body>
</html>