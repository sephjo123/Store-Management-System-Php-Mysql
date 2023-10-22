<?php
include('../connection.php');

if(isset($_POST['submit'])){
    $Product_name = $_POST['Product_name'];
    $Date_inserted = $_POST['Date_inserted'];
    $AmountReceived = $_POST['amountReceived'];
    $Total_amount = $_POST['Total_payment'];
    $AmountChange = $AmountReceived - $Total_amount;
    $Pid = $_POST['pid'];
    // if($AmountReceived < $Total_amount){

    // }

}
?>
<?php 
if(!isset($_SESSION['user_email'])){
  header('Location:../loginform.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .container{
            margin-top: 200px;
        }
    </style>
</head>
<body class="bg-body-secondary">

<a href="index.php" class="btn btn-primary">My Store</a>
<button class="btn btn-primary" id="printButton">Print</button>
    <div class="container position-relative">
        <div class="receipt container-fluid position-relative">
                <div class="card position-absolute top-100 start-50 translate-middle mt-1" style="width: 18rem;" >
                    
                    <div class="card-body ">
                        <h5 class="card-title">KALI STORE</h5>
                        <p class="card-text"><strong>Total:</strong> Php<?php echo number_format($Total_amount, 2) ?></p>
                        <p class="card-text">Cash: Php <?php echo number_format($AmountReceived, 2) ?></p>
                        <p class="card-text">Change: Php <?php echo number_format($AmountChange, 2) ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php
                            $sql = "SELECT * FROM cart WHERE order_action = '1'";
                            $query_run = mysqli_query($conn, $sql);
                            
                            while($row1 = mysqli_fetch_assoc($query_run))
                            // $Sub_Total = $OrPrice * $orQty;
                            {
                                $Qty = $row1['order_qty'];
                                $name = $row1['order_name'];
                                $OrPrice = $row1['order_price'];
                                $Sub_Total = $OrPrice * $Qty;
                            
                                  echo '  <li class="list-group-item">'.$name.'</strong> <strong>Qty:</strong> '.$Qty.'<strong> Subtotal:</strong> Php'. number_format($Sub_Total, 2) .'</li>
                                  ';
                                
                           
                            }
                            ?>
                            
                    </ul>
                    <?php
                            $sql_select1 = "SELECT * FROM product_sales";
                            $query_run1  = $conn->query($sql_select1);
                                $test = mysqli_num_rows($query_run1);
                                $transaction_uniq_num = $test + 1;
                                $transaction_id = 'TR-ID-' ;
                                
                            $sql_select = "SELECT c.id, c.pid, c.order_name, c.order_price, c.order_qty, p.product_quantity 
                            FROM cart c
                            INNER JOIN products p ON c.pid = p.id
                            WHERE order_action = '$Product_name'";
                            $query_run  = $conn->query($sql_select);

                            if (!$query_run) {
                                die("Query failed: " . mysqli_error($conn));
                            }     

                            while ($row = mysqli_fetch_assoc($query_run)) {
                                
                                $Product_ID = $row['id'];
                                $Product_name = $row['order_name'];
                                $pId = $row['pid'];
                                $Product_price = $row['order_price'];
                                $Product_qty = $row['order_qty'];
                                $ProductCurrentQty = $row['product_quantity'];
                                $updateProductQty = $ProductCurrentQty - $Product_qty;
                                // echo ''.$updateProductQty.'';
                                
                                $updateCartSql = "UPDATE cart c
                                JOIN products p ON c.pid = p.id
                                SET c.order_action = '0', 
                                    p.product_quantity = '$updateProductQty'
                                WHERE c.id = '$Product_ID' ";
                                $query_runUpdate = mysqli_query($conn, $updateCartSql);
                                
                                $insertSql = "INSERT INTO product_sales (product_id, transaction_id, or_id, product_name, product_price, product_qty) 
                                VALUES ('$pId','$transaction_id $transaction_uniq_num', '$Product_ID', '$Product_name', '$Product_price', '$Product_qty')";
                                $query_run_insertSql = mysqli_query($conn, $insertSql);

                            }

                            ?>
                    <div class="card-body">
                    <p class="card-text"><strong><?php echo $transaction_id ?><?php echo $transaction_uniq_num ?></strong></p>
                    <p class="card-text"><strong>Date:</stong> <?php echo  date("M d, Y ", strtotime($Date_inserted)) ?></p>
                    </div>
                </div>  
        </div>
    </div>
       
    <script>
        document.getElementById("printButton").addEventListener("click", function () {
            window.print(); // This initiates the browser's print dialog
        });
    </script>
<?php include('include/footer.php');?>    
</body>
</html>