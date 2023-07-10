<?php
//authorization
//check whether the user is logged in or not
if (!isset($_SESSION['user'])) { //if not logged in - session not set
    //redirect to Login Page
    $_SESSION['no-login-message'] = "<div class = 'error text center'>Please Login to access Admin Panel!</div>";
    //redirect to Login Page
    header('location:' . SITEURL . 'admin/login.php');
}
?>