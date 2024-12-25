<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/viewsupplier.css">
</head>
<body>
    
  <div class="container">
    <div class="sidebar">
    
      <ul class="menu">
      <img class="img3" src="images/logo.jpeg">
    <div class="logos">
            <p>BOOK WORMS</p>
        </div>
      
        <li class="menu-item"><a href="Admindashboard.php">Dashboard</a></li>
        <li class="menu-item"><a href="ViewBooks.php">Books</a></li>
        <li class="menu-item"><a href="ViewOrders.php">Orders</a></li>
        <li class="menu-item"><a href="ViewSupplier.php">Suppliers</a></li>
      </ul>
    </div>
    <div class="content">
        <div style="margin:20px">
    <a href='AddSupplier.php' class='btn btn-edit'>Add New Supplier</a>
    <br>
</div>
    <?php
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "online_book_store";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        // SQL query to retrieve data
        $sql = "SELECT * FROM supliers";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Display table headers
            
            echo "<table>";
            echo "<tr>
            <th>Supplier ID</th>
            <th>Suplier Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Joined Date</th>
            <th></th>
            </tr>";
            
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["supplier_name"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["joined_date"] . "</td>";
                // Buttons column
            echo "<td>";        
            echo "<a href='EditSupplier.php?id=" . $row["id"] . "' class='btn btn-edit'>Edit</a>";
            echo "<a href='delete.php?id=" . $row["id"] . "' class='btn btn-delete'>Delete</a>";
            echo "</td>";
            
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "No records found";
        }
    // Close the database connection
    $conn->close();
    ?>
    </div>
  </div>
</body>
</html>
