<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
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
            <ul
              class="navbar-nav ms-auto me-auto  my-lg-0 navbar-nav-scroll fw-bold"
            >
              <li class="nav-item">
                <Link to="/" class="text-decoration-none">
                  <a class="nav-link active" aria-current="page" href="#">
                    Home
                  </a>
                </Link>
              </li>
              <li class="nav-item">
                <Link to="/prodect" class="text-decoration-none">
                  <a class="nav-link" href="product.php">
                    Product
                  </a>
                </Link>
              </li>
              <li class="nav-item">
                <Link to="/contact" class="text-decoration-none">
                  <a class="nav-link" href="signup.php">
                    Sign Up
                  </a>
                </Link>
              </li>
              <li class="nav-item">
                <Link to="/contact" class="text-decoration-none">
                  <a class="nav-link" href="login.php">
                    Login
                  </a>
                </Link>
              </li>
            </ul>
            <form class="d-flex ms-auto" role="search" onSubmit={handleSearch}>
              <input
                class="form-control me-2 mt-3 h-25 align-items-center"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Search
              </button>
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
                <img src="img/range-rover_bg_removed.png.png" alt="rangr rover" class=' img-fluid mb-3' />
            </div>
       </div>
    </div>

    <div class=" container  aboutcontainer  ">
        <div class="row  ">
            <div class="col col-lg-4">
                <img src="img/audi.jpg" alt="" class=' img-fluid rounded-4' />
            </div>
            <div class="col col-lg-4 bg-body-tertiary rounded-4">
               <h1 class=' display-5 text-center fw-bold mt-2'>
                About Us 
               </h1>
               <p class=' lead'> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Impedit praesentium vel laboriosam ratione quia omnis amet fugit nobis porro alias minus ?</p>
            </div>
            <div class="col col-lg-4">
                <img src="img/audi.jpg" alt="" class=' img-fluid rounded-4' />
            </div>
        </div>
    </div>


  <script src="js/bootstrap.bundle.min.js" ></script>  
</body>
</html>