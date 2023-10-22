<?php
include('../connection.php'); 
?>

<?php 
if(!isset($_SESSION['user_email'])){
  header('Location:../loginform.php');
}

if(isset($_GET['productId'])){
    $productId = mysqli_real_escape_string($conn, $_GET['productId']);
    $query = "SELECT * FROM products WHERE id = '$productId'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0){

        $product_details = mysqli_fetch_assoc($query_run);
        $image = $product_details['product_image'];
        $pname = $product_details['product_name'];
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
        .container{
            margin-top: 200px;
        }
        .img{
            margin-left: 45px;
        }
    </style>
</head>
<body>
<?php



        if(isset($_POST['submit'])){
            $target_dir = "productImage/";
            $target_file = $target_dir  . basename($_FILES["img"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
            $uplaoadfiles = move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

            $sql = "UPDATE products SET product_image ='$target_file' WHERE id = '$productId'";
            $query_run1 = mysqli_query($conn, $sql);
            
            if($query_run1) {
                header('Location: view-manage-products.php?product_id='.$productId.'');
            }
        }

        ?>
<a href="view-manage-products.php?product_id=<?php echo $productId ?>" class="btn btn-primary">Back</a>


    <div class="container position-relative">
        <div class="receipt container-fluid position-relative">
                <div class="card position-absolute top-100 start-50 translate-middle mt-1" style="width: 18rem;" >
                <img src="<?php echo $image ?>" class="img card-img-top " style="height: 200px; width: 200px;" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title"><?php echo $pname ?></h5>
                       
                    </div>
                    <form  method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            
                            <input class="form-control" type="file" id="formFile" name="img">
                        </div>
                    

                        <div class="card-body">
                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
        </div>
    </div>
    <?php 
    }
}
    ?>     

<?php include('include/footer.php');?>    
</body>
</html>