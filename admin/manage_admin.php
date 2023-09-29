<?php include("partial/header.php");?>
<?php include("config/config.php");?>


<div class="heading-primary admin-heading">
    <h1>Manage Admin</h1>
</div>
<?php
 if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);//removing session message
 }


?>

<div class="add_button man-admin">
    <a class="add-link" href="add_admin.php">Add Admin</a>
</div>
<div class="center">
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM admin";
        $result = mysqli_query($con, $query);

        if ($result) {
            while ($row = mysqli_fetch_row($result)) {
                $id = $row[0]; // Use numerical index for ID
                $username = $row[1]; // Use numerical index for username
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$username</td>";
                echo '<td> <a class="adm-btn upd-btn" href="http://localhost/onlineRestorant/admin/update_admin.php?id=' . $id . '">Update Admin</a> </td>';
                echo '<td> <a class="adm-btn del-btn" href="http://localhost/onlineRestorant/admin/delete_admin.php?id=' . $id . '">Delete Admin</a> </td>';
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

</div>
    
    
    ?>
    
         
          

</body>
</html>