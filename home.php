<html>
<head>
  <title>Home Page  </title>
</head>
<body>
  <h1>My project: Bilal Alfakih</h1>
  <?php
    
    @$db = new mysqli('localhost', 'balfaki','Balfaki4266!', 'balfaki');

    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }

    $query = "SELECT * FROM Drivers";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
      echo "<h2>Drivers:</h2>";
      echo "<table>";
      echo "<tr><th>Driver ID</th><th>Name</th><th>Phone</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["driver_id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No results found.";
    }

    $result->free();
        
        $query = "SELECT * FROM Addresses";
        $result = $db->query($query);
    
    if ($result->num_rows > 0) {
          echo "<h2>Addresses:</h2>";
          echo "<table>";
          echo "<tr><th>Address ID</th><th>Street</th><th>City</th><th>State</th><th>Zip Code</th></tr>";
          while ($row = $result->fetch_assoc()) {
            echo  "<tr><td>".$row["address_id"]."</td><td>".$row["street"]."</td><td>".$row["city"]."</td><td>".$row["state"]."</td><td>".$row["zip_code"]."</td></tr>";
          }
          echo "</table>";
        } else {
          echo "No addresses found.";
        }
        $result->free();
        $query = "SELECT * FROM Delivery";
        $result = $db->query($query);

        if ($result->num_rows > 0) {
          echo "<h2>Delivery:</h2>";
          echo "<table>";
          echo "<tr><th>Delivery ID</th><th>Driver ID</th><th>Delivery Date</th><th>Address ID</th></tr>";
           while ($row = $result->fetch_assoc()) {
               echo "<tr><td>".$row["delivery_id"]."</td><td>".$row["driver_id"]."</td><td>".$row["delivery_date"]."</td><td>".$row["address_id"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

$result->free();

    $query = "SELECT * FROM Packages";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
      echo "<h2>Packages:</h2>";
      echo "<table>";
      echo "<tr><th>Package ID</th><th>Content</th><th>Weight</th><th>Shipper ID</th><th>Driver ID</th><th>Address ID</th><th>Delivery ID</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["package_id"]."</td><td>".$row["content"]."</td><td>".$row["weight"]."</td><td>".$row["shipper_id"]."</td><td>".$row["Drivers_driver_id"]."</td><td>".$row["address_id"]."</td><td>".$row["delivery_id"]."</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No results found.";
    }

    $result->free();

    $query = "SELECT * FROM Shippers";
    $result = $db->query($query);

    if ($result->num_rows > 0) {
      echo "<h2>Shippers  :</h2>";
      echo "<table>";
      echo "<tr><th>Shipper ID</th><th>Name</th><th>Phone</th></tr>";
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["shipper_id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "</tr>";
      }
      echo "</table>";
  } else {
    echo "No results found.";
  }
  $result->free();
$query = "SELECT * FROM record";
$result = $db->query($query);

if ($result->num_rows > 0) {
  echo "<h2>Record:</h2>";
  echo "<table>";
  echo "<tr><th>Package ID</th><th>Shipper ID</th><th>Delivery ID</th></tr>";
  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["package_id"]."</td><td>".$row["shipper_id"]."</td><td>".$row["delivery_id"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

$result->free();



   $db->close();
  ?>
</body>
</html>
