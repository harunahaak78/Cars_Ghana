<?php 
include("dbcon.php");
session_start();

$sql = "SELECT * FROM products"; 
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Product</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Cars Ghana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto me-auto my-2 my-lg-0 navbar-nav-scroll fw-bold">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active" aria-current="page">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="product.php" class="nav-link">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                    <?php if (isset($_SESSION["user_id"])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION["email"]; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="signup.php" class="nav-link">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                    <?php } ?>
                </ul>
                <form class="d-flex ms-auto" role="search">
                    <input class="form-control me-2 mt-4 h-25 align-items-center" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Intro Section -->
    <div class="container-fluid">
        <div class="row ms-1 me-1 mt-3 justify-content-center">
            <div class="col-5 col-md-6 bg-body-secondary rounded-4 me-1">
                <div class="row">
                    <div class="col">
                        <h1 class="display-6 fw-bold">Buy Any Car You Want!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, molestias?</p>
                    </div>
                    <div class="col mt-auto">
                        <img src="img/car_bg_removed.png.png" alt="car" class="carimg">
                    </div>
                </div>
            </div>
            <div class="col-5 col-md-5 bg-body-tertiary rounded-4">
                <div class="row">
                    <div class="col">
                        <h1 class="display-6 fw-bold">Rent Any Car You Want!</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, molestias?</p>
                    </div>
                    <div class="col mt-auto">
                        <img src="img/4x4_bg_removed.png.png" alt="4x4" class="carimg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Section -->
    <div class="container mt-5">
        <h2 class="text-center fw-bold">Our Products</h2>
        <div class="row mt-3 justify-content-center">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100 hover-effects">
                            <img src="<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= htmlspecialchars($row['name']) ?></h5>
                                <p class="card-text">$<?= htmlspecialchars($row['price']) ?></p>
                                <div class="rating mb-2">
                                    <i class="price-text-color fa fa-star"></i>
                                    <i class="price-text-color fa fa-star"></i>
                                    <i class="price-text-color fa fa-star"></i>
                                    <i class="price-text-color fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="payment.php?name=<?= urlencode($row['name']) ?>&price=<?= urlencode($row['price']) ?>&image=<?= urlencode($row['image']) ?>" 
                                   class="btn btn-primary w-100">Buy Now</a>
                                <button class="btn btn-success w-100 mt-2" type="submit"> <a href="viewproduct.php" class=" text-light text-decoration-none">View Product</a> </button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No products found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.nav-link[href="product.php"]').addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default navigation
        fetchProducts(); // Load products dynamically
    });
});

function fetchProducts() {
    fetch("product.php")
    .then(response => response.text())
    .then(data => {
        document.body.innerHTML = data; // Replace body content with fetched product page
    })
    .catch(error => console.error("Error fetching products:", error));
}
    </script>
</body>
</html>
