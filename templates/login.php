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
                        <h2 style="text-align:center; margin:15px 0px 15px 0px">Вход</h2>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email адрес</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required=required />
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Пароль</label>
                        <input type="password" id="password" name="password" class="form-control" required=required />
                    </div>

                    <div class="d-grid gap">
                        <input type="submit" value="Подтвердить" class="btn btn-outline-dark" />
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <p>Еще нет аккаунта? <a href="register.php">Зарегистрироватся</a>.</p>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>