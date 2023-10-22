<?php include('../connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .table-wrapper{
            overflow-y: scroll;
            overflow-x: scroll;
            height: fit-content;
            max-height: 80.4vh;    
        }
        table th{
            position: sticky; 
            top: 0px;
            background-color: #e9e6e6;
            color: rgb(0, 0, 0);
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }
        .table-outer-wrapper{
            margin-top: 80px;
           
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
                    <h5><?php echo $_SESSION['user_email'] ?></h5>
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
            <input class="form-control me-2" type="text" required name="search_product" placeholder="Search Data" value="<?php if(isset($_GET['search_product'])){echo $_GET['search_product'];} ?>">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
</div>
<div class="table-outer-wrapper container-md">
    <div class="table-wrapper table-responsive">
    <?php
    if(isset($_POST['submit'])){
        $productName = mysqli_real_escape_string($conn, $_POST['pname']);
        $productPrice = mysqli_real_escape_string($conn, $_POST['pprice']);
        $productCategory = mysqli_real_escape_string($conn, $_POST['category']);
        $productAvailability = mysqli_real_escape_string($conn, $_POST['availability']);
        $productQuantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $productDescription = mysqli_real_escape_string($conn, $_POST['pdescription']);
        $productID = mysqli_real_escape_string($conn, $_POST['productID']);
        
        if (!is_numeric($productPrice) ){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Invalid price details</strong> You should check in on some of those fields below.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
     
        }else{
        $query = "UPDATE products SET product_name='$productName', product_price='$productPrice', 
         product_availability='$productAvailability', product_quantity='$productQuantity', product_description='$productDescription', product_category='$productCategory'
          WHERE id = '$productID'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Well done! Product Updated Successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
        }
        else{
            die(mysqli_error($conn));
          }

        
    }
    }
?>
        <table class="table table-hover align-middle">
            <thead class="table-primary">

               
                <th scope="col">Sl no</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Availability</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Category</th>
                <th scope="col">Date Inserted</th>

            </thead>
            <tbody class="table-group-divider">
                    <?php
                    $searchData = isset($_GET['search_product']) ? $_GET['search_product']: '';
                    $query = "SELECT p.*, c.category_name
                    FROM products p
                    INNER JOIN product_category c ON p.product_category = c.id
                    WHERE CONCAT(p.product_name, p.product_price, p.product_availability, p.product_quantity, p.product_description, p.product_image, p.date_inserted) LIKE '%$searchData%'";

                    $query_run = mysqli_query($conn, $query);

                    if($query_run){
                        while($row = mysqli_fetch_assoc($query_run)){
                            $id = $row['id'];
                            $pname = $row['product_name'];
                            $pprice = $row['product_price'];
                            $pAvailability = $row['product_availability'];
                            $pquantity = $row['product_quantity'];
                            $pdescription = $row['product_description'];
                            $pimage = $row['product_image'];
                            $pcategory = $row['product_category'];
                            $pdateInserted = $row['date_inserted'];
                            $Cname = $row['category_name'];
                            
                            echo '<tr class="table-secondary">
                            
                            <th scope="row">'.$id.'</th>
                            
                                <td><a href="view-manage-products.php?product_id='.$id.'"><img src="'.$pimage.'" class="img-thumbnail rounded w-50 h-50" data-bs-toggle="modal" data-bs-target="#exampleModal"></a></td>
                            
                            <td>'.$pname.'</td>
                            <td>'.number_format($pprice, 2).'</td>
                            
                            <td>'.$pAvailability.'</td>
                            <td>'.$pquantity.'</td>
                            <td>'.$pdescription.'</td>
                            <td>'.$Cname.'</td>
                            <td>'.date("M d, Y", strtotime($pdateInserted)).'</td>
                            
                        </tr>';
                        }
                    }

                    ?>
                
            </tbody>
            </table>
    </div>
</div>

<?php include('include/footer.php');?>    
</body>
</html>