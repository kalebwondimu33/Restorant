<?php include("partial/header.php");?>
<?php include("config/config.php");?>
<?php 
   if (isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
   }
   if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
   }
   if(isset($_SESSION['del'])){
    echo $_SESSION['del'];
    unset($_SESSION['del']);
   }
   if(isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
   }
 ?>
<div class="heading-primary admin-heading" >
    <h1 >Manage product</h1>
    </div>
    <div class="add_button">
      <a class="add-link" href="http://localhost/onlineRestorant/admin/add_product.php">Add Product</a>
    </div>
    <div class="table">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>price</th>
          <th>image</th>
          <th colspan="2" class="action">Action</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
        $query = "SELECT * FROM menu";
        $result = mysqli_query($con, $query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $id = $row[0]; // Use numerical index for ID
                $title = $row[1]; // Use numerical index for username
                $price=$row[3];
                $image_name=$row[5];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$title</td>";
                echo "<td>$price</td>";
                echo "<td><img  class='img' src='../img/" . $image_name . "' alt='food image'></td>";
                echo '<td> <a class="adm-btn upd-btn" href="http://localhost/onlineRestorant/admin/update_pro.php?id=' . $id . '">Update product</a> </td>';
                echo '<td> <a class="adm-btn del-btn" href="http://localhost/onlineRestorant/admin/delete_pro.php?id=' . $id . '">Delete product</a> </td>';
                echo "</tr>";
            }
        }
        ?>



        
        
      </tbody>
    </table>
    </div>