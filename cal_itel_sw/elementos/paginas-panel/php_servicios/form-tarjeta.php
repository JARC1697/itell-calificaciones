<?php
 session_start();
 $ver_ses = 1;
 $_SESSION["ver_ses"] = $ver_ses;  

    if(isset($_POST['submit_pago_kdx'])){
        $nom_ser = $_POST['nom_serv_kdx'];
        $precio_serv = $_POST['precio_serv_kdx'];
    }
    
    if(isset($_POST['submit_pago_cons'])){
        $nom_ser = $_POST['nom_serv_cons'];
        $precio_serv = $_POST['precio_serv_cons'];
    }

    if(isset($_POST['submit_pago_boleta'])){
        $nom_ser = $_POST['nom_serv_boleta'];
        $precio_serv = $_POST['precio_serv_boleta'];
    }      
        
?>
<html>

<head>
    <meta charset="utf-8" lang="es">
    <link href="../../../css/style-panel.css" rel="stylesheet" type="text/css">
    <script src="../../../js/iconos.js"></script>
    <title>Forma de pago</title>
</head>

<body>
    <div class="cont-opacity-pago">
        <div class="cont-pag-card">
            <div class="cont-form-pago">
                <form action="validar-pago.php" method="post">
                    <h2>Pago con tarjeta de crédito <i class="far fa-credit-card"></i></h2>
                    <label for="num-tarjeta">Número de tarjeta</label>
                    <input id="num-tarjeta" name="num_cuenta_sub" type="text" placeholder="1234 1234 1234 1234" maxlength="16" required>
                    <label for="nombre-tarjeta">Nombre en la tarjeta</label>
                    <input id="nombre-tarjeta" name="nom_cliente_sub" type="text" placeholder="Nombre en la tarejeta" required>
                    <label for="fecha-tarjeta">Fecha de expiración</label>
                    <input id="fecha-tarjeta" name="mes_tar_sub" type="text" placeholder="MM" maxlength="2" required>
                    <input id="fecha-tarjeta" name="ano_tar_sub" type="text" placeholder="YY" maxlength="4" required>
                    <label for="ccv-tarjeta">CCV</label>
                    <input id="ccv-tarjeta" name="ccv_sub" type="text" placeholder="123" maxlength="4" required>
                    <label for="btn-pagar"></label>
                    <input type="text" name="precio-serv" value="<?php echo $precio_serv ?>" hidden>
                    <input type="text" name="nom-serv" value="<?php  echo $nom_ser ?>" hidden>
                    <a class="btn-cancelar-pago" href="javascript:history.back(-1);">Cancelar</a>
                    <input id="btn-pagar" type="submit" name="submit_pago" value="Confirmar pago">
                </form>
            </div>
            <div class="cont-total-pago">
                <div class="forma-total-pago">
                    <div class="top-forma-pago">
                        <h3>Total a pagar:</h3>
                        <?php echo "<h1>$$precio_serv</h1>"; ?>
                    </div>
                    <p class="texto-pago">
                        <?php  echo "Se relaizara el cargo a su tarjeta de credito por: " . "<strong>$nom_ser</strong>"; ?>
                    </p>
                </div>
                <div class="iconos-card">
                    <h1><i class="fab fa-cc-visa"></i></h1>
                    <h1><i class="fab fa-cc-mastercard"></i></h1>
                    <h1><i class="fab fa-cc-amex"></i></h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
