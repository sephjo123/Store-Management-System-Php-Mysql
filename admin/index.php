<?php include('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('include/header.php');?><br><br><br>
    <div class="container-lg mt-3">

        <div class="container overflow-hidden text-center">
            
            <div class="row gy-5">
                <?php

                if(isset($_POST['removeAll_orderToCart'])){
                    $removeAll = mysqli_real_escape_string($conn, $_POST['removedAllid']);

                    $sql_removeAll = "UPDATE cart SET order_action = '$removeAll'";
                    $query_run_removed = mysqli_query($conn, $sql_removeAll);

                    if($query_run_removed){
                        echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Successfully Removed all data!</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
                    }
                }
                //// CHECKING STOCK //////// CHECKING STOCK ////
                //// CHECKING STOCK //////// CHECKING STOCK ////
                //// CHECKING STOCK //////// CHECKING STOCK ////
                $checkProductStocks = "SELECT product_quantity, product_name, id 
                FROM products 
                WHERE product_quantity <= 50 AND product_availability = 'Available' ";
                $query_runCheckStocks = mysqli_query($conn, $checkProductStocks);

                if(mysqli_num_rows($query_runCheckStocks) > 0 ){
                    while($row = mysqli_fetch_assoc($query_runCheckStocks)){
                        $ProductStocks = $row['product_quantity'];
                        $ProductName = $row ['product_name'];
                    
                    echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>We have $ProductStocks $ProductName left!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                }
                //// CHECKING STOCK //////// CHECKING STOCK ////
                //// CHECKING STOCK //////// CHECKING STOCK ////

                if(isset($_POST['submit'])){
                    $cid = $_POST['cid'];
                    $cname = $_POST['cordername'];
                    $cprice = $_POST['cprice'];
                    $cdesciption = $_POST['cdescription'];
                    $cimage = $_POST['cimage'];
                    $cqty = $_POST['cquantity'];

                    $checkThestocksQuery = "SELECT product_quantity FROM products WHERE id = '$cid'";
                    $query_runCheckStocks = mysqli_query($conn, $checkThestocksQuery);
                    $checkQty = mysqli_fetch_assoc($query_runCheckStocks);
                    if($cqty > $checkQty['product_quantity']){
                       
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Sorry we don't have $cname that much quantity in stock  </strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }else{

                    $sql_add_to_cart = "INSERT INTO cart (order_image, pid, order_name, order_description, order_price, order_qty)
                    VALUE('$cimage ', '$cid', '$cname', '$cdesciption', '$cprice', '$cqty')";
                    $query_runAddtoCart = mysqli_query($conn, $sql_add_to_cart);
                    
                    if($query_runAddtoCart){
                        echo "
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Successfully Inserted $cname to cart!</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                }
                    
                }
                if(!isset($_POST['selectCategoryProduct'])){
                $sql = "SELECT * FROM products WHERE product_availability = 'Available'";
                $query_run = mysqli_query($conn, $sql);
                if($query_run){
                    while($row = mysqli_fetch_assoc($query_run)){
                        $pid = $row['id'];
                        $pname = $row['product_name'];
                        $pprice = $row['product_price'];
                        $pdescription = $row['product_description'];
                        $pimage = $row['product_image'];

                        echo '
                        
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <div class="card">
                            <img src="'.$pimage.'" class="card-img-top img-thumbnail" style="height: 300px; width: 550px;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">'.$pname.'</h5>
                                <p class="card-text">'.$pdescription.'</p>
                                <p class="card-text">Php: '.number_format($pprice,2).'</p>
                               
                                <form  method="post">
                                <p class="card-text"><input type="number" min="1" value="1" name="cquantity"></p>
                                    <input type="hidden" value="'.$pid.'" name="cid">
                                    <input type="hidden" value="'.$pname.'" name="cordername">
                                    <input type="hidden" value="'.$pprice.'" name="cprice">
                                    <input type="hidden" value="'.$pdescription.'" name="cdescription">
                                    <input type="hidden" value="'.$pimage.'" name="cimage">
                                <button type="submit" name="submit" class="btn btn-primary">Add to Chart</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        
                        ';
                       
                        }
                    }
                }

                    if(isset($_POST['selectCategoryProduct'])){
                        $catergoyID = $_POST['CategoryID'];
                        switch ($catergoyID) {
                        case "all":
                        $sql = "SELECT * FROM products WHERE product_availability = 'Available'  ";
                        $query_run = mysqli_query($conn, $sql);
                        if($query_run){
                            while($row = mysqli_fetch_assoc($query_run)){
                                $pid = $row['id'];
                                $pname = $row['product_name'];
                                $pprice = $row['product_price'];
                                $pdescription = $row['product_description'];
                                $pimage = $row['product_image'];
        
                                echo '
                                
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <div class="card">
                                    <img src="'.$pimage.'" class="card-img-top img-thumbnail" style="height: 300px; width: 550px;" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$pname.'</h5>
                                        <p class="card-text">'.$pdescription.'</p>
                                        <p class="card-text">Php: '.number_format($pprice,2).'</p>
                                       
                                        <form  method="post">
                                        <p class="card-text"><input type="number" min="1" value="1" name="cquantity"></p>
                                            <input type="hidden" value="'.$pid.'" name="cid">
                                            <input type="hidden" value="'.$pname.'" name="cordername">
                                            <input type="hidden" value="'.$pprice.'" name="cprice">
                                            <input type="hidden" value="'.$pdescription.'" name="cdescription">
                                            <input type="hidden" value="'.$pimage.'" name="cimage">
                                        <button type="submit" name="submit" class="btn btn-primary">Add to Chart</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                
                                ';
                               
                                }
                            }
                            break;
                            case "".$catergoyID."":
                                $sql = "SELECT * FROM products WHERE product_availability = 'Available' && product_category = '$catergoyID' ";
                                $query_run = mysqli_query($conn, $sql);
                                if($query_run){
                                    while($row = mysqli_fetch_assoc($query_run)){
                                        $pid = $row['id'];
                                        $pname = $row['product_name'];
                                        $pprice = $row['product_price'];
                                        $pdescription = $row['product_description'];
                                        $pimage = $row['product_image'];

                                echo '
                                
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <div class="card">
                                    <img src="'.$pimage.'" class="card-img-top img-thumbnail" style="height: 300px; width: 550px;" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$pname.'</h5>
                                        <p class="card-text">'.$pdescription.'</p>
                                        <p class="card-text">Php: '.number_format($pprice,2).'</p>
                                        
                                        <form  method="post">
                                        <p class="card-text"><input type="number" min="1" value="1" name="cquantity"></p>
                                            <input type="hidden" value="'.$pid.'" name="cid">
                                            <input type="hidden" value="'.$pname.'" name="cordername">
                                            <input type="hidden" value="'.$pprice.'" name="cprice">
                                            <input type="hidden" value="'.$pdescription.'" name="cdescription">
                                            <input type="hidden" value="'.$pimage.'" name="cimage">
                                        <button type="submit" name="submit" class="btn btn-primary">Add to Chart</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                
                                ';
                                
                                }
                            }
                            }
                                }
                    ?>
               
            </div>
            
        </div>
        
    </div>

<?php include('include/footer.php');?>    
</body>
</html>