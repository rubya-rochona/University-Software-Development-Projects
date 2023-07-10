<?php include('../config/constants.php'); ?>

<html>

<head>
    <title>Login - House Of Chefs </title>
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Display session message
            unset($_SESSION['login']); //Remove session message
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br><br>

        <!-- Login form starts here -->
        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"> <br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"> <br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
        </form>
        <!-- Login form ends here -->

        <p class="text-center">Created By - <a href="www.rubyarochona.com">Rubya Rochona</a> </p>
    </div>

</body>

</html>

<?php
// check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    //login process
    //get data from Login Form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM table_admin WHERE username='$username' AND password='$password' ";

    //execute query
    $result = mysqli_query($connection, $sql);

    //count rows to check whether the user exists or not
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        //user available and login success
        $_SESSION['login'] = "<div class = 'success'>Login Successful!</div>";
        //chech whether the user is logged in or not 
        $_SESSION['user'] = $username;

        //redirect to homepage or dashboard
        header("location:" . SITEURL . 'admin/');
    } else {
        $_SESSION['login'] = "<div class = 'error text-center'>Login Failed!</div>";
        //redirect to homepage or dashboard
        header("location:" . SITEURL . 'admin/login.php');

    }
}
?>