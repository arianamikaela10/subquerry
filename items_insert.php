<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
@include 'connect.php';

if(isset($_POST['submit'])){//calling the variables from table

    //Items Table
    $itemid = mysqli_real_escape_string($conn, $_POST['itemid']);
    $name_item = $_POST['name_item'];
    $price = $_POST['price'];
    $dateadded =  $_POST['dateadded'];

    $select = " SELECT * FROM items WHERE itemid = '$itemid'";
    $result = mysqli_query($conn, $select);
         
    if(mysqli_num_rows($result) > 0){//supplierid can only be use once
        $error[] = 'Item ID already taken.';
    }else{ 
        $insert = "INSERT INTO items VALUES('$itemid','$name_item','$price','$dateadded')";
        mysqli_query($conn, $insert);//insert the data into the database
    }
}
?>

<html>
<head>
    <title>ITEMS INSERT</title>
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
      <a class="active" href="items_insert.php">Items</a>
      <a href="made_insert.php">Made-With</a>
      <a href="meals_insert.php">Meals</a>
      <a href="part_insert.php">Part-Of</a>
      <a href="menu_insert.php">Menu-Item</a>
   </div>

   <div class="record">
        <?php
            if ($result) {?>
                    <h3>New record created successfully</h3><?php
            }
        ?>
    </div>

    <div class="form-container">
    <form action="" method="post">
        <h3>ITEMS</h3>
        
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

        <input type="int" name="itemid" required placeholder="Item ID">
        <input type="text" name="name_item" required placeholder="Name">
        <input type="text" name="price" required placeholder="Price">
        <input type="date" name="dateadded" required placeholder="Date Added ID">

        <input type="submit" name="submit" value="INSERT" class="form-btn">
    </form>
    </div>

</body>
</html>