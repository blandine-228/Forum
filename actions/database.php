

<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    //session_start();
  $bdd = new PDO("mysql:host=$servername;dbname=forumm", $username, $password);
  // set the PDO error mode to exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>



