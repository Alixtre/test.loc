<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login.php");
    die();
} else {
    header("Location: /productList.php");
    die();
}