<!-- Menu starts here -->
<?php include('partials/menu.php'); ?>
<!-- Menu ends here -->

<!-- Main Content starts here -->
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br> <br>

        <?php
        //get the id of the admin to be updated
        $id = $_GET['id'];

        //sql query to update admin
        $sql = "SELECT * FROM table_admin WHERE id = $id";

        //Execute the query
        $result = mysqli_query($connection, $sql);

        // Check whether the query is executed or not
        if ($result == TRUE) {
            //check whether the data is available or not
            $count = mysqli_num_rows($result);
            //check whether we have admin data or not
            if ($count == 1) {
                $row = mysqli_fetch_assoc($result);

                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                header("location:" . SITEURL . 'admin/manage-admin.php');
            }
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name = "id" value = "<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-primary">
                </tr>
            </table>
    </div>
</div>
<!-- Main Content ends here -->

<?php

if(isset($_POST['submit']))
{
    //Get all the value from the FORM to update
    echo $id = $_POST['id'];
    echo $full_name = $_POST['full_name'];
    echo $username = $_POST['username'];

    //sql query to update admin
    $sql = "UPDATE table_admin SET full_name = '$full_name', username = '$username' WHERE id = '$id' ";

    //Execute the query
    $result = mysqli_query($connection, $sql);

    // Check whether the query is executed or not and display message
    if ($result == TRUE) {
        //echo "Data Inserted";

        //Session variable to display message
        $_SESSION["update"] = "<div class = 'success'>Admin Updated Successfully!</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        //echo "Failed";

        //Session variable to display message
        $_SESSION["update"] = "<div class = 'error'>Failed!</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}

?>

<!-- Footer starts here -->
<?php include('partials/footer.php'); ?>
<!-- Footer ends here -->