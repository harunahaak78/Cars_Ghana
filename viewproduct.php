<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
   <script src="js/bootstrap.bundle.min.js" ></script> 
</body>
</html>