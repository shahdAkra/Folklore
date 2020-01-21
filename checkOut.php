<!DOCTYPE html>
<html>
<head>
	<title>Check Out</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Bad+Script&display=swap" rel="stylesheet">

    <script>

function validateReg(){
  alert("Data inserted successfully");
    return false;
}
 function loginFirst(){
  alert("You need to login first !!");
  window.location="mains.php";

    return false;
}


</script>
</head>


<body>

	<header id="myhead">

        <ul id="UL1">
          
        <li><a href="logout.php">Log out</a></li>
        <li><a href="userPage.php">My account</a></li>
         <li><a href="registration.php">Register</a></li>      
          <li><a href="cart.php">Shopping cart</a></li> 
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

     <div id="invoice">
     <h1>INVOICE</h1>
     <form method="post" action="checkOut.php?action=end">

     <div id="invoiceArticle">
     	
     <article>
     	<label>From:</label><br>
     	<label>Palestine, Birzeit, Folklore</label><br>
     	<br>
     	<!-- customer's billing address -->
     	<label>Bill to:</label><br>
     	<textarea rows="4" cols="50" id="billingAddress" name="billingAddress" required></textarea><br>
     	<br>
     	<!-- customer's shipping address -->
     	<label>Ship to:</label><br>
     	<textarea rows="4" cols="50" id="shippingAddress" name="shippingAddress"></textarea>
     	<br>
     </article>

     <article>
     	<h2 id="folklore">folklore</h2>
     	<br>
     	<label>Invoice Date:</label><br>
     	<label><?php echo date("m/d/Y"); ?></label><br>
     	<br>
     	<label>Due Date:</label><br>
     	<input type="Date" name="dueDate" ><br>
     	<br>
     </article>

    </div>

    <article id="productInfo">
    	
    <!--	<label>Product id: </label>
    	<input type="text" name="product_id">
    	<label>Price for unit: </label>
    	<label><?php ?>$</label>
    	<label>Amount: </label>
    	<input type="number" name="amount" value="1">
        <label>Tax: </label>
        <label><?php ?> $</label>
        <label>Delivary: </label>
        <label>5$  </label> -->

    </article>


    <h3 id="totalPrice">Total Price:$<?php echo $_POST['hiddenTotal']; ?></h3>


    <article id="finalB">


    <article id="ccArticle">
    	<h2>Update your credit or debit card</h2>
        <input type="hidden" name="checkOutTotal" value="<?php echo $_POST['hiddenTotal']; ?>">
    	<input type="text" name="firstName" placeholder="First Name" required><br>
    	<br>
    	<input type="text" name="lastName" placeholder="Last Name" required><br>
    	<br>
    	<input type="text" name="cardNumber" placeholder="Card Number" required><br>
    	<br>
    	<input type="textExpiration Date (MM/YY)" name="expirationDate" placeholder="Expiration Date (MM/YY)" required><br>
    	<br>
    	<input type="password" name="ccv" placeholder="Security code (CVV)" required><br>
    	<br>

    </article>

    <input type="submit" class="button" name="save" value="save" id="btn_save">

    <!-- <button id="btn_save">Save</button> -->

    </article>




     <footer>
        <label>Terms & Conditions</label><br>
     	<textarea rows="5" cols="150" name="termsAndConditions">Payment is due within 10 days maximum</textarea><br>

     </footer>

 </form>

    </div>

</body>

<?php

 session_start();
        if (isset($_SESSION ['email'])){
            $email= $_SESSION ['email'];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
        switch ($_POST['submit']) {
            case 'save':
                save();
                break;
            
        }
    }


    function save() {
        if (isset($_POST['save'])) {
            # code...
        


    $billingAddress = $_POST["billingAddress"];
    $shippingAddress = $_POST["shippingAddress"];
  //  $product_id = $_POST["product_id"];
  //  $amount = $_POST["amount"];
    $dueDate = $_POST["dueDate"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $cardNumber = $_POST["cardNumber"];
    $expirationDate = $_POST["expirationDate"];
    $ccv = $_POST["ccv"];
    $hiddenTotal = $_POST['hiddenTotal'];
        
    include 'database.php';

    $sqlStatement = "INSERT INTO checkOuts (billingAddress, shippingAddress,dueDate, firstName,lastName, cardNumber,expirationDate, ccv,Total) VALUES (?,?,?,?,?,?,?,?,?)";

      $stmt = $pdo->prepare($sqlStatement);
      $status = $stmt->execute([$_POST['billingAddress'], $_POST['shippingAddress'],$_POST['dueDate'], $_POST['firstName'], $_POST['lastName'], $_POST['cardNumber'], $_POST['expirationDate'], $_POST['ccv'],$_POST['hiddenTotal']]);



      
      if($status) {
        echo 'Data inserted successfully';

        echo '<script type="text/javascript"> validateReg(); </script>';
      }
      else {
        echo $stmt->error;
      }





        exit;
    }
}

}
else{

    echo '<script type="text/javascript"> loginFirst(); </script>';
}


?>
<?php

  if (isset($_GET["action"])) {

if ($_GET["action"] == "end") {

unset($_SESSION["Shopping_Cart"]);

echo '<script>alert("cart reset")</script>';
echo '<script>window.location="mains.php"</script>';

}

}



?>



</html>