<?php 
include("dbcon.php");

// Fetch products from the database
$sql = "SELECT * FROM products"; // Corrected table name
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/style.css">
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
                        <a href="#" class="nav-link">Product</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
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
                                <i class="price-text-color fa fa-star" ></i>
                                <i class="price-text-color fa fa-star" ></i>
                                <i class="price-text-color fa fa-star" ></i>
                                <i class="price-text-color fa fa-star" ></i>
                                <i class="fa fa-star" ></i>
                                </div>
                                <button class="btn btn-primary w-100 " type="submit" >Buy Now</button>
                                <button class="btn btn-success w-100 mt-2 " type="submit" >Add to cats</button>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">No products found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
