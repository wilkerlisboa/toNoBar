<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login Funcionarios</title>
    
</head>
<body>
    <div class="container-page-login">
        <div class="block">
        <div class="icon-profile"></div>
        <p>Funcionarios</p>
        <form action="../server/processa_login.php" method="post">
            <input type="email" name="email" id="campo" placeholder = "e-mail">
            <input type="password" name="senha" id="campo" placeholder = "senha">
            <input type="submit" value="Entrar" class="butao">
        </form>
        </div>
    </div>
</body>
</html>