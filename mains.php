<html>
<head>
  <title></title>
      <link rel="stylesheet" type="text/css" href="mainstyle.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
          <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">



</head>
<body>
        <header id="myheader">
          <nav id="UL1">
           <ul >
           <li><button onclick="document.getElementById('id01').style.display='block'" style="width:auto; border: none;">Login</button></li>
          <li><a href="aboutUs.php">About us</a></li> 
          <li><a href="registration.php">Register</a></li> 
          <li><a href="cart.php">Shopping cart</a></li> 
          <li><a href="checkOut.php">Check out</a></li> 
        </ul>
        </nav>
      </header>




      <?php
 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["login"])) {


    
    /* Some Validation */
  $requiredFields = [
    'uname' => 'Email is required',
    'psw' => 'Password is required',
  ];

  foreach($requiredFields as $key => $message) {
    if (!isset($_POST[$key]) || empty($_POST[$key])) {
      die($message);
    }
  }
  include 'database.php';
    // Write the SQL statement string to select all items
     $sqlStatement = "SELECT * FROM customers where email= '".$_POST['uname']."'";
   
    // Prepare the results
    $result = $pdo->query($sqlStatement);
  
 // Execute the SQL query and get all rows
  $rows = $result->fetchAll();   
  $pass =$rows[0][8];
  $id = $rows[0][0];
  $role = $rows[0][9];
   
  $i= strcmp($pass,$_POST['psw']);
  
  session_name("login");
  session_start();
  
  $_SESSION['id']=$id;
  if($i == 0 && $role=="U"){
    setcookie('email',$_POST['uname'],time()+(30));
    session_start();
    $_SESSION ['email'] =$_POST['uname'];
    header("Location: userPage.php");
  }else if ($i == 0 && $role=="A"){
    setcookie('email',$_POST['uname'],time()+(30));
     session_start();
    $_SESSION ['email'] =$_POST['uname'];
    header("Location: adminPage.php");
  }
    else{
    // echo "
    //         <script type=\"text/javascript\">
    //         document.getElementById('errorMess').innerHTML = 'unvalide, try again';
    //         </script>
    //     ";
   // die("Email or passward is invalid, please try again from <a href="mains.php">here</a> ");
      die("incorrect");

    
  } 
}
?>

  <div id="id01" class="modal">
  
  <form class="modal-content animate"  method="post">

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter your email" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
      <label id="errorMess"></label>
        
      <button type="submit" name="login">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

      <div id="div2">
        <form action="search.php" method="post">
         <div><input type="search" name="search" id="search" placeholder="  search...">
          <input type="submit" name="" id="searchbtn" value="Go">
          <i class="fa fa-search"></i></div>
                 <h2 id="folklore">folklore</h2>
                 <p>Search for more Palestenian products and details...</p>
           </form>
      </div>
      
      <hr>
      <br>
      <br>
<div id="images">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/emp/17.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/emp/10.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/emp/8.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/emp/9.jpg" width="300" height="300">
  <p>The handmade Embroideries from Palestine.</p>
<hr>
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/pott/11.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/pott/10.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/pott/8.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/pott/5.jpg" width="300" height="300">
  <p>And the amazing Potteries from Palestine.</p>
  <hr>
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/1.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/4.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/8.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/soap/9.jpg" width="300" height="300">
  <p>This soap from Palestine is not just lovely shaped.</p>
<hr>
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/food/11.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/food/12.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/food/5.jpg" width="300" height="300">
  <img src="http://web1152896.studentswebprojects.ritaj.ps/webProject/images/food/7.jpg" width="300" height="300">
  <p>We are pretty sure you will fall in love with this Palestenian food.</p>
  <hr>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 ?>

<?php
if (isset($_POST['searchbutton'])) {
  # code...


$search = $_POST['search'];


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

$sql = "SELECT * FROM `products` WHERE product_name LIKE CONCAT('%',?,'%')";
 
 $stmt = $conn->prepare($sql);
  
$stmt->bind_param("s",$search);

 $stmt->execute();

 $result = $stmt->get_result();



    // output data of each row
   if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) 
    { 
      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $category_id = $row['category_id'];
      $list_price = $row['list_price'];
      $image = $row['image'];
      $description = $row['description'];


      echo '<br><div style="margin-left:1px"><img src="'.$image.'" alt="soap" style="width:150px;height:150px">';
      echo '<h3 style="color="blue";"><a href=viewProduct.php?product_id>'.$product_name.'</a></h3>  ';
      echo '<div style="width:500px;"><b>'.$description.'<b></div><br>';
      echo ' '.$product_id.'  ';
      echo ''.$category_id.'  ';
      echo 'price'.$list_price.'$';
      echo "<hr style='width:1400px;background_color:black;'></div>";


     }
   

    } 
   /* if(!$arr) exit('No rows');
      var_export($arr); */
      $stmt->close();
    //  $sql->close();

}catch(Exception $e){
  echo $ex;
  echo $e->getMessage();

}
            
  $conn->close();
}

?>

 