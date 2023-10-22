<?php 
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM crud WHERE id = '$user_id'";
$result=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  $email = $row['email'];
}

if(!isset($_SESSION['user_id'])){
    header('Location: loginform.php');
}?>
<div class="text-bg-secondary p-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary text-bg-dark p-3 fixed-top">
    <div class="container-fluid ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <h5><?php echo $email ?></h5>
                </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="user_details.php">My Account</a></li>
                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
            </ul>

            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Notification
            <span class="position-absolute top-1 start-25 translate-middle badge rounded-pill bg-danger">
                99+
                
            </span>
            </a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
</div>