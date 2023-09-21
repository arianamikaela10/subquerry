<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
@include 'connect.php';

if(isset($_POST['submit'])){//calling the variables from table

    //SUPPLIERS Table
    $ingredientid = mysqli_real_escape_string($conn, $_POST['ingredientid']);
    $name_ing = $_POST['name_ing'];
    $unit = $_POST['unit'];
    $unitprice = $_POST['unitprice'];
    $foodgroup = $_POST['foodgroup'];
    $inventory =  $_POST['inventory'];
    $supplierid_fk =  $_POST['supplierid_fk'];

    $select = " SELECT * FROM ingredients WHERE ingredientid = '$ingredientid'";
    $result = mysqli_query($conn, $select);
         
    if(mysqli_num_rows($result) > 0){//supplierid can only be use once
        $error[] = 'Ingredient ID already taken.';
    }else{ 
        $insert = "INSERT INTO ingredients VALUES('$ingredientid','$name_ing','$unit','$unitprice','$foodgroup','$inventory','$supplierid_fk')";
        mysqli_query($conn, $insert);//insert the data into the database
    }
}
?>

<html>
<head>
    <title>INGREDIENTS INSERT</title>
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
      <a class="active" href="ingredients_insert.php">Ingredients</a>
      <a href="items_insert.php">Items</a>
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
        <h3>INGREDIENTS</h3>
        
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

        <input type="text" name="ingredientid" required placeholder="Ingredient ID">
        <input type="text" name="name_ing" required placeholder="Name">
        <input type="int" name="unit" required placeholder="Unit">
        <input type="text" name="unitprice" required placeholder="Unit Price">
        <input type="text" name="foodgroup" required placeholder="Food Group">
        <input type="int" name="inventory" required placeholder="Inventory">
        <input type="text" name="supplierid_fk" required placeholder="Supplier ID">

        <input type="submit" name="submit" value="INSERT" class="form-btn">
    </form>
    </div>

</body>
</html>