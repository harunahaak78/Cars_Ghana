<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
        <div id="productList" class="row my-4">
                    <div class="col ">
                        <div class="card w-75">
                            <div class="card-header bg-secondary text-white">
                                Order List
                            </div>
                        <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>image</th>
                            <th>ProductName</th>
                            <th>Price</th>
                            <th>Coutomer</th>
                            <th>Date of Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="img/audi.jpg" alt="car" class=" rounded" style=" width:60px; height:60px"></td>
                            <td>Audi</td>
                            <td>300,000</td>
                            <td>Example@gmail.com</td>
                            <td>10/2/2005</td>
                            <td>
                                <a href="#" class="btn btn-primary">View</a>
                            </td>
                        </tr>
                    </tbody>
                
                   </table>
                                    
                    </div>
                    </div>
             </div>
    </div>
   
</body>
</html>








<div class="contant container ms-auto text-white">
                    <h1 class=" display-4 fw-bold text-white "><span>By</span> Or<span> Rent</span> Your Dream Car</h1>
                    <p class='text-white'>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Officiis aliquam dolor repellendus facilis
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum impedit sed odit 
                        veritatis consequatur aliquam ipsa quod cupiditate non. Voluptates.
                    </p>
                     <a href="product.php"><button class="carbtn">Prodect</button></a>
                </div>




























<?php 
include("dbcon.php");

// Fetch products from the database
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Products</title>
</head>
<body>

<div class="container">
    <h2 class="text-center my-4">Available Products</h2>
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $row['image_url']; ?>" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text">$<?php echo $row['price']; ?></p>
                        <a href="payment.php?name=<?php echo urlencode($row['name']); ?>&price=<?php echo urlencode($row['price']); ?>&image=<?php echo urlencode($row['image_url']); ?>" 
                           class="btn btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
