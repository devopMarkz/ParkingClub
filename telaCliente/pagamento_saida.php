<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "aluno";
$dbname = "parkingClub";

// Estabelecer conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Capturar dados do formulário
$placa = $_POST["placa"];
$dataSaida = $_POST["data-hora"];

// Formatando a data de saída no formato correto (YYYY-MM-DD HH:MM:SS)
$dataSaidaFormatada = date('Y-m-d H:i:s', strtotime($dataSaida));

// Buscar registro no Estacionamento
$sql = "SELECT * FROM Estacionamento WHERE carro_id IN (SELECT carro_id FROM Carros WHERE placa = ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $placa);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dataEntrada = $row["data_entrada"];
    $carroId = $row["carro_id"];
    $usuarioId = $row["usuario_id"];

    // Calcular tempo de permanência em horas
    $entrada = new DateTime($dataEntrada);
    $saida = new DateTime($dataSaidaFormatada);
    $interval = $entrada->diff($saida);
    $tempoPermanenciaHoras = $interval->h + ($interval->days * 24);

    // Calcular valor a pagar conforme a lógica
    $valorBase = 3; // Valor base para os primeiros 15 minutos
    $adicional = max(0, $tempoPermanenciaHoras - 1); // Horas adicionais após a primeira hora
    $valorPago = $valorBase + $adicional;

    // Inserir registro na tabela RegistroEntradaSaida
    $insertSql = "INSERT INTO RegistroEntradaSaida (carro_id, usuario_id, data_entrada, data_saida, valor_pago) VALUES (?, ?, ?, ?, ?)";
    $stmtInsert = $conn->prepare($insertSql);
    $stmtInsert->bind_param("iissd", $carroId, $usuarioId, $dataEntrada, $dataSaidaFormatada, $valorPago);
    $stmtInsert->execute();

    // Excluir registro da tabela Estacionamento
    $deleteSql = "DELETE FROM Estacionamento WHERE carro_id = ?";
    $stmtDelete = $conn->prepare($deleteSql);
    $stmtDelete->bind_param("i", $carroId);
    $stmtDelete->execute();

    // Buscar o e-mail do usuário na tabela Usuarios
    $email = "";
    $userSql = "SELECT email FROM Usuarios WHERE usuario_id = ?";
    $stmtUser = $conn->prepare($userSql);
    $stmtUser->bind_param("i", $usuarioId);
    $stmtUser->execute();
    $resultUser = $stmtUser->get_result();

    if ($resultUser->num_rows > 0) {
        $userRow = $resultUser->fetch_assoc();
        $email = $userRow["email"];
    }

    // Redirecionar para a página pagarSaida.php com os parâmetros na URL
    $redirectUrl = "http://parkingclub.com.br/telaCliente/pagarSaida.php?email=" . urlencode($email) . "&valorPago=" . urlencode($valorPago);
    header("Location: " . $redirectUrl);
    exit();
} else {
    echo "<script>alert('Veículo não encontrado no estacionamento.');</script>";
}

// Fechar conexões
$stmt->close();
$stmtInsert->close();
$stmtDelete->close();
$stmtUser->close();
$conn->close();
?>
