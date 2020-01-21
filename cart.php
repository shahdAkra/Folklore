<html>
<head>
  <title>Shopping cart
</title>
  <link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>

 <?php require_once "search.php"; ?>
<?php

session_start();
  if (isset($_POST['cart'])) {  

               $pid = $_GET['product_id'];
               $name = $_POST['hidden_name'];
               $price = $_POST['hidden_price'];
               $quantity = $_POST['quantity'];


       if (isset($_SESSION['Shopping_Cart'])) {

            $product_array_id = array_column($_SESSION["Shopping_Cart"], "product_id");

          //  echo $product_array_id;

               if (!in_array($_GET["product_id"], $product_array_id)) {

               $count = count($_SESSION["Shopping_Cart"]); 

               $product_array = array(

              'product_id' => $_GET["product_id"],
              'product_name' => $_POST["hidden_name"],
              'list_price' => $_POST["hidden_price"],
              'quantity' => $_POST["quantity"]

               );

              $_SESSION["Shopping_Cart"][$count] = $product_array; 

              


           } else {

           echo '<script>alert("This product is already in your shopping cart.")</script>';
           echo '<script>window.location="cart.php"</script>';

           
            }

           } else {

            $product_array = array(

              'product_id' => $_GET["product_id"],
              'product_name' => $_POST["hidden_name"],
              'list_price' => $_POST["hidden_price"],
              'quantity' => $_POST["quantity"]

             ); 

             $_SESSION["Shopping_Cart"][0] = $product_array;//we stored all the items in the session variable


} 
}

?>

<table id="products">
  <tr><th> Name </th>
 <th>  Quantity </th>
 <th>   Price </th>
<th> Total </th> 
<th>Remove Product</th>
</tr>

 
 <?php  
  if (!empty($_SESSION['Shopping_Cart'])) {

     $total = 0;

  
     foreach($_SESSION['Shopping_Cart'] as $keys => $values) {
   
  ?>

  <tr>

  <td><?php echo $values['product_name']; ?></td>
  <td> <?php echo $values['quantity']; ?> </td>
  <td>$ <?php echo $values['list_price']; ?> </td>
  <td> <?php echo number_format($values['quantity'] * $values['list_price'], 2); ?> </td>
  <td><a href="cart.php?action=delete&product_id=<?php echo $values['product_id']; ?>">remove</a></td>
 </tr>

  <form action="checkOut.php" method="post">
 <input type="hidden" name="hiddenName" value="<?php echo $values['product_name']; ?>">
  <input type="hidden" name="hiddenQuantity" value="<?php echo $values['quantity']; ?>">
  <input type="hidden" name="hiddenPrice" value="<?php echo $values['list_price']; ?>"></td>
  <input type="hidden" name="hiddenTotalPrices" value="<?php echo number_format($values['quantity'] * $values['list_price'], 2); ?>">

 <?php
    $total = $total + ($values['quantity'] * $values['list_price']);
   }
    
    ?>
    <tr>
      <td colspan="3">Total</td>
      <td colspan="2">$ <?php echo number_format($total, 2); ?></td>
    </tr>  
  
  <input type="hidden" name="hiddenTotal" value="<?php echo number_format($total, 2); ?>">
  <input type="submit" name="check" id="checkOut" value="checkOut">
</form>  
<?php
if (isset($_POST['check'])) {

  $Total = $_POST['hiddenTotal'];

}



?>


</table>
 
<!--<button id="checkOut"><b><a id="refcheck" href="check.php">check out</a></b></button> -->

</body>
</html> 
  <?php

  if (isset($_GET["action"])) {

if ($_GET["action"] == "delete") {

foreach ($_SESSION["Shopping_Cart"] as $keys => $values) {

if ($values['product_id'] == $_GET['product_id']) {

unset($_SESSION["Shopping_Cart"][$keys]);

echo '<script>alert("product removed")</script>';
echo '<script>window.location="cart.php"</script>';

}

}

}

}
  }

   
  ?> 