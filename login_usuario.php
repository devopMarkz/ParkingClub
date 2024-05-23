<?php
// login_usuario.php

// Verifica se os campos foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $email = $_POST["email"]; // Captura o email do formulário
    $senha = $_POST["senha"]; // Captura a senha do formulário

    // Conectar ao banco de dados 
    $servername = "localhost";
    $username = "root";
    $password = "aluno";
    $dbname = "parkingClub";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar a conexão
    if ($conn->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
    }

    // Consulta para buscar o usuário pelo email
    $sql = "SELECT * FROM Usuarios WHERE email = ?"; // A consulta SQL é definida
    $stmt = $conn->prepare($sql); // Preparação da consulta
    $stmt->bind_param("s", $email); // liga o parâmetro $email ao placeholder ? na consulta SQL ^
    $stmt->execute(); // A declaração SQL preparada é executada no banco de dados.
    $result = $stmt->get_result(); // Armazena as linhas obtidas da consulta

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc(); // Se o usuário foi encontrado, extraímos os dados dele usando fetch_assoc(), que retorna uma array associativa com os dados do usuário.

        // Verifica a senha
        // LEMBRAR DE IMPLEMENTAR: SE TIPO DE USER FOR CLIENTE COMUM, VAI PRA UMA PÁGINA, SE FOR CLIENTE FUNCIONÁRIO, VAI PRA OUTRA PÁGINA
        if ($senha === $usuario['senha']) {
            session_start();
            $_SESSION['email'] = $email;
            // Senha correta - fazer login
            echo "<script>alert('Usuário autenticado com sucesso!');</script>";
            header("Location: http://parkingclub.com.br/telaCliente/cliente.php");
            // echo('<meta http-equiv="refresh" content="0;url=http://parkingclub.com.br/telaCliente/cliente.php">');
            // Aqui você pode redirecionar o usuário para uma página protegida.
        } else {
            // Senha incorreta
            echo "<script>alert('Senha incorreta. Tente novamente!');</script>";
            echo('<meta http-equiv="refresh" content="0;url=index.html">');
        }
    } else {
        // Usuário não encontrado
        echo "<script>alert('Usuário não encontrado!');</script>";
        echo('<meta http-equiv="refresh" content="0;url=index.html">');
    }

    // Fechar conexão
    $stmt->close();
    $conn->close();
}
?>
