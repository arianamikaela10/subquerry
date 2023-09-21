<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
@include 'connect.php';

if(isset($_POST['submit'])){//calling the variables from table

    //SUPPLIERS Table
    $supplierid = $_POST['supplierid'];
    $company_name = $_POST['company_name'];
    $rep_fname = $_POST['rep_fname'];
    $rep_lname = $_POST['rep_lname'];
    $referred_by =  $_POST['referred_by'];

    //INGREDIENTS Table
    $ingredientid = $_POST['ingredientid'];
    $name_ing = $_POST['name_ing'];
    $unit = $_POST['unit'];
    $unitprice = $_POST['unitprice'];
    $foodgroup = $_POST['foodgroup'];
    $inventory =  $_POST['inventory'];
    $supplierid_fk =  $_POST['supplierid_fk'];

    //Items Table
    $itemid = mysqli_real_escape_string($conn, $_POST['itemid']);
    $name_item = $_POST['name_item'];
    $price = $_POST['price'];
    $dateadded =  $_POST['dateadded'];

    //MADE WITH Table
    $itemid_mfk = $_POST['itemid_mfk'];
    $ingredientid_fk = $_POST['ingredientid_fk'];
    $quantity =  $_POST['quantity'];

    //MEALS Table
    $mealid = mysqli_real_escape_string($conn, $_POST['mealid']);
    $name_meal = $_POST['name_meal'];
    $description = $_POST['description'];

    //PART OF Table
    $mealid_fk = $_POST['mealid_fk'];
    $itemid_fk = $_POST['itemid_fk'];
    $quantity =  $_POST['quantity'];
    $discount =  $_POST['discount'];

    //MENU ITEM Table
    $menuitemid = mysqli_real_escape_string($conn, $_POST['menuitemid']);
    $name = $_POST['name'];
    $price = $_POST['price'];

    $insert = "INSERT INTO suppliers VALUES('$supplierid','$company_name','$rep_fname','$rep_lname','$referred_by');";
    $insert .= "INSERT INTO ingredients VALUES('$ingredientid','$name_ing','$unit','$unitprice','$foodgroup','$inventory','$supplierid_fk');";
    $insert .= "INSERT INTO items VALUES('$itemid','$name_item','$price','$dateadded');";
    $insert .= "INSERT INTO madewith VALUES('$itemid_mfk','$ingredientid_fk','$quantity');";
    $insert .= "INSERT INTO meals VALUES('$mealid','$name_meal','$description');";
    $insert .= "INSERT INTO partof VALUES('$mealid_fk','$itemid_fk','$quantity','$discount');";
    $insert .= "INSERT INTO menuitems VALUES('$menuitemid','$name','$price');";

    mysqli_query($conn, $insert);//insert the data into the database
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
      <a class="active" href="insert.php">INSERT</a>
      <a href="supplier_insert.php">Supplier</a>
      <a href="ingredients_insert.php">Ingredients</a>
      <a href="items_insert.php">Items</a>
      <a href="made_insert.php">Made-With</a>
      <a href="meals_insert.php">Meals</a>
      <a href="part_insert.php">Part-Of</a>
      <a href="menu_insert.php">Menu-Item</a>
   </div>

   <div class="record">
        <?php
            if ($conn->multi_query($insert) === TRUE) {?>
                    <h3>New record created successfully</h3><?php
            }
        // Close connection
        mysqli_close($conn);
        ?>
    </div>

    <div class="form-container">
    <form action="" method="post">
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
    <br>
    <h2>SUPPLIERS</h2>
        <input type="int" name="supplierid" required placeholder="Supplier ID (sup1, sup2, sup3...)">
        <input type="text" name="company_name" required placeholder="Company Name">
        <input type="text" name="rep_fname" required placeholder="First Name">
        <input type="text" name="rep_lname" required placeholder="Last Name">
        <input type="text" name="referred_by" required placeholder="Referred by (sup1, sup2, sup3...)">
        <br><br><br>

    <h2>INGREDIENTS</h2>
        <input type="text" name="ingredientid" required placeholder="Ingredient ID (ing1, ing2, ing3...)">
        <input type="text" name="name_ing" required placeholder="Name">
        <input type="int" name="unit" required placeholder="Unit">
        <input type="text" name="unitprice" required placeholder="Unit Price (ex. 123.45)">
        <input type="text" name="foodgroup" required placeholder="Food Group">
        <input type="int" name="inventory" required placeholder="Inventory">
        <input type="text" name="supplierid_fk" required placeholder="Supplier ID (sup1, sup2, sup3...)">
        <br><br><br>

    <h2>ITEMS</h2>
        <input type="int" name="itemid" required placeholder="Item ID (ite1, ite2, ite3...)">
        <input type="text" name="name_item" required placeholder="Name">
        <input type="text" name="price" required placeholder="Price (ex. 123.45)">
        <input type="date" name="dateadded" required placeholder="Date Added ID">
        <br><br><br>
        
    <h2>MADE WITH</h2>
        <input type="text" name="itemid_mfk" required placeholder="Item ID (ite1, ite2, ite3...)">
        <input type="text" name="ingredientid_fk" required placeholder="Ingredient ID (ing1, ing2, ing3...)">
        <input type="int" name="quantity" required placeholder="Quantity">
        <br><br><br>
    
    <h2>MEALS</h2>
        <input type="text" name="mealid" required placeholder="Meal ID (ml1, ml2, ml3...)">
        <input type="text" name="name_meal" required placeholder="Name">
        <input type="text" name="description" required placeholder="Description">
        <br><br><br>

    <h2>PART OF</h2>
        <input type="text" name="mealid_fk" required placeholder="Meal ID (ing1, ing2, ing3...)">
        <input type="text" name="itemid_fk" required placeholder="Item ID (ite1, ite2, ite3...)">
        <input type="int" name="quantity" required placeholder="Quantity">
        <input type="int" name="discount" required placeholder="Discount (ex. o.99)">
        <br><br><br>

    <h2>MENU ITEM</h2>
        <input type="text" name="menuitemid" required placeholder="Menu Item ID (mt1, mt2, mt3...)">
        <input type="text" name="name" required placeholder="Name">
        <input type="int" name="price" required placeholder="Price">

        <br><br><br><br>
        <input type="submit" name="submit" value="INSERT" class="form-btn">
    </form>
    </div>


</body>
</html>