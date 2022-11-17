<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="" method="post">
                    <div>
                        <h2 style="text-align:center; margin:15px 0px 15px 0px">Авторизация</h2>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Логин</span>
                        <input type="text" id="login" name="login" class="form-control" required=required />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Пароль</span>
                        <input type="password" id="password" name="password" class="form-control" required=required />
                    </div>
                    <div class="d-grid gap">
                        <input type="submit" value="Войти" class="btn btn-outline-dark" />
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>

<?php
if (!empty($_POST)) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    define("ROOT_PATH", dirname(__FILE__));
    $file = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "Files" . DIRECTORY_SEPARATOR . "loginsFile.txt", "r");
    while (!feof($file)) {
        $logins[] = explode(' ', fgets($file));
    };
    fclose($file);
    foreach ($logins as $value) {
        if ((trim($login) == trim($value[0])) && (trim($password) == trim($value[1]))) {
            echo $login;

            if (file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . "Files" . DIRECTORY_SEPARATOR . trim($login) . ".txt")) {
                $file = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "Files" . DIRECTORY_SEPARATOR . trim($login) . ".txt", "r+");
                $tmpval = fgets($file);
                $tmpval++;
                rewind($file);
                fputs($file, $tmpval);
            } else {
                $file = fopen(ROOT_PATH . DIRECTORY_SEPARATOR . "Files" . DIRECTORY_SEPARATOR . trim($login) . ".txt", "w+");
                fputs($file, "1");
            }
            break;
        }
    }
}
?>