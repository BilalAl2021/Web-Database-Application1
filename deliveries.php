<html>
<head>
  <title>Deliveries Page</title>
</head>
<body>
  <h1>My project: Bilal Alfakih
  </h1>
<?php

$db = new mysqli('localhost', 'balfaki', 'Balfaki4266!', 'balfaki');

if (mysqli_connect_errno()) {
  echo 'Error: Could not connect to database. Please try again later.';
  exit;
}
for ($driver_id = 1; $driver_id <= 20; $driver_id++) {
  $query = "SELECT Drivers.driver_id, Drivers.name, Delivery.delivery_id, Delivery.delivery_date, Packages.package_id, Packages.weight, Addresses.street, Addresses.city, Addresses.state, Addresses.zip_code
            FROM Drivers
            LEFT JOIN Delivery ON Drivers.driver_id = Delivery.driver_id
            LEFT JOIN Packages ON Delivery.delivery_id = Packages.delivery_id
            LEFT JOIN Addresses ON Delivery.address_id = Addresses.address_id
            WHERE Drivers.driver_id = $driver_id";

  $result = $db->query($query);

  if (!$result) {
    echo 'Error: Could not retrieve data from database. Please try again later.';
    exit;
  }

  
  

  $name = '';
  while ($row = $result->fetch_assoc()) {
    if (!$name) {
      $name = $row['name'];
      
      echo "<h1>Driver " . $driver_id . ": ". $name ."</h1>";
      echo "<h2>Delivered</h2>";
    }

    echo "<p><b>Package " . $row['package_id'] . " </b>weight " . $row['weight'] . " pounds</p>";
    echo "<p>To address " . $row['street'] . " " . $row['city'] . ", " . $row['state'] . " " . $row['zip_code'] . "</p>";
    echo "<p>on: " . $row['delivery_date'] . "</p>";
  }

  $result->free();
}
$db->close();

?>
</body>
</html>
