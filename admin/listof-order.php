<?php include('../connection.php');
if(!isset($_SESSION['user_email'])){
  header('Location:../loginform.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
       .table {
    margin-top: 20px;
       }
       .input-group{
        margin-top: 40px;
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
        <?php
          if(isset($_POST['changepass'])) {
            $cpass = mysqli_real_escape_string($conn, $_POST['currentpass']);
            $npass=mysqli_real_escape_string ($conn,$_POST['newpass']) ;
            $hashedPassword = password_hash($npass, PASSWORD_DEFAULT);

            $sql_select = "SELECT password FROM crud WHERE email = 'admin@gmail.com' ";
            $query_run = mysqli_query($conn, $sql_select);

            if(mysqli_num_rows($query_run) > 0 ){
            
              $row = mysqli_fetch_assoc($query_run);
              if(password_verify($cpass, $row['password'] )){

                $update_pass_sql = "UPDATE crud SET password = '$hashedPassword' WHERE email = 'admin@gmail.com'";
                $query_run_update = mysqli_query($conn, $update_pass_sql);

                if($query_run_update) {
                  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                      <strong>Successfully updated your Password!</strong>
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
              }
              else{
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Invalid Current Password!</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
              }
              }else{
                echo 'Invalid Current Password';
              }

        }
        ?>
          
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <h5><?php echo $_SESSION['user_email'] ?></h5>
                </a>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                My Account
                </button></li>
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
        <?php
        
        $searchData = isset($_GET['search']) ? $_GET['search']: '';
        $query = "SELECT * FROM product_sales WHERE CONCAT(id, transaction_id, product_name) LIKE '%$searchData%' ";
        $query_run = mysqli_query($conn, $query);
        ?>
        <form class="d-flex" role="search" method="GET">
            <input class="form-control me-2" type="text" required name="search" placeholder="Search Data" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>    
        </div>
    </div>
    </nav>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?php echo $_SESSION['user_email'] ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <form class="row g-3" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="inputEmail4" name="currentpass">
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="newpass">
                  </div>    
              </div>
             <div class="modal-footer">
          <button type="submit" name="changepass" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
           
     <div class="container-md p-3">
    
    <div class="table-responsive">
        
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Sl no</th>
                <th scope="col">Transaction no</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Date Ordered</th>
                
                </tr>
            </thead>
            <tbody>
                    <?php
                    if(!isset($_POST['ShowOrderSELECTED'])){
                    $searchData = isset($_GET['search']) ? $_GET['search']: '';
                    $query = "SELECT * FROM product_sales WHERE CONCAT(id, transaction_id, product_name, date_inserted) LIKE '%$searchData%' ";
                    $query_run = mysqli_query($conn, $query);
                    $total = 0;
                    $totalOrders = 0;
                    
                    if(mysqli_num_rows($query_run) > 0){
                        while($row = mysqli_fetch_assoc($query_run)){
                            $id = $row['id'];
                            $name = $row['product_name'];
                            $price = $row['product_price'];
                            $qty = $row['product_qty'];
                            $trId = $row['transaction_id'];
                            $dateOrdered = $row['date_inserted'];
                            $totalOrders += $qty;
                            $subTotal = $price * $qty;
                            $total +=$subTotal;
                            
                            echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <th scope="row">'.$trId.'</th>
                            <td>'.$name.'</td>
                            <td>Php'.number_format($price, 2).'</td>
                            <td>'.$qty.'</td>
                            <td>Php'.number_format($subTotal, 2).'</td>
                            <td>'.date("M d, Y ", strtotime($dateOrdered)).'</td>
                            
                        </tr>';
                        }
                    }
                  }
                  if(isset($_POST['ShowOrderSELECTED'])) {
                    $SelectedMonth = $_POST['ShowSelectMonth'];
                    $searchData = isset($_GET['search']) ? $_GET['search']: '';
                    $totalOrders = 0;

                    switch ($SelectedMonth) {
                      case "alldate":
                    $query = "SELECT * FROM product_sales 
                    WHERE CONCAT(id, transaction_id, product_name, date_inserted) 
                    LIKE '%$searchData%' ";
                    $query_run = mysqli_query($conn, $query);
                    $total = 0;
                    if(mysqli_num_rows($query_run) > 0){
                        while($row = mysqli_fetch_assoc($query_run)){
                            $id = $row['id'];
                            $name = $row['product_name'];
                            $price = $row['product_price'];
                            $qty = $row['product_qty'];
                            $trId = $row['transaction_id'];
                            $dateOrdered = $row['date_inserted'];
                            $subTotal = $price * $qty;
                            $total +=$subTotal;
                            $totalOrders += $qty;
                            
                            echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <th scope="row">'.$trId.'</th>
                            <td>'.$name.'</td>
                            <td>Php'.number_format($price, 2).'</td>
                            <td>'.$qty.'</td>
                            <td>Php'.number_format($subTotal, 2).'</td>
                            <td>'.date("M d, Y ", strtotime($dateOrdered)).'</td>
                            
                        </tr>';
                        }
                    }
                    break;

                    case "".$SelectedMonth."":

                    $query = "SELECT * FROM product_sales 
                    WHERE CONCAT(id, transaction_id, product_name, date_inserted) 
                    LIKE '%$searchData%' AND MONTH(date_inserted) = '$SelectedMonth'";
                    $query_run = mysqli_query($conn, $query);
                    $total = 0;
                    if(mysqli_num_rows($query_run) > 0)  {
                        while($row = mysqli_fetch_assoc($query_run)){
                            $id = $row['id'];
                            $name = $row['product_name'];
                            $price = $row['product_price'];
                            $qty = $row['product_qty'];
                            $trId = $row['transaction_id'];
                            $dateOrdered = $row['date_inserted'];
                            $subTotal = $price * $qty;
                            $total +=$subTotal;
                            $totalOrders += $qty;
                            
                            echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <th scope="row">'.$trId.'</th>
                            <td>'.$name.'</td>
                            <td>Php'.number_format($price, 2).'</td>
                            <td>'.$qty.'</td>
                            <td>Php'.number_format($subTotal, 2).'</td>
                            <td>'.date("M d, Y", strtotime($dateOrdered)).'</td>
                            
                        </tr>';
                        }
                        
                    }else{
                      echo '<th>No item found</th>';
                    }

                   } 
                  }
                  
                   
                    ?>
                    <br>
                 <div class="input-group">
                  <?php 
      ////SELECTED MONTH ///////SELECTED MONTH ///////SELECTED MONTH ///
       ////SELECTED MONTH ///////SELECTED MONTH ///////SELECTED MONTH ///
        ////SELECTED MONTH ///////SELECTED MONTH ///////SELECTED MONTH ///
                  if(isset($_POST['ShowOrderSELECTED'])){
                    $monthNames = [
                        "alldate" => "No Seleted Month",
                        "1" => "January",
                        "2" => "February",
                        "3" => "March",
                        "4" => "April",
                        "5" => "May",
                        "6" => "June",
                        "7" => "July",
                        "8" => "August",
                        "9" => "September",
                        "10" => "October",
                        "11" => "November",
                        "12" => "December",
                    ];

                    $currentMonthName = $monthNames[$SelectedMonth];
                  }
                  ////SELECTED MONTH ///////SELECTED MONTH ///////SELECTED MONTH ///
       ////SELECTED MONTH ///////SELECTED MONTH ///////SELECTED MONTH ///
        ////SELECTED MONTH ///////SELECTED MONTH ///////SELECTED MONTH ///
                  ?>
                  <?php if(!isset($_POST['ShowOrderSELECTED'])){
                    $currentMonthName = 'No Seleted Month';
                  }
                  
                  ?>
                  <span class="input-group-text "><strong>Total Sales:</strong></span>
                  <input type="text" readonly  value="Php <?php echo number_format($total, 2) ?>"class="form-control">
                  <span class="input-group-text "><strong>Total Orders:</strong></span>
                  <input type="text" readonly  value="<?php echo number_format($totalOrders) ?>"class="form-control">
                  <span class="input-group-text "><strong>Selected Month:</strong></span>
                  <input type="text" readonly  value="<?php echo $currentMonthName ?>"class="form-control">
                
                  <form action="" method="post">
                      <select class="form-select form-select-sm" name="ShowSelectMonth" size="3" aria-label="Size 3 select example">
                      <option value="alldate"selected>Select Month</option>
                      <option value="1">Jan</option>
                      <option value="2">Feb</option>
                      <option value="3">Mar</option>
                      <option value="4">Apr</option>
                      <option value="5">May</option>
                      <option value="6">Jun</option>
                      <option value="7">Jul</option>
                      <option value="8">Aug</option>
                      <option value="9">Sep</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                    <button type="submit" name="ShowOrderSELECTED" class="btn btn-primary">Select</button>
                </form>
                </div>
            </tbody>
            </table>

    </div>
</div>
<!-- End of Main Content -->

<?php include('include/footer.php');?>    
</body>
</html>