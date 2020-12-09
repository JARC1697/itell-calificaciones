<?php

session_start();
if(isset($_POST['submit-sesion'])){
	$num_contssi = $_POST['num-contssi'];
    $pass_alumssi = $_POST['pass-alumssi'];
	}
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="utf-8">
        <title>Inicia sesión </title>
        <link href="../css/menu.css" rel="stylesheet" type="text/css">
        <link href="../css/sesion.css" rel="stylesheet" type="text/css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../js/meu-fixed.js"></script>
        <script src="../js/iconos.js"></script>
    </head>

    <body>
        <header class="menu">
            <nav>
                <ul>
                    <li><a href="../index.php"><span class="primero"><i class="icono fas fa-home"></i></span>Inicio</a>
                    </li>
                    <li><a href="registro_alumno.php"><span class="segundo"><i class="icono fas fa-user-plus"></i></span>Regístrate</a>
                    </li>
                    <li><a href="in-sesion.php"><span class="tercero"><i class="icono fas fa-user"></i></span>Inicia sesión</a>
                    </li>
                    <li><a href=""><span class="cuarto"><i class="icono fas fa-phone"></i></span>Contáctanos </a>
                    </li>
                    <li><a href=""><span class="quinto"><i class="icono fas fa-info-circle"></i></span>Acerca de</a>
                    </li>
                </ul>
            </nav>
        </header>

        <h1 class="crea-cuenta">Inicia sesion <strong>Alumno</strong></h1>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-sesion">
            <h2 class="titulo-sesion">Ingresa tus datos</h2>
            <div class="campos-sesion">
                <input type="number" name="num-contssi" placeholder="Ingresa tu número de control..." value="<?php if(isset($num_contssi)) echo $num_contssi?>">
                <input type="password" name="pass-alumssi" placeholder="Contraseña..." value="">
                <input class="btn-sesion" name="submit-sesion" type="submit" value="Iniciar sesion">
                <?php include("validar-ses.php"); ?>
                <p class="iniciar-registro">¿No tienes una cuenta? <a href="registro_alumno.php">Ingresa aqui</a>
                </p>
            </div>
        </form>

        <footer class="pie">
            <div align="center">Copyright © 2018. Instituto Tecnológico El Llano Aguascalientes. Todos los Derechos Reservados.</div>
            <div class="ubicacion" align="center">Km. 18 Carretera Ags.-S.L.P., El Llano Aguascalientes, C.P. 20330.</div>
            <div class="telefono" align="center">Tel. (449) 9 62 11 00</div>
        </footer>
    </body>

    </html>