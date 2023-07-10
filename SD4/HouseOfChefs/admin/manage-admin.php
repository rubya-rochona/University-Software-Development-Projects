<!-- Menu starts here -->
<?php include('partials/menu.php'); ?>
<!-- Menu ends here -->

<!-- Main Content starts here -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br> <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Display session message
            unset($_SESSION['add']); //Remove session message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; //Display session message
            unset($_SESSION['delete']); //Remove session message
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; //Display session message
            unset($_SESSION['update']); //Remove session message
        }

        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found']; //Display session message
            unset($_SESSION['user-not-found']); //Remove session message
        }

        if (isset($_SESSION['change-pass'])) {
            echo $_SESSION['change-pass']; //Display session message
            unset($_SESSION['change-pass']); //Remove session message
        }

        ?>
        <br> <br> <br>

        <!-- Button to add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br> <br> <br>

        <table class="tbl-full">
            <tr>
                <th>Serial No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            //Get all admins
            $sql = "SELECT * FROM table_admin";
            //executing query
            $result = mysqli_query($connection, $sql);
            //CHeck whether the Query is Executed of Not
            if ($result == TRUE) {
                //Count Rows to CHeck whether we have data in database or not
                $count = mysqli_num_rows($result); // Function to get all the rows in database
            
                $serial_no = 1;

                //check the number of rowa
                if ($count > 0) {
                    //we have data in database
                    while ($rows = mysqli_fetch_assoc($result)) {
                        //using while loop to get all the data from database
                        //loop will run as long as we have data in database
            
                        // get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //display the values in table
                        ?>
                        <tr>
                            <td>
                                <?php echo $serial_no++; ?>
                            </td>
                            <td>
                                <?php echo $full_name; ?>
                            </td>
                            <td>
                                <?php echo $username; ?>
                            </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"
                                    class="btn-secondary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"
                                    class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"
                                    class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
                        <?php

                    }
                } else {
                    //we dont have data in database
                }
            }
            ?>

        </table>
    </div>
</div>
<!-- Main Content ends here -->

<!-- Footer starts here -->
<?php include('partials/footer.php'); ?>
<!-- Footer ends here -->