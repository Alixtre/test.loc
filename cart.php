<?php
require "config.php";

if (empty($_SESSION['products'])) {
    header("Location: /index.php");
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

<table class="table">
    <thead>
        <tr>
            <th scope="col">Имя</th>
            <th scope="col">Цена</th>
            <th scope="col">Количество</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($_SESSION['products'] as $value) :
            echo '<tr>';
            echo '<td>' . $value[0] . '</td>';
            echo '<td>' . $value[1] . '</td>';
            echo '<td>' . $value[2] . '</td>';
            echo '</tr>';
        endforeach;
        ?>
    </tbody>
</table>

</html>