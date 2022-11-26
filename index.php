<?php
require "config.php";

$file = fopen(FILES_PATH . "products.txt", "r");
while (!feof($file)) {
    $products[] = explode(' ', fgets($file));
};

if (!empty($_POST)) {
    $_SESSION['products'] = [];
    foreach ($_POST['products'] as $value) {
        array_push($_SESSION['products'], explode('|', $value));
    }
}
if (!empty($_SESSION['products'])) {
    header("Location: /cart.php");
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

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="" method="post">
                    <div>
                        <h2 style="text-align:center; margin:15px 0px 15px 0px">Выбор товаров</h2>
                    </div>

                    <div class="form-group mb-3">
                        <label for="products[]">Выберите продукты</label>
                        <select class="form-select" name="products[]" id="products" multiple required>
                            <?php
                            foreach ($products as $value) :
                                echo '<option value=' . $value[0] . '|' . $value[1] . '|' . $value[2] . '>' . $value[0] . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="d-grid gap">
                        <input type="submit" value="Заказать" class="btn btn-outline-dark" />
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>