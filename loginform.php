<?php
require_once 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login form | STORE MANAGEMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="bg-primary-subtle">

  <div class="container-title-web text-bg-dark p-3 fixed-top">
    <?php
    if(isset($_POST['submit'])){

      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $pass =  $_POST['password'];
      
    
      $select = "SELECT * FROM crud WHERE email = '$email'";
      $result = mysqli_query($conn, $select);
      
      if(mysqli_num_rows($result) > 0 ){
    
        $row = mysqli_fetch_assoc($result);
    
        if(password_verify($pass, $row['password']) && $row['user_type'] == 'user' ){
        $_SESSION ['user_name'] = $row ['name'];
        $_SESSION ['user_email'] = $row ['email'];
        $_SESSION ['user_mobile'] = $row ['mobile'];
        $_SESSION ['user_id'] = $row ['id'];
        header('Location: index.php');
        
        }elseif(password_verify($pass, $row['password']) && $row['user_type'] == 'admin' ){

          $_SESSION ['user_name'] = $row ['name'];
          $_SESSION ['user_email'] = $row ['email'];
          $_SESSION ['user_mobile'] = $row ['mobile'];
          $_SESSION ['user_id'] = $row ['id'];
          header('Location: admin/dashboard.php');
          
        }else{
          echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Incorrect Email or Password!</strong> You should check in on some of those fields below.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
      }else {
        echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <strong>Incorrect Email or Password!</strong> You should check in on some of those fields below.
              <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
      }
    }
    ?>
    
    <div class="text-center"><h1>STORE MANAGEMENT SYSTEM</h1></div>
          <div class="login-container container p-4 text-bg-dark p-3">
            <form class="row row-cols-lg-auto g-3 align-items-center" method="post">
              <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputGroupUsername">Email</label>
                <div class="input-group">
                  <div class="input-group-text">Email</div>
                  <input type="email" class="form-control" id="inlineFormInputGroupUsername" placeholder="Please input your emial" name="email">
                </div>
              </div>
              <div class="col-12">
                <label class="visually-hidden" for="inlineFormInputGroupUsername">Email</label>
                <div class="input-group">
                  <div class="input-group-text">Password</div>
                  <input type="password" class="form-control" id="inlineFormInputGroupUsername" placeholder="Please input your password" name="password">
                </div>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-light">Submit</button>
              </div>
            </form>
        </div> 
    </div>

    <div class="container-md p-3 w-75 text-bg-light p-3">
    
       
        <img src="img/store.jpg" alt="" class="storeImg">
    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
<style>
  .storeImg{
   margin-top: 180px;
   margin-left: 100px;
   height: 400px;
  }
</style>