<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
 
 echo '<p>Hello World</p>'; 
 echo '<p>Hello World</p>'; 
 echo '<p>Hello World</p>'; 

    $conn = mysqli_init();
    mysqli_ssl_set($conn, NULL,NULL, "/Users/prasad/Downloads/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    mysqli_real_connect($conn, "prasadmysql1.mysql.database.azure.com", "prasad", "Abcde@123456", "testdb", 3306, MYSQLI_CLIENT_SSL);
 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT id, name FROM names";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
 ?> 
 
 </body>
</html>