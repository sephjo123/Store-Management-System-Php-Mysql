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
        <?php
        $currentURL =  $_SERVER['REQUEST_URI'];

        if($currentURL == '/practicecrud/admin/index.php'){
          echo'
  
        <form action="index.php" class="d-flex" role="search" method="post">
          <select name="CategoryID" class="form-select" aria-label="Default select example">
          <option value="all" > All</option>';
        }
          ?>
        <?php
          $currentURL =  $_SERVER['REQUEST_URI'];

          if($currentURL == '/practicecrud/admin/index.php'){
            $query = "SELECT * FROM product_category";

              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_assoc($result)) {
                $Cname = $row['category_name'];
                $Cid = $row['id'];
                
              
            echo '         
              <option value='.$Cid .'> '.$Cname .'</option>          
        ';
              }
          }
        ?>
        <?php
        $currentURL =  $_SERVER['REQUEST_URI'];

        if($currentURL == '/practicecrud/admin/index.php'){
          echo'
        </select>
        <button type="submit" name="selectCategoryProduct" >Select</button>
        </form>';
        }
        ?>
        
        
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