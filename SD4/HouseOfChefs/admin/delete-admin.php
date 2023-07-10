<?php

    include('../config/constants.php');

    //get the id of the admin to be deleted
    $id = $_GET['id'];

    //sql query to delete admin
    $sql = "DELETE FROM table_admin WHERE id = $id";

    //Execute the query
    $result = mysqli_query($connection, $sql);

    // Check whether the query is executed or not and display message
    if ($result == TRUE) {
        //echo "Data Inserted";

        //Session variable to display message
        $_SESSION["delete"] = "<div class = 'success'>Admin Deleted Successfully!</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
    } else {
        //echo "Failed";

        //Session variable to display message
        $_SESSION["delete"] = "<div class = 'error'>Failed!</div>";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }

?>