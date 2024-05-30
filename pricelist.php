<?php
session_start(); 
include "./connection1/dbconn.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="index.css">
        <title>PC BUILD</title>
    </head>
        <body>
            <div class="container">

                    <div class="topper">
                        <a href="index.php"><img src="./images/438293690_756807072962619_7121699218052410435_n.png"  class="logo"; style="width: 50px;" height="50px" margin="0";></a>
                        <ul class="">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li><a href="products.php">Products</a></li>
                            <li><a href="pricelist.php">Price List</a></li>
                        </ul>
                    </div> 
                
                    <div class="content">
                        <div class="User1">
                            <p><span>Pricelist</span></p>

                            <form action="pricelist.php" method="post">
                                <input type="text" name="search" placeholder="search...." class ="add" required>
                               <input type="submit" value="Search" class="searchbtn">
                            </form>  

                            <?php echo "<table border='1'>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stocks</th>
                                </tr>";

                            //PROCESS SEARCH WHEN FORM SUBMITTED
                            if (isset($_POST["search"]))
                            
                        {
                            // SEARCH FOR USERS (Example)
                            
                            $search = mysqli_real_escape_string($conn, $_POST["search"]);
                            $query = "SELECT * FROM posproducts WHERE stocks > 0 and price like '%$search%' OR productname like '%$search%' OR category like '%$search%' ";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) 
                            {
                                while ($row = mysqli_fetch_assoc($result)) 
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['productID'] . "</td>";
                                    echo "<td>" . $row['productname'] . "</td>";
                                    echo "<td>" . $row['category'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['stocks'] . "</td>";
                                    echo "</tr>";
                                }
                            
                            } 
                            
                    
                                    else 
                                    {
                                        //$search = mysqli_real_escape_string($conn, $_POST["search"]);
                                            $query = "SELECT * FROM posproducts where stocks > 0";
                                            $result = mysqli_query($conn, $query);
                                            
                                                while ($row = mysqli_fetch_assoc($result)) 
                                                {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['productID'] . "</td>";
                                                    echo "<td>" . $row['productname'] . "</td>";
                                                    echo "<td>" . $row['category'] . "</td>";
                                                    echo "<td>" . $row['price'] . "</td>";
                                                    echo "<td>" . $row['stocks'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            
                                            
                                    }
                        }
                        else 
                                    {
                                        //$search = mysqli_real_escape_string($conn, $_POST["search"]);
                                            $query = "SELECT * FROM posproducts where stocks > 0";
                                            $result = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($result) > 0) 
                                            {
                                                while ($row = mysqli_fetch_assoc($result)) 
                                                {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['productID'] . "</td>";
                                                    echo "<td>" . $row['productname'] . "</td>";
                                                    echo "<td>" . $row['category'] . "</td>";
                                                    echo "<td>" . $row['price'] . "</td>";
                                                    echo "<td>" . $row['stocks'] . "</td>";
                                                    echo "</tr>";
                                                }
                                            
                                            } 
                                            
                                    
                                            else 
                                                {
                                                    echo "<p class='noresult'>No results found </p>";
                                                }
                                    }

                                echo "</table>";
                                ?>

                        </div>
                    </div>
               
            </div>
        
        </body>
    
</html>

<?php 
    mysqli_close($conn);
?>