<html>
<head>
  <title></title>
    <?php require_once "search.php"; ?>
    <link rel="stylesheet" type="text/css" href="view.css">
</head>
<body>


</body>
</html>
<?php   
          $pid = $_GET['product_id'];
          $image = $_POST['hidden_image'];
          $description = $_POST['hidden_description'];
          $name = $_POST['hidden_name'];
          $price = $_POST['hidden_price'];
          $cid = $_POST['hidden_cid'];

          echo '<div id="viewed_data"><img name="img" src="'.$image.'" alt="soap" style="width:270px;height:390px;margin-top:5px;margin-left:5px;">';
          echo  '<h3 id="viewHiddenName">'.$name.'</h3>';
          echo  '<b><p id="desPar" style="width:500px; margin-left:450px;margin-top:0;">'.$description.'</p></b>';
          echo  '<b style="margin-left:450px;"><b style="color:#cc2900;">Price: </b>'.$price.'</b>$<br>';
          echo  '<p style="margin-left:450px;"><b><b style="color:#cc2900;">Category id :</b>'.$cid.'</b></p>';

          echo '<form method="post" action="cart.php?action=add&product_id='.$pid.'">';
          echo '<h3 style="visibility:hidden;">Shopping_Cart</h3>';
          echo  '<input type="hidden"  name="hidden_name" value="'.$name.'">';
          echo  '<input type="hidden"  name="hidden_price" value="'.$price.'">';
          echo '<section  id="butsection"><input type="text" placeholder="Quantity" name="quantity" style="background-color: white;color:black;border:none;width:100px;height:30px;margin-top:-100px;"><input type="submit" value="add to cart" name="cart" style="cursor: pointer;background-color: #cc2900;color:#ffffcc; border:none;width:100px;height:30px;"></section></form></div>';


        if (isset($_POST['cart'])) {

        	$_SESSION['Shopping_Cart'] = $Shopping_Cart;


               $pid = $_GET['product_id'];
               $name = $_POST['hidden_name'];
               $price = $_POST['hidden_price'];
               $quantity = $_POST['quantity'];


        }


?>

