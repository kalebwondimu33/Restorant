<?php include("partial/header.php");?>
<?php include("config/config.php");?>
<?php 
   if (isset($_SESSION['upload'])){
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
   }
   if(isset($_SESSION['del'])){
    echo $_SESSION['del'];
    unset($_SESSION['del']);
   }
?>


<div class="heading-primary admin-heading" >
    <h1 >Manage Category</h1>
    </div>
    <div class="add_button">
      <a class="add-link" href="http://localhost/onlineRestorant/admin/add_category.php">Add Category</a>
    </div>
    <div class="table">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Image Name</th>
          <th colspan="2" class="action">Action</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
        $query = "SELECT * FROM catagorylist";
        $result = mysqli_query($con, $query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $id = $row[0]; // Use numerical index for ID
                $title = $row[1]; // Use numerical index for username
                $image_name=$row[2];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$title</td>";
                echo "<td><img  class='img' src='../img/" . $image_name . "' alt='food image'></td>";
                echo '<td> <a class="adm-btn upd-btn" href="http://localhost/onlineRestorant/admin/update_cate.php?id=' . $id . '">Update Category</a> </td>';
                echo '<td> <a class="adm-btn del-btn" href="http://localhost/onlineRestorant/admin/delete_cate.php?id=' . $id . '">Delete Category</a> </td>';
                echo "</tr>";
            }
        }
        ?>



        
        
      </tbody>
    </table>
    </div>