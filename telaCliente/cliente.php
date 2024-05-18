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
            <details>
                    <summary style="list-style: none; position: fixed; top: 30px; cursor: pointer;"><img src="../componentes/images/menu-icone-cliente.svg" alt="Ícone de menu do cliente"></summary>
                    <p style="position: relative; top: 40px"> 
                    <?php
                    // Captura o email passado como parâmetro GET na página de login e manda para a página de cliente.php
                    if (isset($_GET['email'])) {
                        $email = $_GET['email'];
                        echo "<a href='http://parkingclub.com.br/telaCliente/cliente.php?email=$email' style='text-decoration: none; color: white;'>Menu</a>";
                    }
                    ?>
                    </p>
                    <p style="position: relative; top: 45px"> 
                    <?php
                    // Captura o email passado como parâmetro GET na página de login e manda para a página de reservaVaga.php
                    if (isset($_GET['email'])) {
                        $email = $_GET['email'];
                        echo "<a href='http://parkingclub.com.br/telaCliente/reservaVaga.php?email=$email' style='text-decoration: none; color: white;'>Reserva</a>";
                    }
                    ?>
                    </p>
            </details>
        </nav>

        <div class="nav-bar__titulo"> 
            <h1>Parking Club Client</h1>
        </div>

        <div class="nav-bar__usuario">
            <img src="../componentes/images/user-icon-cliente.png" alt="" srcset="">
            <?php
            // Captura o email passado como parâmetro GET na página de login
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
                <?php
                // Captura o email passado como parâmetro GET na página de login e manda para a página de reservaVaga.php
                if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                    echo "<a href='http://parkingclub.com.br/telaCliente/reservaVaga.php?email=$email' class='container-principal-cliente__fundo-cards__card'>";
                }
                ?>
                    <img src="../componentes/images/reservar-vaga_icon.png" alt="" srcset="" style="width: 80px; height: 80px"> 
                    <p> RESERVA DE VAGA </p>
                </a>
                <?php
                // Captura o email passado como parâmetro GET na página de login e manda para a página de reservaVaga.php
                if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                    echo "<a href='http://parkingclub.com.br/telaCliente/pagarSaida.php?email=$email' class='container-principal-cliente__fundo-cards__card'>";
                }
                ?>
                    <img src="../componentes/images/pagamento_icon.png" alt="" srcset="" style="width: 80px; height: 80px">
                    <p> PAGAR SAÍDA </p>
                </a>
                <?php
                // Captura o email passado como parâmetro GET na página de login e manda para a página de reservaVaga.php
                if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                    echo "<a href='http://parkingclub.com.br/telaCliente/suporte.php?email=$email' class='container-principal-cliente__fundo-cards__card'>";
                }
                ?>
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