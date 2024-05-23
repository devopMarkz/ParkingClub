<?php 
    session_start();
    $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/media.css">
        <link rel="stylesheet" href="./cliente.css">
        <link rel="stylesheet" href="./reservaVaga.css">
        <title>Pague Seu Ticket Virtual</title>
    </head>
<body>

    <header class="nav-bar">

        <nav class="nav-bar__menu">
            <details>
                    <summary style="list-style: none; position: fixed; top: 30px; cursor: pointer;"><img src="../componentes/images/menu-icone-cliente.svg" alt="Ícone de menu do cliente"></summary>
                    <p style="position: relative; top: 40px">
                        <a href="http://parkingclub.com.br/telaCliente/cliente.php" style="text-decoration: none; color: white;">Menu</a>
                    </p>

                    <p style="position: relative; top: 45px">
                        <a href="http://parkingclub.com.br/telaCliente/reservaVaga.php" style="text-decoration: none; color: white;">Reserva</a>
                    </p>
            </details>
        </nav>

        <div class="nav-bar__titulo"> 
            <h1>Parking Club Client</h1>
        </div>

        <div class="nav-bar__usuario">
            <img src="../componentes/images/user-icon-cliente.png" alt="" srcset="">
            <?php
                echo "<p>$email</p>";
            ?> 
        </div>

    </header>


    <main class="container-principal-cliente">
        <div class="container-principal-cliente__fundo-cards">

            <form action="pagamento_saida.php" onsubmit="return validarFormularioReservaVaga()" method="post">
                    <fieldset  class="formulario-reserva">
                        <legend><b>Registre sua saída</b></legend>                    

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
            <div>
            <h2>Valor a ser pago:</h2>
            <?php
            // Exibir o valor pago se estiver presente na URL
            if (isset($_GET['valorPago'])) {
                $valorPago = $_GET['valorPago'];
                echo "<h2 style='text-align: center;'>R$$valorPago</h2>";
            } else {
                echo "<h2 style='text-align: center;'>R$00.00</h2>";
            }
            ?>
            <br>
            <h2 style="text-align: center;">
            <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
data-preference-id="154120817-ab69fd1b-6ac7-4469-925c-c8f1c96a9c78" data-source="button">
</script>
            </h2>
            </div>
        </div>
    </main>
    <script src="./validarFormularioReservaVaga"></script>
</body>
</html>