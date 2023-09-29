<?php
include("partial/header.php");
include("config/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (isset($_POST['submit'])) {
        // Process form submission here
        $newUsername = $_POST['username'];
        $currentPassword = md5($_POST['current_password']);
        $newPassword =md5($_POST['new_password']);
        $confirmPassword = md5($_POST['confirm_password']);

        // Check if the current password matches the stored password
        $sql = "SELECT password FROM admin WHERE id = $id";
        $res = mysqli_query($con, $sql);
        if ($res) {
            $row = mysqli_fetch_assoc($res);
            $storedPassword = $row['password'];
            
            if ($currentPassword === $storedPassword) {
                // Update username and password if new password matches the confirmation
                if ($newPassword === $confirmPassword) {
                    $updateSql = "UPDATE admin SET username = '$newUsername', password = '$newPassword' WHERE id = $id";
                    $updateResult = mysqli_query($con, $updateSql);
                    if ($updateResult) {
                        echo "Admin updated successfully.";
                    } else {
                        echo "Failed to update admin.";
                    }
                } else {
                    echo "New password and confirm password do not match.";
                }
            } else {
                echo "Current password is incorrect.";
            }
        }
    }

    // Fetch admin details for displaying in the form
    $sql = "SELECT * FROM admin WHERE id = $id";
    $res = mysqli_query($con, $sql);
    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);
            $username = $row['username'];
            $password = $row['password'];
        } else {
            header('location: http://localhost/onlineRestorant/admin/manage_admin.php');
            exit();
        }
    }
} else {
    header('location: http://localhost/onlineRestorant/admin/manage_admin.php');
    exit();
}
?>

<!-- Your HTML form here -->
<section class="section-admin_add">
    <h1 class="heading-admin">Update Admin</h1>
    <div class="continer">
        <form class="cta-form" method="POST">
            <!-- Rest of your form elements -->
            <div class="form">
                <label for="full-name">Username:</label>
                <input
                    id="full-name"
                    type="text"
                    name="username"
                    value="<?php echo $username; ?>"
                    required
                />
            </div>
            <div class="form">
                <label for="current_password">Current Password:</label>
                <input
                    id="current_password"
                    type="password"
                    name="current_password"
                    required
                />
            </div>
            <div class="form">
                <label for="new_password">New Password:</label>
                <input
                    id="new_password"
                    type="password"
                    name="new_password"
                    required
                />
            </div>
            <div class="form">
                <label for="confirm_password">Confirm Password:</label>
                <input
                    id="confirm_password"
                    type="password"
                    name="confirm_password"
                    required
                />
            </div>
            <button name="submit" class="btn btn--form">Update Admin</button>
        </form>
    </div>
</section>
