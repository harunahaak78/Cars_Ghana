<?php
include("dbcon.php");

if (isset($_POST['addProduct'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    
    // Handle file upload
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['productImage']['tmp_name'];
        $imageName = $_FILES['productImage']['name'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExtension, $allowedExtensions)) {
            $uploadPath = 'img/' . $imageName; // Directory where images will be stored
            if (move_uploaded_file($imageTmpPath, $uploadPath)) {
                // Insert into database
                $sql = "INSERT INTO products (name, price, description, image) 
                        VALUES ('$productName', '$productPrice', '$productDescription', '$uploadPath')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Product added successfully!');</script>";
                } else {
                    echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                echo "<script>alert('Failed to upload image.');</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
        }
    } else {
        echo "<script>alert('Image upload error.');</script>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/LineIcons.min.css">
    <link rel="stylesheet" href="css/asidebar.css">
    <title>Product Dashboard</title>
    <style>
        .side-navbar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
            position:fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
        }
        .side-navbar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .side-navbar a:hover {
            background-color: #495057;
            color: #fff;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
            </style>
</head>
<body>
      <!-- Side Navbar -->
      <div class="side-navbar" id="sidebar">
           <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">Dashborad</a>
                </div>
            </div>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <a href="orders.php">Orders</a>
        <a href="users.php">Users</a>
        <a href="reports.php">Reports</a>
        <a href="settings.php">Settings</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="container-fluid">

        <!-- Add Product Section -->
        <div id="addProduct" class="row my-4 me-auto">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Add New Product
                    </div>
                    <div class="card-body">
                        <form method="POST" action="dashborad.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" required>
                            </div>
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" required>
                            </div>
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
                            </div>
                            <button type="submit" name="addProduct" class="btn btn-success">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product List Section -->
        <div id="productList" class="row my-4">
            <div class="col d-flex justify-content-end me-5">
                <div class="card w-75">
                    <div class="card-header bg-secondary text-white">
                        Product List
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>price</th>
                                    <th>image</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($products->num_rows > 0): ?>
                                    <?php while ($product = $products->fetch_assoc()): ?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td><?= $product['name'] ?></td>
                                            <td><?= $product['price'] ?></td>
                                            <td><?= $product['description'] ?></td>
                                            <td><?= $product['image'] ?></td>
                                            <td>
                                                <a href="?delete=<?= $product['id'] ?>" class="btn btn-danger btn-sm">Remove</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No products found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-dark text-center text-white py-3">
            <p>&copy; 2025 Product Management Dashboard</p>
        </footer>
    </div>

    <script src="js/dashboard.js" ></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
