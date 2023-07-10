<!-- Menu starts here -->
<?php include('partials/menu.php'); ?>
<!-- Menu ends here -->

<!-- Main Content starts here -->
<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>

        <br><br>

        <?php
        // Get ID from Manage Admin Page
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password:</td>
                    <td><input type="password" name="current_password" placeholder="Current Password"></td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td><input type="password" name="new_password" placeholder="New Password"></td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                </tr>
            </table>

    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    //Get all the value from the FORM to change password
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //check whether the user with current id and current pass exixts or not
    $sql = "SELECT * FROM table_admin WHERE id = $id AND password = '$current_password' ";

    //Execute the query
    $result = mysqli_query($connection, $sql);

    // Check whether the query is executed or not
    if ($result == TRUE) {
        //check whether the data is available or not
        $count = mysqli_num_rows($result);
        //check whether we have admin data or not
        if ($count == 1) {
            //user exist and pass can be change
            //echo "User Found!";

            if ($new_password == $confirm_password) {
                //update password
                $sq2 = "UPDATE table_admin SET password = '$new_password' WHERE id = $id ";
                //Execute the query
                $result = mysqli_query($connection, $sq2);

                // Check whether the query is executed or not
                if ($result == TRUE) {
                    //Redirect to manage admin page with success message
                    $_SESSION['change-pass'] = "<div class = 'success'>Password Changed Successfully! </div>";
                    //Redirect page to Manage Admin
                    header("location:" . SITEURL . 'admin/manage-admin.php');
                }

                else{
                    //Redirect to manage admin page with error message
                    $_SESSION['change-pass'] = "<div class = 'error'>Failed! </div>";
                    //Redirect page to Manage Admin
                    header("location:" . SITEURL . 'admin/manage-admin.php');
                }
            } else {
                //Redirect to manage admin page with error message
                $_SESSION['pass-not-match'] = "<div class = 'error'>Password Not Matched! </div>";
                //Redirect page to Manage Admin
                header("location:" . SITEURL . 'admin/manage-admin.php');
            }

        } else {
            $_SESSION['user-not-found'] = "<div class = 'error'>User Not Found! </div>";
            //Redirect page to Manage Admin
            header("location:" . SITEURL . 'admin/manage-admin.php');

        }
    }

}
?>

<!-- Footer starts here -->
<?php include('partials/footer.php'); ?>
<!-- Footer ends here -->