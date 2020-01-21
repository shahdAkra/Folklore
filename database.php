
<?php

$dbhost = "localhost";
    $dbuser = "c81_1150084_19";
    $dbpass = "comp334!";
    $dbname = "c81_1150084_19";

      $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser, $dbpass);

      if(!$pdo ) {
        die("Could not connect to database");
      }

      ?>