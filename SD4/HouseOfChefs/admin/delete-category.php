<?php

include('../config/constants.php');

//Check whether the id and image_name value is set or not 
if (isset($_GET['id']) and isset($_GET['image_name'])) {
    //Get the Value and Delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //Remove the physical image file if available 
    if ($image_name != "") {
        //Image is Available. So remove it
        $path = "../images/category/" . $image_name;

        //REmove the Image
        $remove = unlink($path);

        //IF fail to romeve image then add an error message and stop the process
        if ($remove == false) {

            //set the session message
            $_SESSION['remove'] = "<div class='error'>Failed to Remove Category Image.</div>";
            //redirect to manage category
            header('location:' . SITEURL . 'admin/manage-category.php');
            //stop the process
            die();
        }
    }




    //SQL Query to Delete Data from Database
    $sql = "DELETE FROM table_category WHERE id=$id";

    //Execute the Query
    $result = mysqli_query($connection, $sql);

    //Check whether the data is delete from database or not
    if ($result == true) {
        //SET Success Message and Redirect
        $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully.</div>"; //Redirect to Manage Category
        header('location:' . SITEURL . 'admin/manage-category.php');
    } else {
        //SET Fail Message and Redirecs
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
        //Redirect to Manage Category
        header('location:' . SITEURL . 'admin/manage-category.php');
    }


} else {
    //redirect to Manage Category Page
    header('location:' . SITEURL . 'admin/manage-category.php');

}
?>