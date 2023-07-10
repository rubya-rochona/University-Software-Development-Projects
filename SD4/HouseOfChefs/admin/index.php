<!-- Menu starts here -->
<?php include('partials/menu.php'); ?>
<!-- Menu ends here -->

<!-- Main Content starts here -->
<div class="main-content">
    <div class="wrapper">
        <h1> Dashboard </h1>

        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Display session message
            unset($_SESSION['login']); //Remove session message
        }
        ?>
        <br><br>

        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">
            <h1>5</h1>
            <br />
            Categories
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content ends here -->

<!-- Footer starts here -->
<?php include('partials/footer.php'); ?>
<!-- Footer starts here -->