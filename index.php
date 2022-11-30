<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    if (!empty($_COOKIE['user'])) {
        $temp = explode(":", $_COOKIE['user']);
        if (hash_equals($temp[1], crypt($temp[0], USER_SALT))) {
            $_SESSION['user'] = $temp[0];
        } else {
            header("Location: /login.php");
            die();
        }
    } else {
        header("Location: /login.php");
        die();
    }
}
echo "Welcome, " . $_SESSION['user'];