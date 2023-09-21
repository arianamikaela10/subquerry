<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
@include 'connect.php';

if(isset($_POST['submit'])){//calling the variables from table

    //SUPPLIERS Table
    $supplierid = mysqli_real_escape_string($conn, $_POST['supplierid']);
    $company_name = $_POST['company_name'];
    $rep_fname = $_POST['rep_fname'];
    $rep_lname = $_POST['rep_lname'];
    $referred_by =  $_POST['referred_by'];

    $select = " SELECT * FROM suppliers WHERE supplierid = '$supplierid'";
    $result = mysqli_query($conn, $select);
         
    if(mysqli_num_rows($result) > 0){//supplierid can only be use once
        $error[] = 'Supplier ID already taken.';
    }else{ 
        $insert = "INSERT INTO suppliers VALUES('$supplierid','$company_name','$rep_fname','$rep_lname','$referred_by')";
        mysqli_query($conn, $insert);//insert the data into the database
    }
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
      <a class="active" href="supplier_insert.php">Supplier</a>
      <a href="ingredients_insert.php">Ingredients</a>
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
        <h3>SUPPLIER</h3>
        
        <?php
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

        <input type="int" name="supplierid" required placeholder="Supplier ID">
        <input type="text" name="company_name" required placeholder="Company Name">
        <input type="text" name="rep_fname" required placeholder="First Name">
        <input type="text" name="rep_lname" required placeholder="Last Name">
        <input type="text" name="referred_by" required placeholder="Referred by">

        <input type="submit" name="submit" value="INSERT" class="form-btn">
    </form>
    </div>
</body>
</html>