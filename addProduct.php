<!DOCTYPE html>
<html>
<head>
	<title>add new product</title>
	<link rel="stylesheet" type="text/css" href="addProductStyle.css">
	    <?php require_once "search.php"; ?>

</head>
<body>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 ?>
 <section id="form-section">
<form action="addProduct.php" method="post">
	<h3 style="color:#ffffcc;">add new product</h3>
<label></label><input class="form-control" type="text" name="product_id" placeholder="product id">
<br>
<label></label><input class="form-control" type="text" name="product_name" placeholder="product name">
<br>
<label></label><input class="form-control" type="text" name="category_id" placeholder="category id">
<br>
<label></label><input class="form-control" type="text" name="list_price" placeholder="price">
<br>
<label></label><input class="form-control" type="text" name="image" placeholder="add image path">
<br>
<label></label><input class="form-control" type="text" name="description" placeholder="description">
<br>
<br>
<input class="form-control-submit" type="submit" name="submit" value="INSERT">
	
</form>
</section>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$requiredFields = [

		'id' => 'name is required',
		'name' => 'email is required',
		'category' => 'gpa is required',
		'price' => 'year is required',
		'image' => 'gender is required',
		'description' => 'password is required'
	];


if (isset($_POST['submit'])) {
  # code...

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$category_id = $_POST['category_id'];
$list_price = $_POST['list_price'];
$image = $_POST['image'];
$description = $_POST['description'];

echo "your name is".$product_id."<br>";
echo "your email is".$product_name."<br>";
echo "your gpa ".$category_id."<br>";
echo "year is".$list_price."<br>";
echo "gender".$image."<br>";
echo "password".$description."<br>";






$servername = "localhost";
$username = "c81_1150084_19";
$upassword = "comp334!";
$dbname = "c81_1150084_19";

    $conn = new mysqli($servername, $username, $upassword, $dbname);
    // set the PDO error mode to exception
if ($conn->connect_error) {

    die("connection failed:" .$conn->connect_error);
}
echo "connected successfully";

//include 'database.php';
try{
#$sql = $conn->prepare("INSERT INTO applicants (name,email,gpa,year,gender,passsword) VALUES (?,?,?,?,?,?)");
$sql = $conn->prepare("INSERT INTO `products`(`product_id`,`product_name`,`category_id`,`list_price`,`image`, `description`) VALUES (?,?,?,?,?,?)");

$sql->bind_param("isiiss",$product_id, $product_name, $category_id, $list_price, $image, $description);

$sql->execute();

printf("%d row inserted.\n",$sql->affected_rows);

$sql->close();

}catch(Exception $e){
	echo $ex;
  echo $e->getMessage();

}
            
  $conn->close();
}
}

?>


</body>
</html>