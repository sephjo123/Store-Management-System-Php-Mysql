<?php include('../connection.php');
if(!isset($_SESSION['user_email'])){
  header('Location:../loginform.php');
}
/////// GET THE TODAY ORDERS /////////
/////// GET THE TODAY ORDERS AND SALES/////////
$today_sales = 
"SELECT date_inserted, product_price, product_qty 
FROM product_sales 
WHERE 
    YEAR(date_inserted) = YEAR(CURDATE()) AND 
    MONTH(date_inserted) = MONTH(CURDATE()) AND 
    DAY(date_inserted) = DAY(CURDATE())";
$query_run_todaySales = mysqli_query($conn, $today_sales);
$CurrentSales = 0;
$ComputeCurrentSales = 0;
$totalTodaysOrder = 0;
while($row=mysqli_fetch_array($query_run_todaySales)){
  $todaysales = $row['date_inserted'];
  $todays_order = $row['product_price'];
  $todays_order_qty = $row['product_qty'];
  $totalTodaysOrder +=$todays_order_qty;
  $ComputeCurrentSales = $todays_order * $todays_order_qty;
  $CurrentSales += $ComputeCurrentSales;
 
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
       .dashboard{
        margin-top: 80px;
       }
    </style>
</head>
<body class="bg-body-secondary">
<?php include('include/header.php');?>
<?php
//// GET TOTAL SALES /////
//// GET TOTAL SALES /////
//// GET TOTAL SALES /////
$query = "SELECT * FROM product_sales";
$query_run = mysqli_query($conn, $query);
$total = 0;
if($query_run){
  while($row = mysqli_fetch_assoc($query_run)){
      $id = $row['id'];
      $name = $row['product_name'];
      $price = $row['product_price'];
      $qty = $row['product_qty'];
      $trId = $row['transaction_id'];
      $subTotal = $price * $qty;
      $total +=$subTotal;
  }
}else{
    die(mysqli_error($conn));
}
//// GET TOTAL SALES /////
//// GET TOTAL SALES /////
//// GET TOTAL SALES /////
?>

 <?php
 /// GET NUMBER OR ORDERS ///
 /// GET NUMBER OR ORDERS ///
 /// GET NUMBER OR ORDERS ///
    $querytest = "SELECT SUM(product_qty) AS total_orders FROM product_sales";
    $query_run = mysqli_query($conn, $querytest);
    $testnum = mysqli_fetch_assoc($query_run);
  /// GET NUMBER OR ORDERS ///
 /// GET NUMBER OR ORDERS ///
 /// GET NUMBER OR ORDERS ///
 ?>


 <?php
 ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
$sql = "SELECT p.product_name, p.product_image, SUM(o.product_qty) AS order_count
        FROM products p
        LEFT JOIN product_sales o ON o.product_id = p.id
        GROUP BY p.id
        ORDER BY order_count DESC
        LIMIT 1";
$result = $conn->query($sql);
$topproduct = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $topProductId = $row["product_name"];
    $topproductImage = $row["product_image"];
    $topproduct  +=$row["order_count"];
    
} else {
    echo "No products found.";
}
 ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
 ?>
  <?php
   ///// GET THE TOP PRODUCT WITH HIGHEST SALES /////
  ///// GET THE TOP PRODUCT WITH HIGHEST SALES /////
  ///// GET THE TOP PRODUCT WITH HIGHEST SALES /////
$topsales_product = "SELECT p.product_name, p.product_image, SUM(o.product_qty * (p.product_price)) AS total_sales
        FROM products p
        LEFT JOIN product_sales o ON o.product_id = p.id
        GROUP BY p.id
        ORDER BY total_sales DESC
        LIMIT 1";
$result = $conn->query($topsales_product);
$totalSalesProduct = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSalesProduct +=$row["total_sales"];
    $productHighSales = $row['product_name'];
    $TopsalesProductImage = $row['product_image'];
    
} else {
    echo "No products found.";
}
   ///// GET THE TOP PRODUCT WITH HIGHEST SALES /////
  ///// GET THE TOP PRODUCT WITH HIGHEST SALES /////
  ///// GET THE TOP PRODUCT WITH HIGHEST SALES /////
 ?>
 <?php
  ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
  $select_top_product = "SELECT * FROM products WHERE product_name = '$topProductId'";
  $query_run_topProdcut = mysqli_query($conn, $select_top_product);
  $NoOfProduct = mysqli_num_rows($query_run_topProdcut);
  while($row=mysqli_fetch_array($query_run_topProdcut)){
  ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
 ///// GET THE TOP PRODUCT /////
 ?>
<div class="dashboard container-md p-3">
  
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card text-bg-success">
      <div class="card-body">
        <h2 class="card-title">Total Sales : Php <?php echo number_format($total, 2) ?></h2>
        
        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-bg-secondary">
      <div class="card-body">
        <h2 class="card-title">Total Orders : <?php echo $testnum['total_orders'] ?></h2>   
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card text-bg-success">
      <div class="card-body">
        <h2 class="card-title">Today's Sales Php <?php echo number_format($CurrentSales, 2) ?></h2>
        
        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-bg-secondary">
      <div class="card-body">
        <h2 class="card-title">Today's Orders : <?php echo number_format($totalTodaysOrder) ?></h2>   
      </div>
    </div>
  </div>
</div>

<div class="row mt-3">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card text-bg-success">
    
      <div class="card-body">
        <h2 class="card-title">Top Product : <strong><?php echo $row['product_name'];  ?></strong></h2>
        <p class="card-text"><h1></h1></p>
        <p class="card-text"><h1>No. of Orders: <?php echo number_format($topproduct)  ?></h1></p>
        
      </div>
      <img src="<?php echo $topproductImage?>" class="card-img-top img-thumbnail" style="height: 600px; width: 540px; " alt="...">
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card text-bg-warning">
      <div class="card-body">
        <h2 class="card-title">Top Product with Highest Sales :</h2>
        <p class="card-text"><h1><?php echo $productHighSales ?>: Php<?php echo number_format($totalSalesProduct, 2) ?></h1></p> 
      </div>
      <img src="<?php echo $TopsalesProductImage ?>" class="card-img-top img-thumbnail" style="height: 600px; width: 540px; " alt="...">
    </div>
  </div>
</div>
</div>
<?php }  ?>

<?php include('include/footer.php');?>    
</body>
</html>