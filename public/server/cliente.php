<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos obrigatórios foram preenchidos
    if (!empty($_POST['name']) && !empty($_POST['mesa']) && !empty($_POST['itens']) && !empty($_POST['quantidades']) && !empty($_POST['precos'])) {
        // Conectar ao banco de dados (substitua as informações com as suas)
        $servername = "localhost";
        $username = "root";
        $password = "123*";
        $dbname = "bar";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Recupera os valores do formulário
        $nome = $_POST['name'];
        $mesa = $_POST['mesa'];
        $itens = $_POST['itens'];
        $quantidades = $_POST['quantidades'];
        $precos = $_POST['precos'];

        // Calcula o total
        $total = 0;
        for ($i = 0; $i < count($itens); $i++) {
            $subtotal = $quantidades[$i] * $precos[$i]; // Subtotal do item
            $total += $subtotal; // Soma ao total
        }

        // Obtém a data e hora atuais
        $data_hora = date('Y-m-d H:i:s');

        // Insere os dados na tabela do banco de dados
        $sql = "INSERT INTO pedidos (nome, mesa, total, data_pedido) VALUES ('$nome', '$mesa', '$total', '$data_hora')";
        
        if ($conn->query($sql) === TRUE) {
            // Obtém o ID do pedido inserido
            $pedido_id = $conn->insert_id;
            
            // Insere os itens do pedido na tabela de itens
            for ($i = 0; $i < count($itens); $i++) {
                $item = $itens[$i];
                $quantidade = $quantidades[$i];
                $preco = $precos[$i];
                $sql_item = "INSERT INTO itens_pedido (pedido_id, item, quantidade, preco) VALUES ('$pedido_id', '$item', '$quantidade', '$preco')";
                $conn->query($sql_item);
            }
            
            echo "Pedido enviado com sucesso!";
        } else {
            echo "Erro ao enviar o pedido: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Erro: Preencha todos os campos obrigatórios.";
    }
}
?>
