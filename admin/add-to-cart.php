<?php include('../connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <style>
       .table {
    margin-top: 70px;
    text-align: center;
}
    </style>
</head>
<body class="bg-body-secondary">
<div class="text-bg-secondary p-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary text-bg-dark p-3 fixed-top" data-bs-theme="dark">
    <div class="container-fluid ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <h5>My Store</h5>
                </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php">My Store</a></li>
                <li><a class="dropdown-item" href="../logout.php">Log out</a></li>
            </ul>

            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listof-order.php">List of Orders</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="sales_manager.php">Sales Manager</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16">
  <path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h11zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-11z"/>
  <path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V3z"/>
</svg> Manage Product
                </a>
            <ul class="dropdown-menu">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="insert-product.php">Insert Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="manage-products.php">View Product</a>
            </li>
            </ul>

            </li>
            <li class="nav-item">
            <?php
                $popup = $conn->query("SELECT * FROM `cart` WHERE order_action = '1' ")->num_rows;
                ?>
            <a class="nav-link" href="add-to-cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>Cart
            <span class="position-absolute top-1 start-25 translate-middle badge rounded-pill bg-danger">
                <?php echo number_format($popup ); ?>
                
            </span>
            </a>
            </li>
        </ul>
        <form class="d-flex" role="search" method="GET">
        <?php
            $topay = "SELECT * FROM cart WHERE order_action = '1' ORDER BY date_inserted DESC;";
            $query_run_topay = mysqli_query($conn, $topay);
            $total = 0;
                    if($query_run_topay){
                        while($row = mysqli_fetch_assoc($query_run_topay)){
                            
                            $id = $row['id'];
                            $orImage = $row['order_image'];
                            $orName = $row['order_name'];
                            $orDescription = $row['order_description'];
                            $orPrice = $row['order_price'];
                            $orQty = $row['order_qty'];
                            $subTotal = $orPrice * $orQty;
                            
                            $total +=$subTotal;
                        }
            if(mysqli_num_rows($query_run_topay) > 0) {
                echo '
                <div class="input-group">
  <span class="input-group-text"><strong>Amount to pay:</strong></span>
  <input type="text" readonly  value="Php '.number_format($total, 2). '"class="form-control">
</div>
    </div>
</div>';
            }
            }
            
            ?>
        </form>
        </div>
    </div>
    </nav>
</div>

<div class="container-md p-3">
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>

                <tr>
                <th scope="col">Sl no</th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Action</th>
                <th scope="col"><button type="button"  name="validation" value="Remove" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Clear all
                </button>
                </th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    if(isset($_POST['remove_orderToCart'])){
                        $cartId = mysqli_real_escape_string($conn, $_POST['cartID']);
                        $removeOrder = mysqli_real_escape_string($conn, $_POST['editTo0']);

                        $sql_RemovedToCart = "UPDATE cart SET order_action = '$removeOrder' WHERE id = '$cartId'";
                        $removedTocart_query_run = mysqli_query($conn, $sql_RemovedToCart);
                    }
                 
                    $query = "SELECT * FROM cart WHERE order_action = '1' ";
                    $query_run = mysqli_query($conn, $query);
                    $total = 0;
                    if($query_run){
                        while($row = mysqli_fetch_assoc($query_run)){
                            
                            $id = $row['id'];
                            $orImage = $row['order_image'];
                            $orName = $row['order_name'];
                            $orDescription = $row['order_description'];
                            $orPrice = $row['order_price'];
                            $orQty = $row['order_qty'];
                            $subTotal = $orPrice * $orQty;
                            
                            $total +=$subTotal;
                                   
                            echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <td><img src="'.$orImage.'" class="img-thumnail" style="height: 100px; width: 100px;"></td>
                            <td>'.$orName.'</td>
                            <td>'.$orDescription.'</td>
                            <td>'.number_format($orPrice, 2).'</td>
                            <td>
                                '.$orQty.'
                            </td>
                            <td>Php
                                '.number_format($subTotal,2).'
                            </td>
                           
                            <td><form method="post" >
                            
                                <input type="hidden" name="cartID" value="'.$id.'">
                                <input type="hidden" name="editTo0" value="0">
                               
                                <!-- Button trigger modal -->
                            <button type="submit"  name="remove_orderToCart" value="Remove" class="btn btn-danger">
                            Remove
                          </button>
                          
                                </form>
                                </td>
                        </tr>';
                        }
                    }

                    ?>
                
            </tbody>
            </table>
            <form action="Paymentprocess.php" method="post">
                <?php
                // if(isset($_POST['Proceedpayment'])){
                    
                //     $ordersList = mysqli_real_escape_string($conn, $_POST['ordernameCartPayment']);
                //     $ordersprice = mysqli_real_escape_string($conn, $_POST['ordernameCartPayment']);
                //     $orderstotalPrice = mysqli_real_escape_string($conn, $_POST['orderCartTotalPayment']);

                //     $payment_sql = "";

                // }
                $cartToProceed = "SELECT * FROM cart WHERE order_action = '1'";
                $cartToProceed_query_run = mysqli_query($conn, $cartToProceed);

                while($row = mysqli_fetch_array($cartToProceed_query_run)){
                    $ordernamePayment = $row['order_name'];
                    $orderpricePayment = $row['order_price'];
                    $orid = $row['order_action'];
                    $orderQty = $row['order_qty'];
                    $subTotal = $orderpricePayment * $orderQty;
                    
                    echo '
                    <input type="hidden" name ="ordernameCartPayment" value="'.$ordernamePayment.'">
                    <input type="hidden" name ="orderpriceCartPayment" value="'.$orderpricePayment.'">
                    
                    ';
                }
            ?>  
            <input type="hidden" value="<?php echo $orid ?>" name="orderCartTotalPayment">
                <div class="d-grid gap-2 col-6 mx-auto">

                    <?php
                    $ShowbuttonProcess = "SELECT * FROM cart WHERE order_action = '1' ";
                    $query_run_Showbutton = mysqli_query($conn, $ShowbuttonProcess);
                    
                    if(mysqli_num_rows($query_run_Showbutton) > 0){
                    echo'   
                    <button class="btn btn-primary" type="submit" name="Proceedpayment">Proceed to payment</button>';
                    }
                    ?>
                </div>
            </form>
            
                                <!-- Modal -->
                                    <form method="post" action="index.php">
                                        <input type="hidden" value="0" name="removedAllid">
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg> Warning!</h1> 
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                     Are you sure you want to remove all?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="submit" name="removeAll_orderToCart" class="btn btn-secondary" data-bs-dismiss="modal">Yes</button>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                         </form>
<?php include('include/footer.php');?>    
</body>
</html>