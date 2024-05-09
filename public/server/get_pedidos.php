<?php
    // Configuração de conexão com o banco de dados
    $servername = "localhost"; // Nome do servidor MySQL
    $username = "root"; // Nome de usuário do MySQL
    $password = "123*"; // Senha do MySQL
    $dbname = "bar"; // Nome do banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Consulta SQL para obter o dado mais recente da tabela "pedidos"
    $sql = "SELECT * FROM pedidos ORDER BY data_pedido DESC";
    $result = $conn->query($sql);

    // Exibe os dados mais recentes da tabela "pedidos"
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $nome = $row["nome"];
        $descricao = $row["item"];
        $quantidade = $row["quantidade"];
        $mesa = $row["mesa"];
        $data_pedido = $row["data_pedido"];
    } else {
        // Caso não haja dados na tabela
        $id = "";
        $nome = "";
        $descricao = "";
        $quantidade = "";
        $mesa = "";
        $data_pedido = "";
    }

    // Botão para limpar a tabela
    echo '<button onclick="limparTabela()" id="limpar">Limpar Tabela</button>';
    // Botão para atualizar a tabela
    echo '<button onclick="atualizarTabela()" id="atualizar">Atualizar Tabela</button>';
?>
<style>
    #atualizar{
    width: 164px;
    padding: 16px;
    display: flex;
    border-radius: 4px;
    border-style: none;
    outline: none;
    font-family: cursive;
    flex-direction: row;
    flex-wrap: nowrap;
    position: absolute;
    align-content: center;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    margin-bottom: -378px;
    margin-left: 331px;
}
#limpar{
    width: 164px;
    padding: 16px;
    display: flex;
    border-radius: 4px;
    border-style: none;
    outline: none;
    font-family: cursive;
    flex-direction: row;
    flex-wrap: nowrap;
    position: absolute;
    align-content: center;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    margin-bottom: -378px;
    margin-left: 720px;
}
</style>

<!-- Exibição dos dados mais recentes da tabela "pedidos" -->
<table>
    <tr>
        <th>Numero do Pedidos</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Mesa</th>
        <th>Data e Hora</th>
    </tr>
    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $nome; ?></td>
        <td><?php echo $descricao; ?></td>
        <td><?php echo $quantidade; ?></td>
        <td><?php echo $mesa; ?></td>
        <td><?php echo $data_pedido; ?></td>
    </tr>
</table>

<script>
    function limparTabela() {
        // Limpa o conteúdo da tabela
        var table = document.querySelector('table');
        table.innerHTML = '<tr><th>Numero do Pedidos</th><th>Nome</th><th>Descrição</th><th>Quantidade</th><th>Mesa</th><th>Data e Hora</th></tr>';
    }

    function atualizarTabela() {
        // Recarrega a página para exibir o dado mais recente da tabela "pedidos"
        location.reload();
    }
</script>
