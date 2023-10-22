<?php include('../connection.php');
if(!isset($_SESSION['user_email'])){
    header('Location:../loginform.php');
  }
  
  if(isset($_GET['product_id'])){
    $productId = mysqli_real_escape_string($conn, $_GET['product_id']);
    $query = "SELECT * FROM products WHERE id = '$productId'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){

        $product_details = mysqli_fetch_assoc($query_run);
        $image = $product_details['product_image'];
        $categoryName = $product_details['product_category'];
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product_details['product_name']  ?> | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .product-form {
    margin-top: 50px;
}
    </style>
</head>
<body class="bg-body-secondary">
<?php include('include/header.php');?>
<div class="container-md p-3">

    <div class="product-form container-sm  p-3">
<form class="row g-3 bg-light" method="post" action="manage-products.php" >
<?php
    if(isset($_POST['submit'])){
        $productName = mysqli_real_escape_string($conn, $_POST['pname']);
        $productPrice = mysqli_real_escape_string($conn, $_POST['pprice']);
        $productCategory = mysqli_real_escape_string($conn, $_POST['category']);
        $productAvailability = mysqli_real_escape_string($conn, $_POST['availability']);
        $productQuantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $productDescription = mysqli_real_escape_string($conn, $_POST['pdescription']);
        
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
          WHERE id = '$productId'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Well done! Product Updated Successfully!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
        }
        if($query_run){
            header("Location:view-manage-products.php?product_id=".$productId); 
        
        }else{
            die(mysqli_error($conn));
          }

        
    }
    }
?>
                    <?php
                           if(isset($_POST['sumbit'])){
                            $success = 'Well done! Product Updated Successfully !!';
                                echo '
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>'.$success.'</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                              ';
                              
                           };
                        ?>
<input type="hidden"  name="productID" required value="<?php echo $productId ?>">
    <div class="text-center">
        <img src="<?= $image ?>" class="figure-img img-fluid rounded w-25 h-70" alt="..."><a href="edit-image.php?productId=<?php echo $productId ?>">Edit Image</a>
    </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Product name</label>
            <input type="text" class="form-control" name="pname" required value="<?php echo $product_details['product_name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Product price</label>
            <input type="text" class="form-control" name="pprice" required value="<?php echo $product_details['product_price'] ?>">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Availability</label>
            <select id="inputState" class="form-select" name="availability">
            <option value="<?php echo $product_details['product_availability'] ?>" selected><?php echo $product_details['product_availability'] ?></option>
            <option value="Available" >Available</option>
            <option value="Not Available" >Not Available</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Product Category</label>
            
            <select id="inputState" class="form-select" name="category">
                <?php
                    $showcategoryQuery = "SELECT * FROM product_category WHERE id = '$categoryName'";
                    $query_runShowCategory = mysqli_query($conn, $showcategoryQuery);
                    while($row = mysqli_fetch_assoc($query_runShowCategory)){
                        $NameOfproductCategory = $row['category_name'];
                    }
                ?>
            <option value="<?php echo $product_details['product_category'] ?>" selected><?php echo $NameOfproductCategory ?></option>
                <?php
                        $category = "SELECT * FROM product_category";
                        $query_run_category = mysqli_query($conn, $category);

                        while($row = mysqli_fetch_assoc($query_run_category)){
                            $cId = $row['id'];
                            $category_name = $row['category_name'];
                            echo
                            '<option value="'.$cId.'" >'.$category_name.'</option>';
                        }

                ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="inputZip" name="quantity" required value="<?php echo $product_details['product_quantity'] ?>">
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="pdescription" required value="<?php echo $product_details['product_description'] ?>"><?php echo $product_details['product_description'] ?></textarea>
            <label for="floatingTextarea2">Product Description</label>
        </div>
           
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit" name="submit">Update Product</button>
        </div>
       
        </form>
        </div>
    </div>
    
<?php
    }
}
?>
<?php include('include/footer.php');?>    
</body>
</html>