<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login.php");
    die();
}
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
    <h2 style="text-align:center; margin:15px 0px 15px 0px">Товары в наличии</h2>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Категория</th>
            <th scope="col">Название</th>
            <th scope="col">Цена</th>
            <th scope="col">Добавить в корзину</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $productData = $dbConnect->query(
            "SELECT * FROM Products
        INNER JOIN Category
        ON Products.category_id = Category.category_id"
        )->fetchAll(PDO::FETCH_ASSOC);
        foreach ($productData as $value) :
            if ($value['product_quantity'] > 0) {
                echo '<tr>';
                echo '<td>' . $value['category_name'] . '</td>';
                echo '<td>' . $value['product_name'] . '</td>';
                echo '<td>' . $value['product_price'] . '</td>';
        ?>
                <td>
                    <form method="post" action="insert.php">
                        <input type="text" name="product_id" value="<?php echo $value['product_id']?>" hidden />
                        <input type="submit" name="submit" value="Добавить" class="btn btn-primary" />
                    </form>
                </td>
        <?php
                echo '</tr>';
            }
        endforeach;
        ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <a href="cart.php">Просмотреть корзину</a>
</div>

</html>