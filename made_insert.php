<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
@include 'connect.php';

if(isset($_POST['submit'])){//calling the variables from table

    //MADE WITH Table
    $itemid_mfk = $_POST['itemid_mfk'];
    $ingredientid_fk = $_POST['ingredientid_fk'];
    $quantity =  $_POST['quantity'];
         
    $insert = "INSERT INTO madewith VALUES('$itemid_mfk','$ingredientid_fk','$quantity')";
    mysqli_query($conn, $insert);
}
?>

<html>
<head>
    <title>MADE WITH INSERT</title>
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
      <a class="active" href="made_insert.php">Made-With</a>
      <a href="meals_insert.php">Meals</a>
      <a href="part_insert.php">Part-Of</a>
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
        <h3>MADE WITH</h3>
        
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

        <input type="text" name="itemid_fk" required placeholder="Item ID">
        <input type="text" name="ingredientid_mfk" required placeholder="Ingredient ID">
        <input type="int" name="quantity" required placeholder="Quantity">

        <input type="submit" name="submit" value="INSERT" class="form-btn">
    </form>
    </div>

</body>
</html>