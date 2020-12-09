<?php

if(isset($_POST['submit'])){
	$num_control = $_POST['num-control'];
	$pass_alumno = $_POST['pass-alumno'];
	}
?>
    <!doctype html> 
    <html>

    <head>
        <meta charset="utf-8">
        <title>Regístrate</title>
        <link href="../css/menu.css" rel="stylesheet" type="text/css">
        <link href="../css/reg-alumno.css" rel="stylesheet" type="text/css">
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

        <h1 class="crea-cuenta">Crea una cuenta <strong>Alumno</strong></h1>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-reg">
            <div class="titulo-reg">
                <h1>Ingresa tus datos</h1>
            </div>
            <div class="campos-registro">
                <input type="number" name="num-control" placeholder="Ingresa tu número de control..." value="<?php if(isset($num_control)) echo $num_control?>">
                <input type="password" name="pass-alumno" placeholder="Contraseña..." value="<?php if(isset($pass_alumno)) echo $pass_alumno?>">
                <input class="btn-reg" name="submit" type="submit" value="Registrar">
                <?php include("validar-reg.php"); ?>
                <p class="reg-iniciar">¿Ya tienes una cuenta? <a href="in-sesion.php">Ingresa aqui</a>
                </p>
            </div>
        </form>

        <div class="pie">
            <div align="center">Copyright © 2018. Instituto Tecnológico El Llano Aguascalientes. Todos los Derechos Reservados.</div>
            <div class="ubicacion" align="center">Km. 18 Carretera Ags.-S.L.P., El Llano Aguascalientes, C.P. 20330.</div>
            <div class="telefono" align="center">Tel. (449) 9 62 11 00</div>
        </div>
    </body>

    </html>