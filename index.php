<?php
session_start();


    $uri = $_SERVER['REQUEST_URI'];

    if($uri === '/Cars_Ghana'){
        require 'index.php';
  
    }
    else if($uri === '/product'){
        require 'product.php';
    }
    else if($uri === '/viewproduct'){
        require "viewproduct.php";
    }  
    else if($uri === '/signup'){
        require "signup.php";
    }
    else if($uri === '/login'){
        require "login.php";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark align-items-center">
    <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="#">
            Cars Ghana
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarScroll"
            aria-controls="navbarScroll"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto me-auto my-lg-0 navbar-nav-scroll fw-bold">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php">Product</a>
              </li>

              <?php if (isset($_SESSION["user_id"])) { ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION["username"]; ?> 
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                  </ul>
                </li>
              <?php } else { ?>
                <li class="nav-item">
                  <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              <?php } ?>
            </ul>

            <form class="d-flex ms-auto" role="search">
              <input class="form-control me-2 mt-3 h-25 align-items-center" type="search" placeholder="Search" aria-label="Search" />
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>

    </nav>

    <div class="container-fluid intro bg-black">
        <div class="row">
            <div class="col-12 align-content-center justify-content-center">
                <div class="contant container ms-auto text-white">
                    <h1 class=" display-4 fw-bold text-white "><span>By</span> Or<span> Rent</span> Your Dream Car</h1>
                    <p class='text-white'>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Officiis aliquam dolor repellendus facilis
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum impedit sed odit 
                        veritatis consequatur aliquam ipsa quod cupiditate non. Voluptates.
                    </p>
                     <a href="product.php"><button class="carbtn">Prodect</button></a>
                </div>
                <img src="img/range-rover_bg_removed.png.png" alt="range rover" class="img-fluid mb-3" />
            </div>
       </div>
    </div>

    <div class="container aboutcontainer">
        <div class="row">
            <div class="col-lg-4">
                <img src="img/audi.jpg" alt="" class="img-fluid rounded-4" />
            </div>
            <div class="col-lg-4 bg-body-tertiary rounded-4">
               <h1 class="display-5 text-center fw-bold mt-2">About Us</h1>
               <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            </div>
            <div class="col-lg-4">
                <img src="img/audi.jpg" alt="" class="img-fluid rounded-4" />
            </div>
        </div>
    </div>

  <script src="assets/js/bootstrap.bundle.min.js"></script>  
</body>
</html>
