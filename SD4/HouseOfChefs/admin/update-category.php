<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>


        <?php
        //Check whether the id is set or not 
        if (isset($_GET['id'])) {
            //Get the ID and all other details
            $id = $_GET['id'];

            //Create SQL Query to get all other details
            $sql = "SELECT * FROM table_category WHERE id=$id";

            //Execute the Query
            $result = mysqli_query($connection, $sql);

            //Count the Rows to check whether the id is valid or not 
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                //Get all the data
                $row = mysqli_fetch_assoc($result);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

            } else {

                //redirect to manage category with session message
                $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        } else {
            //redirect to Manage CAtegory
            header('location:' . SITEURL . 'admin/manage-category.php');

        }
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if ($current_image != "") {
                            //Display the Image
                            ?>
                            <img src=" <?php echo SITEURL; ?>image/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                        } else {
                            //Display Message
                            echo "<div class='error'>Image not Added.</div>";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" value="">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                            echo "checked";
                        } ?> type="radio" name="featured"
                            value="Yes">Yes
                        <input <?php if ($featured == "No") {
                            echo "checked";
                        } ?> type="radio" name="featured"
                            value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active == "Yes") {
                            echo "checked";
                        } ?> type="radio" name="active" value="Yes">
                        Yes
                        <input <?php if ($active == "No") {
                            echo "checked";
                        } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-primary">
                    </td>
                </tr>

            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            //get all the values from Form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            
            //check whether the image is selected or not
            if(isset($_FILES['image']['name'])){
                //get the image details
                $image_name = $_FILES['image']['name'];

                //check whether the image is available or not
                if($image_name != ""){

                    

                }
                else{
                    $image_name = $current_image;
                }

            }
            else{
                $image_name = $current_image;
            }


            $sql2 = "UPDATE table_category SET
                    title = '$title',
                    featured = '$featured',
                    active = '$active'
                    WHERE id = $id
                    ";

            $result2 = mysqli_query($connection, $sql2);

            if ($result2 == true) {
                $_SESSION['update'] = "<div class = 'success'>Category Update Successfully.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            } else {
                $_SESSION['update'] = "<div class = 'error'>Failed to Category Update Category.</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
            }
        }
        ?>

    </div>
</div>


<?php include('partials/footer.php'); ?>