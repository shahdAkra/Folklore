<!DOCTYPE html>
<html>
<head>
	<title>Resistration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">

<script>
function validateForm() {
  var x = document.forms["regForm"]["password"].value.length;
  if (x <= 3 ) {
    alert("Your password must be more than three characters!");
    return false;
  }
}

function validateReg(){
  alert("Data inserted successfully");
    return false;
}
</script>

</head>
<body>


  <header id="myhead">

        <ul id="UL1">
          <li><a href="mains.php">Log in</a></li> 
          <li><a href="aboutUs.php">About us</a></li> 
                
        </ul>
   <form id="searchform" action="search.php" method="post">
    <div>
     <i class="fa fa-search"></i></div>
     <input id="search" type="text" name="searchtext" placeholder="search...">
     <input id="searchbtn" type="submit" name="searchbutton" value="Go">
    </form>

     </header>
     <a href="http://web1150084.studentswebprojects.ritaj.ps/webProject/mains.php" id="folkLink"><h2 id="folk">folklore</h2></a>
     

	<form method="post" name:"regForm" action="registration.php" onsubmit="return validateForm()" id="regForm">
    <div id="lb">
      Name:<br>
    <input type="text" name="name" required><br>
    Address:<br>
    <input type="text" name="address" required><br>
    Date of birth:<br>
    <input type="date" name="date_of_birth" required><br>
    ID Number:<br>
    <input type="text" name="id_number" required><br>
      
    </div>
		<div id="rb">
    E-mail Address:<br>
    <input type="email" name="email" required><br>
    Telephone number:<br>
    <input type="tel" name="phone" required><br>
    Fax number:<br>
    <input type="text" name="fax" required><br>
    Password:<br>
    <input type="password" name="password" required><br>  
    </div>
		
		<br>
		<input type="submit" name="submit" id="submit">

	</form>

</body>


<?php

   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){

     	


    $name = $_POST["name"];
    $address = $_POST["address"];
    $date_of_birth = $_POST["date_of_birth"];
    $id_number = $_POST["id_number"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $fax = $_POST["fax"];
    $password = $_POST["password"];

    $dbhost = "localhost";
    $dbuser = "c81_1150084_19";
    $dbpass = "comp334!";
    $dbname = "c81_1150084_19";

      $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser, $dbpass);

      if(!$pdo ) {
        die("Could not connect to database");
      }
      
      $sqlStatement = "INSERT INTO customers (name, address,date_of_birth, id_number, email, phone, fax, password) VALUES (?,?,?,?,?,?,?,?)";

      $stmt = $pdo->prepare($sqlStatement);
      $status = $stmt->execute([$_POST['name'], $_POST['address'], $_POST['date_of_birth'], $_POST['id_number'], $_POST['email'], $_POST['phone'], $_POST['fax'], $_POST['password']]);



      
      if($status ) {
        echo 'Data inserted successfully';

        echo '<script type="text/javascript"> validateReg(); </script>';
      }
      else {
        echo $stmt->error;
      }
     }

     ?>


</html>