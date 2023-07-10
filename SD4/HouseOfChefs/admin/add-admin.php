<!-- Menu starts here -->
<?php include('partials/menu.php'); ?>
<!-- Menu ends here -->

<!-- Main Content starts here -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br> <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];      //Display session message
            unset($_SESSION['add']);    //Remove session message
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                </tr>
            </table>
    </div>
</div>
<!-- Main Content ends here -->

<!-- Footer starts here -->
<?php include('partials/footer.php'); ?>
<!-- Footer ends here -->

<?php
// Process the value from Form and save it to Database

if (isset($_POST['submit'])) {
    // Get the data from Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encrypted with md5

    //SQL query to save the data into database
    $sql = "INSERT INTO table_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
            ";

    // Execute query and save data in database
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));


    // Check whether the query is executed or not and display message
    if ($result == TRUE) {
        //echo "Data Inserted";

        //Session variable to display message
        $_SESSION["add"] = "<div class = 'success'>Admin Added Successfully!</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        //echo "Failed";

        //Session variable to display message
        $_SESSION["add"] = "<div class = 'error'>Failed!</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}

?>