<!DOCTYPE html>
<html>

<?php
        session_start();
        if (isset($_SESSION ['email'])){
        $email= $_SESSION ['email'];

        include 'database.php';
        $sqlStatement = "SELECT * FROM customers where email= '".$email."'";
        $result = $pdo->query($sqlStatement);

        if (!$result){
          echo "no connection";
        }

        $rows = $result->fetchAll(); 

        $name = $rows[0][1];
        $dob = $rows[0][3];
        $phone = $rows[0][6];
        $fax = $rows[0][7];
        $address = $rows[0][2];
        $idNum = $rows[0][4];

       }else{

         $_SESSION ['email'] =$_COOKIE['email'];


        $email= $_SESSION ['email'];

        include 'database.php';
        $sqlStatement = "SELECT * FROM customers where email= '".$email."'";
        $result = $pdo->query($sqlStatement);

        if (!$result){
          echo "no connection";
        }

        $rows = $result->fetchAll(); 

        $name = $rows[0][1];
        $dob = $rows[0][3];
        $phone = $rows[0][6];
        $fax = $rows[0][7];
        $address = $rows[0][2];
        $idNum = $rows[0][4];

       }

     ?>



<head>
  <title>Admin Account</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">
</head>
<body>

  <header id="myhead">

        <ul id="UL1">
          <li><a href="logout.php">Log out</a></li>
          <li><a href="aboutUs.php">About us</a></li> 
          <li><a href="registration.php">Register</a></li> 
          <li><a href="">Shopping cart</a></li> 
          <li><a href="checkOut.php">Check out</a></li> 
          <li><a href="addProduct.php">Add product</a></li>         
        </ul>
   <form id="searchform" action="search.php" method="post">
    <div>
     <i class="fa fa-search"></i></div>
     <input id="search" type="text" name="searchtext" placeholder="search...">
     <input id="searchbtn" type="submit" name="searchbutton" value="Go">
    </form>

     </header>
     <a href="http://web1150084.studentswebprojects.ritaj.ps/webProject/mains.php" id="folkLink"><h2 id="folk">folklore</h2></a>
     

     <div id="userContainer">
      <h1> Welcome Admin </h1>
         <label id="name"><?php  echo $name;?></label><br>
         <br>
         <label id="email"><?php  echo $email;?></label><br>
         <br>
         <label id="Address"><?php  echo $address;?></label><br>
         <br>
         <label id="dob"><?php  echo $dob;?></label><br>
         <br>
         <label id="idNum"><?php  echo "ID number ( ".$idNum." )";?></label><br>
         <br>
         <label id="phone"><?php  echo "Phone number ( ".$phone." )";?></label><br>
         <br>
         <label id="fax"><?php  echo "Fax number ( ".$fax." )";?></label><br>


      
     </div>


</body>
</html>