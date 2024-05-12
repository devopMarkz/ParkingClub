<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/media.css">
    <link rel="stylesheet" href="./cliente.css">
    <link rel="stylesheet" href="./reservaVaga.css">
    <title>Efetue seu Pagamento!</title>
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
            <div class="pagamento">
                <img src="../componentes/images/tarefa-concluida.png" alt="Ícone de confirmação" style="width: 80px; height: 80px; margin-left: 140px;">
                <h2> Dados enviados com sucesso. <br><br> Continue com o pagamento <br> para concluir sua reserva! </h2> <br> <br>

                <h2 style="text-align: center;">
                <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                data-preference-id="154120817-03e00335-c04e-4c70-828b-2db616675049" data-source="button">
                </script>
                </h2>
                
            </div>

            
        </div>
    </main>

</body>
</html>