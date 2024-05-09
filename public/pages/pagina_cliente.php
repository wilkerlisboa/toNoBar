<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cliente.css">
    <title>cliente</title>
</head>
<body>
    <!-- BLOCO DE PAGAMENTO E DESCRIÇÕES -->
    <div class="container">
        <img src="../imagem/logo.png" alt="" srcset="" class="logo">
        <div class="pedidos">
            <!-- DESCRIÇÃO DO PEDIDO E PAGAMENTO -->
            <form action="../server/cliente.php" method="post">
                <input type="text" name="name" id="name" placeholder="Nome Completo">
                <input type="number" name="mesa" id="mesa" placeholder="Numero da Mesa">
                <!-- TABELA QUE DESCREVE OQUE TA SENDO PEDIDO -->
                <table id = "tabela-itens" name="table">
                    <tr>
                        <th>Item</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </table>
                <!-- CALCULO DO TOTAL -->
                <div class="total-produto">
                    <p id="total">Total: R$ 0.00</p>
                </div>
                <!-- BOTÕES DE COMPRA E CANCELAR -->
                <a href="#" id="cancelar" onclick="window.location.reload(); return false;">Cancelar</a>
                <input type="submit" value="Comprar" id="comprar">
             </form>
        </div>
        <!-- CARDAPIO -->
        <section>
            <!-- ITENS -->
            <div class="block">
                <!-- COCA COLA -->
                <img src="../imagem/cocacola.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Coca Cola</p>
                <p class="preco-produto">3.00</p>
                <p class="descricao">Coca-Cola de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- HAMBURGUER -->
            <div class="block">
                <img src="../imagem/hamburguer.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Hamburguer</p>
                <p class="preco-produto">8.00</p>
                <p class="descricao">Hamburgue de bacon</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- PIZZA -->
            <div class="block">
                <img src="../imagem/pizza.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Pizza</p>
                <p class="preco-produto">20.00</p>
                <p class="descricao">Italiana com Muçarela</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- GUARANA -->
            <div class="block">
                <img src="../imagem/guarana.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Guarana</p>
                <p class="preco-produto">3.00</p>
                <p class="descricao">Guarana de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- PEPSI -->
            <div class="block">
                <img src="../imagem/pepsi.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Pepsi</p>
                <p class="preco-produto">3.00</p>
                <p class="descricao">Pepsi de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- NACHOS -->
            <div class="block">
                <img src="../imagem/nachos.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Nachos</p>
                <p class="preco-produto">5.00</p>
                <p class="descricao">Nachos com muito Queijo</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- SKOL -->
            <div class="block">
                <img src="../imagem/skol.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Skol</p>
                <p class="preco-produto">5.00</p>
                <p class="descricao">Skol Pilsen de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- MISTOR -->
            <div class="block">
                <img src="../imagem/mistor.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Mistor</p>
                <p class="preco-produto">10.00</p>
                <p class="descricao">Misto de queijo com pimenta</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- VINHO -->
            <div class="block">
                <img src="../imagem/vinho.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Vinho</p>
                <p class="preco-produto">20.00</p>
                <p class="descricao">Vinho tinto de 1,5 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- MOJITO -->
            <div class="block">
                <img src="../imagem/mojito.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Mojito</p>
                <p class="preco-produto">8.00</p>
                <p class="descricao">Mojito de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- MARTIN -->
            <div class="block">
                <img src="../imagem/martin.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Martin</p>
                <p class="preco-produto">12.00</p>
                <p class="descricao">Martin seco 120 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- GIN -->
            <div class="block">
                <img src="../imagem/gin.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Gin</p>
                <p class="preco-produto">15.00</p>
                <p class="descricao">Gin de 300 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- FRANGO -->
            <div class="block">
                <img src="../imagem/frango-a-passarinho.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Frango</p>
                <p class="preco-produto">15.00</p>
                <p class="descricao">Porção de frango empanado</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- CAIPIRINHA -->
            <div class="block">
                <img src="../imagem/caipirinha.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Caipirinha</p>
                <p class="preco-produto">10.00</p>
                <p class="descricao">Caipirinha de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- BATATA FRITA -->
            <div class="block">
                <img src="../imagem/babata-frita.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Batata Frita</p>
                <p class="preco-produto">8.00</p>
                <p class="descricao">com queijo e pimenta</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
            <!-- AGUA -->
            <div class="block">
                <img src="../imagem/agua.png" alt="Imagem 1" class="imagem-cardapio">
                <p class="name-produto">Água Mineral</p>
                <p class="preco-produto">3.00</p>
                <p class="descricao">Àgua de 350 ML</p>
                <input type="button" value="Realizar Compra" onclick="adicionarItem(this)" class="button-cardapio">
            </div>
        </section>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>