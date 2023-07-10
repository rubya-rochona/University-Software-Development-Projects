<?php include('partials/menu.php'); ?>

<!--Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>

        <br><br>

        <!--Add Catergory Form Starts-->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                </tr>

            </table>


        </form>
        <!--Add Catergory Form Ends-->

        <?php

        //check wheter the submit button is clicked or not
        if (isset($_POST['submit'])) {

            //Get the value from CAtegory form
            $title = $_POST['title'];

            //for radio input, we need to check whether the button is selected or not
            if (isset($_POST['featured'])) {
                //get the value from form
                $featured = $_POST['featured'];
            } else {
                //set the default value
                $featured = "No";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            //check whether the image is selected or not and set the value for image name accordingly
        
            if (isset($_FILES['image']['name'])) {
                //upload the image
                //to upload image we need image_name, source path and destination path
                $image_name = $_FILES['image']['name'];

                //upload image only if image is selected
                if ($image_name != "") {

                    //auto rename our image
                    //get the extension of image
                    //$ext = end(explode('.', $image_name));
        
                    $tmp = explode('.', $_FILES['image']['name']);
                    $file_ext = strtolower(end($tmp));

                    //rename the image
                    $image_name = "Food_Category_" . rand(000, 999) . '.' . $file_ext; //e.g. Food_Category_625.jpg 
        

                    $source_path = $_FILES['image']['tmp_name'];

                    $destination_path = "../images/category/" . $image_name;

                    //finally uplaoad the image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not
                    //and if not uploaded then we will stop the process and redirect with error message
                    if ($upload == false) {
                        //set message
                        $_SESSION['upload'] = "<div class='error'>Failed to upload Image. </div>";
                        // redirect to Add CAtegory
                        header('location: ' . SITEURL . 'admin/add-category.php');
                        //stop the process
                        die();
                    }
                }
            } else {
                //don't upload the image and set the image_name value as blank
                $image_name = "";
            }

            //2. Create sql Query to insert Category into Database
            $sql = "INSERT INTO table_category SET 
                title='$title',
                image_name='$image_name',
                featured='$featured',
                active='$active'

            ";

            //3. Execute the Query and save in Database
            $result = mysqli_query($connection, $sql);

            //4. Check whether the query executed or not and data added or not
            if ($result == true) {
                //Query Executed and Category Added
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                //Redirect to manage category page
                header('location: ' . SITEURL . 'admin/manage-category.php');

            } else {
                //Failed to Add Category
                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                //Redirect to manage category page
                header('location: ' . SITEURL . 'admin/add-category.php');
            }
        }

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>