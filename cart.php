<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login.php");
    die();
}
$stmt = $dbConnect->prepare(
    "SELECT * FROM Cart
INNER JOIN Products
ON Cart.product_id = Products.product_id
INNER JOIN Category
ON Products.category_id = Category.category_id
INNER JOIN Users
ON Cart.user_id = Users.user_id
WHERE user_email = :email"
);
$stmt->execute(
    [
        "email" => $_SESSION['user']
    ]
);
$productData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Form</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<div>
    <h2 style="text-align:center; margin:15px 0px 15px 0px">Корзина</h2>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Категория</th>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($productData as $value) :
            if ($value['product_quantity'] > 0) {
                echo '<tr>';
                echo '<td>' . $value['category_name'] . '</td>';
                echo '<td>' . $value['product_name'] . '</td>';
                echo '<td>' . $value['product_price'] . '</td>';
                echo '<td>' . $value['quantity'] . '</td>';
                echo '</tr>';
            }
        endforeach;
        ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <a href="productList.php">Вернутся к выбору товаров</a>
</div>

</html>