<?php error_reporting (E_ALL ^ E_WARNING); ?>
<?php
  @include 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title> Retrive data</title>
  <link rel="stylesheet" href="design.css">
</head>
<body>
  <div class="header">
    <h1>LABORATORY EXERCISE 1 </h1>
  </div>
  <div class="nav">
      <a class="active" href="view.php">SUBQUERY</a>
      <a href="insert.php">INSERT</a>
      <a href="supplier_insert.php">Supplier</a>
      <a href="ingredients_insert.php">Ingredients</a>
      <a href="items_insert.php">Items</a>
      <a href="made_insert.php">Made-With</a>
      <a href="meals_insert.php">Meals</a>
      <a href="part_insert.php">Part-Of</a>
      <a href="menu_insert.php">Menu-Item</a>
  </div>

  
  <div class="tab">
    <?php

//NUMBER 1
//NUMBER 1
//NUMBER 1
      $result =  mysqli_query($conn,"SELECT * FROM `ingredients` WHERE supplierid_fk = 'sup2'");
      if (mysqli_num_rows($result) > 0) { //create table
    ?>
    <br><br><br>
    <h3>#1 Ingredients supplied by 'sup2'</h3>
    <br>

    <table>
      <tr>
        <th>INGREDIENT ID</th>
        <th>NAME</th>
        <th>UNIT</th>
        <th>UNIT PRICE</th>
        <th>FOOD GROUP</th>
        <th>INVENTORY</th>
        <th>SUPPLIER ID</th>
      </tr>

      <?php
        $i=0;
        while($row = mysqli_fetch_array($result)) {//fetch all selected data
      ?>

      <tr>
      <td><?php echo $row["ingredientid"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["unit"]; ?></td>
          <td><?php echo $row["unitprice"]; ?></td>
          <td><?php echo $row["foodgroup"]; ?></td>
          <td><?php echo $row["inventory"]; ?></td>
          <td><?php echo $row["supplierid_fk"]; ?></td>
      </tr>
      
      <?php
        $i++;
        }
      ?>
    </table>
    <?php
    }
    else{//print if there are no data in table
        echo "No result found";
    }
    
//NUMBER 2 
//NUMBER 2 
//NUMBER 2 
    $result2 =  mysqli_query($conn,"SELECT * FROM `ingredients` WHERE supplierid_fk = 'sup1' OR supplierid_fk = 'sup2'");
    if (mysqli_num_rows($result2) > 0) { //create table
    ?>
    <br><br><br>
    <h3>#2 Ingredients supplied by 'sup1' or 'sup2'</h3>
    <br>

    <table>
      <tr>
        <th>INGREDIENT ID</th>
        <th>NAME</th>
        <th>UNIT</th>
        <th>UNIT PRICE</th>
        <th>FOOD GROUP</th>
        <th>INVENTORY</th>
        <th>SUPPLIER ID</th>
      </tr>

      <?php
        $i=0;
        while($row = mysqli_fetch_array($result2)) {//fetch all selected data
      ?>

      <tr>
      <td><?php echo $row["ingredientid"]; ?></td>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["unit"]; ?></td>
          <td><?php echo $row["unitprice"]; ?></td>
          <td><?php echo $row["foodgroup"]; ?></td>
          <td><?php echo $row["inventory"]; ?></td>
          <td><?php echo $row["supplierid_fk"]; ?></td>
      </tr>
      
      <?php
        $i++;
        }
      ?>
    </table>
    <?php
    }
    else{//print if there are no data in table
        echo "No result found";
    }


//NUMBER 16
//NUMBER 16 
//NUMBER 16
//SELECT MAX(price) FROM items;
  
    ?>
  </div>
  
</body>
</html>