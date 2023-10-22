<?php include('../connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .product-form {
    margin-top: 100px;
}
    </style>
</head>
<body class="bg-body-secondary">
<?php include('include/header.php');?>

<div class="container-md p-3">
    <div class="product-form container-sm  p-3">
        <?php
            if(isset($_POST['addCategory'])){
                $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);

                $Addcategory = 
                "INSERT INTO product_category (category_name)
                 VALUES ('$categoryName')";
                 $Addcategory_run = mysqli_query($conn, $Addcategory);

                 if($Addcategory_run){
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Successfully Added ".$categoryName."</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                 }else{
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Not acceptable!</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
                 }
            }
        ?>
    <form class="row g-3 bg-light" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Add Category</label>
            <input type="text" class="form-control" name="categoryName" required>
        </div>
        <div class="col-md-6 md-4">
            <button type="submit" name="addCategory" class="btn btn-primary mt-4">Add</button>
        </div>
        
    </form>
    <form class="row g-3 bg-light" method="post" enctype="multipart/form-data">
<?php
    if(isset($_POST['submit'])){
        $productName = mysqli_real_escape_string($conn, $_POST['pname']);
        $productPrice = mysqli_real_escape_string($conn, $_POST['pprice']);
        $productAvailability = mysqli_real_escape_string($conn, $_POST['availability']);
        $productQuantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $productDescription = mysqli_real_escape_string($conn, $_POST['pdescription']);
        $product_category = mysqli_real_escape_string($conn, $_POST['category']);

        $target_dir = "productImage/";
        $target_file = $target_dir  . basename($_FILES["pimage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
        $uplaoadfiles = move_uploaded_file($_FILES["pimage"]["tmp_name"], $target_file);

        if (!is_numeric($productPrice)){
            echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Invalid price details</strong> You should check in on some of those fields below.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }else{
        $query = "INSERT INTO products (product_name, product_price,  product_availability,
        product_quantity, product_description, product_image, product_category) VALUES ('$productName', '$productPrice', 
        '$productAvailability', '$productQuantity', '$productDescription', '$target_file', '$product_category')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            echo "
          <div class='alert alert-success alert-dismissible fade show' role='alert'>
              <strong>Successfully Inserted!</strong>
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        ";
        }else{
            die(mysqli_error($conn));
          }

        
    }
    }
?>
    

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Product name</label>
            <input type="text" class="form-control" name="pname" required>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Product price</label>
            <input type="text" class="form-control" name="pprice" required>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Availability</label>
            <select id="inputState" class="form-select" name="availability">
            <option value="Available" selected>Available</option>
            <option value="Not Available" >Not Available</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">Product Category</label>
            <select id="inputState" class="form-select" name="category">
                <?php
                        $category = "SELECT * FROM product_category";
                        $query_run_category = mysqli_query($conn, $category);

                        while($row = mysqli_fetch_assoc($query_run_category)){
                            $cId = $row['id'];
                            $category_name = $row['category_name'];
                            echo
                            '<option value="'.$cId.'" selected>'.$category_name.'</option>';
                        }

                ?>
            </select>
        </div>
        <div class="col-md-4">
            <label for="inputZip" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="inputZip" name="quantity" required>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="pdescription" required></textarea>
            <label for="floatingTextarea2">Product Description</label>
        </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupFile01">Product Image</label>
                <input type="file" class="form-control" id="inputGroupFile01" accept="image/*" required name="pimage">
            </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit" name="submit">Insert Product</button>
        </div>
       
        </form>
        </div>
    </div>
    
<?php include('include/footer.php');?>    
</body>
</html>