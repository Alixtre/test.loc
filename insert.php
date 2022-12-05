<?php
require_once "config.php";


$allProductsId = $dbConnect->query(
    "SELECT product_id FROM Cart
    INNER JOIN Users
    ON Cart.user_id = Users.user_id
    WHERE user_email = \"" . $_SESSION['user'] . "\""
)->fetchAll(PDO::FETCH_COLUMN);

$UserID = $dbConnect->query(
    "SELECT user_id FROM Users
    WHERE user_email = \"" . $_SESSION['user'] . "\""
)->fetchColumn();

if (!in_array($_POST['product_id'], $allProductsId)) {
    $stmt = $dbConnect->prepare(
        "INSERT INTO Cart 
            (
                product_id,
                user_id,
                quantity,
                order_date
            )
            VALUES 
            (
                :product_id,
                :user_id, 
                :quantity,
                :order_date
            )"
    );
    $stmt->execute(
        [
            "product_id" => $_POST['product_id'],
            "user_id" => $UserID,
            "quantity" => 1,
            "order_date" => date('y-m-d')
        ]
    );
} else {
    $stmt = $dbConnect->prepare(
        "UPDATE Cart 
        SET quantity = quantity + 1
        WHERE user_id = :user_id AND product_id = :product_id"
    );
    $stmt->execute(
        [
            "user_id" => $UserID,
            "product_id" => $_POST['product_id']
        ]
    );
}

header("Location: /productList.php");
die();
