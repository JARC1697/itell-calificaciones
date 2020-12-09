<?php

include("cn.php");

session_start();

$alumno = $_SESSION['alumno'];

if($alumno == null || $alumno == ''){
	header('Location: in-sesion.php');
    
}

$sql = "SELECT * FROM alum_tics WHERE `Num_control` = '$alumno' ";
$datos = mysqli_query($conexion, $sql);

if($row = mysqli_fetch_array($datos)){
	$nommbre = $row['Nombre'];
	$apell_pat = $row['Apellido_pat'];
	$apell_mat = $row['Apellido_mat'];
	$carrera = $row['Crrera'];
    $semestre = $row['semestre'];
}

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8" lang="es">
    <link href="../css/style-panel.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-3.4.0.min.js"></script>
    <script src="../js/abrir-cerrar_panel.js"></script>
    <script src="../js/iconos.js"></script>
    <title>
        <?php echo $nommbre,"  ", $apell_pat, " ", $apell_mat; ?>
    </title>
</head>

<body>

    <div class="barra-titulo">
        <div class="barra-menu">
            <span class="btn-menu"><i class="icono fas fa-bars"></i></span>
        </div>
        <div class="barra-usuario">
            <div class="log-usuario">
                <?php echo $nommbre[0], $apell_pat[0]; ?> </div>
            <div class="nom_usuario">
                <?php echo $nommbre,"  ", $apell_pat, " ", $apell_mat;?>
                <p id="txt-carrera"><strong>Carrera:</strong>
                    <?php echo $carrera ?> </p>
            </div>
        </div>
        <div class="barra-close">
            <a class="btn-cerrarssi" href="cerrar-ses.php" title="Cerrar sesión"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>

    <?php $link = isset($_GET['p']) ? strtolower($_GET['p']) : 'cal_parcial'; ?>

    <nav class="menu-panel" id="enlaces">
        <h2 class="sidebar-menu">MENÚ</h2>
        <ul>
            <li class="<?php echo $link == 'nosotros' ? 'active' : ''; ?>"><a href="?p=nosotros">Mi información</a></li>
            <li class="<?php echo $link == 'cal_cardex' ? 'active' : ''; ?>"><a href="?p=cal_cardex">Cardex</a></li>
            <li class="<?php echo $link == 'cal_parcial' ? 'active' : ''; ?>"><a href="?p=cal_parcial">Calificaciones parciales</a></li>
            <li class="<?php echo $link == 'servicios' ? 'active' : '';  ?>"><a href="?p=servicios">Servicios</a></li>
            <li><a href="">Inicio</a></li>
        </ul>
    </nav>

    <?php include 'paginas-panel/' . $link . '.php'; ?>

</body>

</html>
