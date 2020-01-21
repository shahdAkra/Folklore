<html>
<head>
  <title></title>
        <link rel="stylesheet" type="text/css" href="stylesearch.css">
          <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">

</head>
<body>


    <header id="myhead">
        <ul id="UL1">

           <li><a href="mains.php">Log in</a></li>
          <li><a href="aboutUs.php">About us</a></li> 
          <li><a href="registration.php">Register</a></li> 
          <li><a href="cart.php">Shopping cart</a></li> 
          <li><a href="checkOut.php">Check out</a></li>         
        </ul>
<form id="searchform" action="search.php" method="post">
    <div>
          <i class="fa fa-search"></i></div>
          <input type="checkbox" name="filter" value="filter" id="searchFilter"  style="margin-left: 200px;
    margin-top: 30px;color: #ffffcc;"> Filter by Price<br> 
  <input id="search" type="text" name="searchtext" placeholder="search...">

  <input id="searchbtn" type="submit" name="searchbutton" value="Go">
</form>
<!--<form id="priceform" action="searchs.php" method="post">
    <div>
          <i class="fa fa-search"></i></div>
  <input id="price" type="text" name="pricetext" placeholder="search price...">
  <input id="pricebtn" type="submit" name="searchbutton" value="Go">
</form>  -->
     </header>
<a href="http://web1150084.studentswebprojects.ritaj.ps/webProject/mains.php" id="folkLink"><h2 id="folk">folklore</h2></a><br><br>
   

</body>
</html> 

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 ?>

<?php


if (isset($_POST['searchbutton'])) {
  


$searchtext = $_POST['searchtext'];



echo "<br>";



$servername = "localhost";
$username = "c81_1150084_19";
$upassword = "comp334!";
$dbname = "c81_1150084_19";

    $conn = new mysqli($servername, $username, $upassword, $dbname);
    // set the PDO error mode to exception
if ($conn->connect_error) {

    die("connection failed:" .$conn->connect_error);
}
echo "";
 

try{

  $sql = "SELECT * FROM `products` WHERE product_name LIKE CONCAT('%',?,'%') ORDER BY product_id";

  if(!empty($_POST['filter'])) {

    $sql = "SELECT * FROM `products` WHERE product_name LIKE CONCAT('%',?,'%') ORDER BY list_price";

        
    }
 
 $stmt = $conn->prepare($sql);
  
$stmt->bind_param("s",$searchtext);

 $stmt->execute();

 $result = $stmt->get_result();



    // output data of each row
   if ($result->num_rows > 0) { 
    while($row = $result->fetch_array()) 
    { 

   // "<form action='viewProduct.php' method='get'>";
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $category_id = $row['category_id'];
      $list_price = $row['list_price'];
      $image = $row['image'];
      $description = $row['description'];
      
      //"</form>";
      
      echo '<img name="img" src="'.$image.'" alt="soap" style="width:150px;height:150px">';
      echo '<h3 style="color="blue";">'.$product_name.'</a></h3>  ';
      echo '<div style="width:500px;"><b>'.$description.'</b></div><br>';
      echo '<b>price'.$list_price.'$</b><br>';
      echo '<form method="post" action="view.php?action=add&product_id='.$product_id.'">';
     // echo '<input type="submit" name="image" src="'.$image.'" style="display:none;width:48;height:48;">';
      echo '<input type="hidden" name="hidden_image" value="'.$image.'">';
      echo '<input type="hidden" name="hidden_description" value="<b>'.$description.'</b><br>">';
      echo '<input type="hidden" name="hidden_pid" value="'.$product_id.'">';
      echo '<input type="hidden" name="hidden_name" value="'.$product_name.'">';
      echo '<input type="hidden" name="hidden_price" value="'.$list_price.'">';
      echo '<input type="hidden" name="hidden_cid" value="'.$category_id.'">';
      echo '<input type="submit" value="view product" name="viewProduct" style="background-color: #cc2900;color:#ffffcc; border:none;width:100px;height:30px;"></form>';
      echo "<hr style='width:1400px;color:black;'></div>";

     }
     if (isset($_POST['viewProduct'])) {

          $image = $_POST['hidden_image'];
          $description = $_POST['hidden_description'];
          $name = $_POST['hidden_name'];
          $price = $_POST['hidden_price'];
        //  $pid = $_GET['hidden_pid'];
          $cid = $_POST['hidden_cid'];



        }   

    } 

      $stmt->close();
    //  $sql->close();

 //     session_start();


}catch(Exception $e){
  echo $ex;
  echo $e->getMessage();

}
            
 # $conn->close();
}

?>