<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php
 echo "<p>Hello World</p>";

 $conn = mysqli_init();
 mysqli_ssl_set($conn, null, null, "DigiCertGlobalRootCA.crt.pem", null, null);
 mysqli_real_connect(
     $conn,
     "prasadmysql1.mysql.database.azure.com",
     "prasad",
     "Abcde@123456",
     "testdb",
     3306,
     MYSQLI_CLIENT_SSL
 );

 if ($conn->connect_error) {
     echo "<p>connection error<p>";
     die("Connection failed: " . $conn->connect_error);
 }

 echo "<p>connection ok<p>";
 $sql = "SELECT id, name FROM names";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
     // output data of each row
     while ($row = $result->fetch_assoc()) {
         echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
     }
 } else {
     echo "0 results";
 }
 $conn->close();
 ?> 
 
 </body>
</html>
