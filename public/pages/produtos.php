<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <title>Dashboard</title>
</head>
<bod
    <div class="container">
        <!-- BUTÕES -->
        <div class="buttons">
            <button onclick="solicitarNome('Abrir caixa')" class="campo"><img src="../icon/shopping-cart.svg" alt="" srcset="">Abrir caixa</button>
            <button onclick="solicitarNome('Fechar caixa')" class="campo"><img src="../icon/x.svg" alt="" srcset="">Fechar caixa</button>
            <button onclick="information()"class="campo"><img src="../icon/info.svg" alt="" srcset="">Informações</button>
            <button onclick="mesa()" class="campo"><img src="../icon/hexagon.svg" alt="" srcset="">Mesa</button>
            <button onclick="produto()" class="campo"><img src="../icon/shopping-bag.svg" alt="" srcset="">Produtos</button>
            <button  class="campo"><img src="../icon/terminal.svg" alt="" srcset="">Autores</button>
            <button  class="campo"><img src="../icon/headphones.svg" alt="" srcset="">Suporte</button>
        </div>
        <!-- HOME -->
        <img src="../imagem/logo.png" alt="" srcset="" class="imagem-home">
        <p id="usuario">bem vindo sr (a): <?php echo $_SESSION['nome_usuario'];?></p>
    </div>
    <form action="" method="post" id="form-cadastra-produto">
        <p class="text-cadastro">Cadastrar Produto</p>
        <input type="text" name="nome" class="campo" placeholder="Nome Do Produto">
        <input type="number" name="quantidade" class="campo" placeholder="Quantidade do Produto">
        <input type="number" name="valor" class="campo" placeholder="Valor da Unidade">
        <input type="submit" value="Cadastrar" class="button-cadastro">
        <img src="../imagem/otto.png" class="otto" alt="" srcset="">
    </form>
    <script src="../js/script.js"></script>
</body>
</html>
 