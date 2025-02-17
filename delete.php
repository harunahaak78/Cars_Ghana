<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/sweetalert.js" ></script>
    <title></title>
</head>
<body>
    <?php
    

if (isset($_GET['delete'])) {
    $productId = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id = $productId";
    if ($conn->query($sql) === TRUE) {
        ?>
        <script>
                   swal({
                            title:"Delete Product",
                            text:"success, Product Deleted successfully",
                            icon: "success",
                            button:"ok "
                        });
                        setTimeout(()=>{
                            location.href='addproduct.php';

                   }, 3000);
        </script>
 <?php
       
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
    ?>
</body>
