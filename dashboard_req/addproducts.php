<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/sweetalert.js" ></script>
    <title>addproduct</title>
    <style>
          
          .sidebar {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          z-index: 100;
          padding: 90px 0 0;
          box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
          z-index: 99;
          }
  
          @media (max-width: 767.98px) {
          .sidebar {
              top: 11.5rem;
              padding: 0;
          }
          }
  
          .navbar {
          box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
          }
  
          @media (min-width: 767.98px) {
          .navbar {
              top: 0;
              position: sticky;
              z-index: 999;
          }
          }
  
          .sidebar .nav-link {
          color: #333;
          }
  
          .sidebar .nav-link.active {
          color: #0d6efd;
          }
      </style>
</head>
<body>
<?php
include("dbcon.php");
require "delete.php";

if (isset($_POST['addProduct'])) {
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $productDescription = mysqli_real_escape_string($conn, $_POST['productDescription']);
    
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['productImage']['tmp_name'];
        $imageName = $_FILES['productImage']['name'];
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExtension, $allowedExtensions)) {
            $uploadPath = 'img/' . $imageName; 
            if (move_uploaded_file($imageTmpPath, $uploadPath)) {
                $sql = "INSERT INTO products (name, price, description, image) 
                        VALUES ('$productName', '$productPrice', '$productDescription', '$uploadPath')";


                if (mysqli_query($conn, $sql)) {
                    ?>
                    <script>
                        swal({
                            title:"Add Product",
                            text:"success, Product Added successfully",
                            icon: "success",
                            button:"Add "
                        });
                        setTimeout(()=>{
                            location.href='addproduct.php';

                   }, 3000);

                    </script>
            <?php        
                } else {
                    echo "<script>alert('Database error: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                ?>
                <script>
                    swal({
                            title:"Error",
                            text:"Error, Failed to upload image ",
                            icon: "error",
                            button:"Opps!,try agian "
                        });
                        setTimeout(()=>{
                           location.href='addproduct.php';

                   }, 2000);
                </script>
        <?php        
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
        }
    } else {
        echo "<script>alert('Image upload error.');</script>";
    }
}
?>

<div id="addProduct" class="row my-4 ">
                    <div class="col-md-6 mx-auto">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                Add New Product
                            </div>
                            <div class="card-body">
                                <form method="POST" action="addproducts.php" enctype="multipart/form-data">
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
        
                
                <div id="productList" class="row my-4">
                    <div class="col ">
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
                                            <th>Description</th>
                                            <th>Image</th>
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

    
</body>
</html>