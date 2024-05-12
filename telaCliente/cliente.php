<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/media.css">
    <link rel="stylesheet" href="./cliente.css">
    <title>Cliente</title>
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
            <img src="../componentes/images/user-icon-cliente.png" alt="" srcset="">
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
                <a href="#" class="container-principal-cliente__fundo-cards__card">
                    <img src="../componentes/images/reservar-vaga_icon.png" alt="" srcset="" style="width: 80px; height: 80px"> 
                    <p> RESERVA DE VAGA </p>
                </a>
                <a href="#" class="container-principal-cliente__fundo-cards__card">
                    <img src="../componentes/images/como-usar_icon.png" alt="" srcset="" style="width: 80px; height: 80px">
                    <p> COMO USAR </p>
                </a>
                <a href="#" class="container-principal-cliente__fundo-cards__card">
                    <img src="../componentes/images/suporte_icon.png" alt="" srcset="" style="width: 80px; height: 80px">
                    <p> SUPORTE </p>
                </a>
                <a href="#" class="container-principal-cliente__fundo-cards__card">
                    <img src="../componentes/images/config_icon.png" alt="" srcset="" style="width: 80px; height: 80px">
                    <p> CONFIGURAÇÕES </p>
                </a>
            </div>
    </main>
</body>
</html>