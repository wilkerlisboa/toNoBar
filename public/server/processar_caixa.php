<?php
date_default_timezone_set('America/Sao_Paulo');

// Verificar se a ação e o nome do funcionário foram passados via POST
if (isset($_POST['acao']) && isset($_POST['nome'])) {
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "123*";
    $dbname = "bar";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Capturar dados da requisição
    $acao = $_POST['acao'];
    $nome = $_POST['nome'];
    $data_hora = date('Y-m-d H:i:s'); // Capturar data e hora atual

    // Executar ação com base no valor do parâmetro 'acao'
    if ($acao == 'Abrir caixa') {
        // Inserir dados na tabela 'caixa'
        $sql = "INSERT INTO caixa (nome, data_abertura) VALUES ('$nome', '$data_hora')";
        if ($conn->query($sql) === TRUE) {
            // Redirecionar para a página de sucesso
            header('Location: ../pages/dashboard.php');
            exit;
        }
    } elseif ($acao == 'Fechar caixa') {
        // Atualizar data_fechamento na última linha da tabela 'caixa'
        $sql = "UPDATE caixa SET data_fechamento = '$data_hora' ORDER BY id DESC LIMIT 1";
        if ($conn->query($sql) === TRUE) {
            // Redirecionar para a página de sucesso
            header('Location: ../pages/dashboard.php');
            exit;
        }
    }

    // Fechar conexão com o banco de dados
    $conn->close();
} else {
    echo "Ação ou nome do funcionário não especificados!";
}
?>
