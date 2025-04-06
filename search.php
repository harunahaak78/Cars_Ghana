<?php
   include "dbcon.php";

   if(isset($_POST['search-submit'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM products where name like '%$search%'";

    $result = mysqli_query($conn, $sql);

    $queryresult = mysqli_num_rows($result);

    if($queryresult > 0){
        while($row = mysqli_fetch_assoc($result)){
             echo "<div class = 'article-box'>
                        <h3>".$row["name"]."</h3>
                    </div>";
        }

    }else{
        echo "<h3> No products Found </h3>";
    }
   }
?>