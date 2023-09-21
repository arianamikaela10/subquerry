<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
@include 'connect.php';

if(isset($_POST['submit'])){//calling the variables from table

    //PART OF Table
    $mealid_fk = $_POST['mealid_fk'];
    $itemid_fk = $_POST['itemid_fk'];
    $quantity =  $_POST['quantity'];
    $discount =  $_POST['discount'];
         
    $insert = "INSERT INTO partof VALUES('$mealid_fk','$itemid_fk','$quantity','$discount')";
    mysqli_query($conn, $insert);
}
?>

<html>
<head>
    <title>INSERT</title>
   <link rel="stylesheet" href="design.css">
</head>
<body>

   <div class="header">
   <h1>LABORATORY EXERCISE 1 </h1>
   </div>
   <div class="nav">
      <a href="view.php">VIEW</a>
      <a href="insert.php">INSERT</a>
      <a href="supplier_insert.php">Supplier</a>
      <a href="ingredients_insert.php">Ingredients</a>
      <a href="items_insert.php">Items</a>
      <a href="made_insert.php">Made-With</a>
      <a href="meals_insert.php">Meals</a>
      <a class="active" href="part_insert.php">Part-Of</a>
      <a href="menu_insert.php">Menu-Item</a>
   </div>

   <div class="record">
        <?php
            if ($insert) {?>
                    <h3>New record created successfully</h3><?php
            }
        ?>
    </div>

    <div class="form-container">
    <form action="" method="post">
        <h3>PART OF</h3>
        
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

        <input type="text" name="mealid_fk" required placeholder="Meal ID">
        <input type="text" name="itemid_fk" required placeholder="Item ID">
        <input type="int" name="quantity" required placeholder="Quantity">
        <input type="int" name="discount" required placeholder="Discount">

        <input type="submit" name="submit" value="INSERT" class="form-btn">
    </form>
    </div>

</body>
</html>