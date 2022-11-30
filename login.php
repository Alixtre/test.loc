<?php
require_once "config.php";

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    if ($_POST['email'] === USER_EMAIL && $_POST['password'] === USER_PASS) {
        $_SESSION['user'] = $_POST['email'];
        if (!empty($_POST['remember'])) {
            setcookie("user", $_POST['email'] . ":" . crypt($_SESSION['user'], USER_SALT), time() + 3600 * 24);
        }
        header("Location: /index.php");
        die();
    }
}

require_once "loginform.php";
