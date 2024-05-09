<?php
    //INICIAR A SEÇÃO
    session_start();
    
    //CONECTAR AO BANCO DE DADOS
    $conn = new mysqli("localhost", "root", "123*", "bar");
   
    //VERIFICA A CONEXÃO
    if($conn ->connect_error){
        die("FALHA NA CONEXÃO: ". $conn->connect_error);
    }

    //OBTER DADOS DO FORMULARIO
    $email = $_POST ['email'];
    $senha = $_POST ['senha'];

    //CONSULTA SQL PARA VERIFICAR SE O USÚARIO EXISTE
    $sql = "SELECT *FROM funcionarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        // USÚARIO AUTENTICADO COM SUCESSO, OBTER O NOME DO USUARIO
        $row = $result->fetch_assoc();
        $nome_usuario = $row['nome'];

        // ARMAZENA O NOME DE USÚARIO NA VARIAVEL DE SESÃO
        $_SESSION['nome_usuario'] = $nome_usuario;

        // REDIRECIONAR PARA A PAGINA DE SUCESSO
        header("Location: ../pages/dashboard.php");
        exit();
    }else{
        // FALHA NA AUTENTICAÇÃO
        echo "EMAIL OU SENHA INCORRETOS.";
    }

    $conn ->close()
?>