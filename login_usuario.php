<?php
// login_usuario.php

// Verifica se os campos foram submetidos via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    // Conectar ao banco de dados 
    $dsn = "mysql:host=localhost;dbname=parkingClub";
    $username = "root";
    $password = "aluno";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para buscar o usuário pelo CPF
        $sql = "SELECT * FROM Usuarios WHERE cpf = :cpf";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();

        // Verifica se o usuário foi encontrado
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica a senha
            // LEMBRAR DE IMPLEMENTAR: SE TIPO DE USER FOR CLIENTE COMUM, VAI PRA UMA PÁGINA, SE FOR CLIENTE FUNCIONÁRIO, VAI PRA OUTRA PÁGINA
            if ($senha === $usuario['senha']) {
                // Senha correta - fazer login
                echo "<script>alert('Usuário autenticado com sucesso!');</script>";
                echo('<meta http-equiv="refresh" content="0;url=cadastroUsuario.html">');
                // Aqui você pode redirecionar o usuário para uma página protegida.
            } else {
                // Senha incorreta
                echo "<script>alert('Senha incorreta. Tente novamente!');</script>";
                echo('<meta http-equiv="refresh" content="0;url=index.html">');
            }
        } else {
            echo "<script>alert('Usuário não encontrado!');</script>";
            echo('<meta http-equiv="refresh" content="0;url=index.html">');
        }

    } catch (PDOException $e) {
        die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
}
?>
