<?php

include 'cn_banco.php';

session_start();   

 if(empty($_SESSION["ver_ses"])){
     $ver_ses = null;
 }else {
     $ver_ses = $_SESSION["ver_ses"]; 
 }

if(isset($_POST['submit_pago'])){        
	$num_cuenta_sub = $_POST['num_cuenta_sub'];
    $nom_cliente_sub = $_POST['nom_cliente_sub'];
	$mes_tar_sub = $_POST['mes_tar_sub'];
	$ano_tar_sub = $_POST['ano_tar_sub'];
    $ccv_sub = $_POST['ccv_sub'];
 
    $verifica_pago = mysqli_query( $cn_banco, "SELECT * FROM `cliente` WHERE num_cuenta = '$num_cuenta_sub' " );
    
    if ($row = mysqli_fetch_array($verifica_pago)) {
	$num_cuenta = $row['num_cuenta'];
    $nombre = $row['Nombre'];
	$mes_tar = $row['mes_tar'];
	$ano_tar = $row['ano_tar'];
    $ccv = $row['ccv'];
    $saldo = $row['saldo'];    
    } 
    if( empty($num_cuenta)) {
        $num_cuenta = null;
        $nombre = null;
        $mes_tar = null;
        $ano_tar = null;
        $ccv = null;
        $saldo = null;
    } 
       
    $precio_serv = $_POST['precio-serv'];
    $nom_serv = $_POST['nom-serv'];    
    
?>

<html>

<head>
    <meta charset="utf-8" lang="es">
    <link href="../../../css/style-panel.css" rel="stylesheet" type="text/css">
    <script src="../../../js/iconos.js"></script>
    <title>Validando Pago</title>
</head>

<body>

    <div class="cont-opacity-pago">
       
       <?php if (($num_cuenta_sub != $num_cuenta) || ($nom_cliente_sub != $nombre) || ($mes_tar_sub != $mes_tar) || ($ano_tar_sub != $ano_tar) || ($ccv_sub != $ccv) || ($precio_serv >= $saldo)) { ?>   
        
        <div class="msj-validacion">
            <div id="icon-check-fail"><i class="fas fa-times-circle"></i>
                <p id="pago-txt">¡Error al realizar el pago verifique sus datos! </p>
            </div>
            <p>
                <strong>Revise si su saldo es suficiente para pagar: </strong> <?php echo $precio_serv; ?><br>
                <strong>Número de cuenta: </strong><?php echo $num_cuenta_sub; ?> <br>
                <strong>Nombre del cliente: </strong><?php echo $nom_cliente_sub; ?> <br>
                <strong>Mes de la tarjeta: </strong><?php echo $mes_tar_sub; ?> <br>
                <strong>Año de la tarjeta: </strong><?php echo $ano_tar_sub; ?> <br>
            </p>
            <hr id="linea-tiket">
            <div class="btns-msj">            
            <a id="btn-regresar-error" href="javascript:history.back(-1);"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
            </div>
        </div>        
        
        <?php } else { ?>
       
        <div class="msj-validacion">
            <div id="icon-check"><i class="fas fa-check-circle"></i>
                <p id="pago-txt">¡Su pago se realizó exitosamente!</p>
            </div>
            <p>
                <strong>Cocepto: </strong> <?php echo $nom_serv; ?><br>
                <strong>Importe: </strong> <?php echo $precio_serv; ?><br>
                <strong>Fecha de Operación: </strong><?php $fechaO = date('d/m/Y'); echo $fechaO; ?> <br>
                <strong>Hora de Operación: </strong><?php $horaO = date('H:i:s'); echo $horaO; ?> <br>
                <strong>Folio de Operación: </strong> 2277272
            </p>
            <hr id="linea-tiket">
            <div class="btns-msj">
                <a id="btn-inicio" href="../../inicio-panel-usuario.php?p=servicios"><i class="fas fa-home"></i> Inicio</a>
                <a id="btn-print-pdf" href="../export_pdf/gen_<?php echo $nom_serv; ?>.php" target="_blank"><i class="fas fa-print"></i> Imprimir archivo</a>
            </div>
        </div>
        
        <?php
            if($ver_ses == 1){ 
            unset($_SESSION['ver_ses']);
            mysqli_query($cn_banco, "UPDATE `banco`.`cliente` SET `saldo` = $saldo-$precio_serv WHERE `cliente`.`num_cuenta` = $num_cuenta"); 
        
            mysqli_close($cn_banco);
            }
        ?>
        
        <?php } ?>
    </div>
</body>

</html>
<?php } ?>