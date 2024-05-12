<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/media.css">
    <link rel="stylesheet" href="./cliente.css">
    <link rel="stylesheet" href="./reservaVaga.css">
    <title>Reserve Sua Vaga</title>
</head>
<body>
    <header class="nav-bar">

        <nav class="nav-bar__menu">
            <img src="../componentes/images/menu-icone-cliente.png" alt="Ícone de menu do cliente">
        </nav>

        <div class="nav-bar__titulo"> 
            <h1>Parking Club Client</h1>
        </div>

        <div class="nav-bar__usuario">
            <img src="../componentes/images/user-icon-cliente.png" alt="ícone de usuário do cliente">
            <?php
            // Capturar o email passado como parâmetro GET
            if (isset($_GET['email'])) {
                $email = $_GET['email'];
                echo "<p>$email</p>";
            } else {
                // Se o email não foi passado, exibir uma mensagem padrão
                echo "<p>Email não encontrado</p>";
            }
            ?> 
        </div>
    </header>

    <main class="container-principal-cliente">
        <div class="container-principal-cliente__fundo-cards">
            <form action="reserva_vaga.php" method="post">
                <fieldset  class="formulario-reserva">
                    <legend><b>Reserve sua Vaga</b></legend>                    

                    <div class="inputBox">
                        <input type="number" name="cpf" id="cpf" class="inputUser" required>
                        <label for="cpf" class="labelInput">CPF</label>
                    </div>

                    <div class="inputBox">
                        <input type="text" name="placa" id="placa" class="inputUser" required>
                        <label for="placa" class="labelInput">Placa do Veículo</label>
                    </div>

                    <div class="inputBox">
                        <input type="datetime-local" name="data-hora" id="data-hora" class="inputUser" required style="text-align: center;">
                        <label for="data-hora" class="labelInput"></label>
                    </div>
                    
                    <input type="submit" id="submit" value="Enviar">
                </fieldset>
            </form>

            <section>
            <h2 class="title">Entenda:</h2>
            <details>
                <summary>CPF - Por que precisamos?</summary>
                <p> O CPF é necessário para liberar a catraca como comprovante de reserva de vaga. </p>
            </details>

            <details>
                <summary>Placa - Por que precisamos?</summary>
                <p>
                    A placa do veículo é crucial para evitar fraudes e permitir acesso seguro às vagas reservadas, também servindo como comprovante de reserva.              
                </p>
            </details>

            <details>
                <summary>Data e Hora - Por que precisamos?</summary>
                <p>
                    A captura da data e hora é crucial para organizar o fluxo de veículos no estacionamento, analisar a ocupação e garantir a segurança, identificando padrões de uso.
                </p>
            </details>
        </section>
        </div>
    </main>
</body>
</html>