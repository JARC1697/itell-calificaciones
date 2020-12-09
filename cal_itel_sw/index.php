<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Calificaciones ITEL</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/form_cont.css" rel="stylesheet" type="text/css">
    <link href="css/menu.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet"> 
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/meu-fixed.js"></script>
    <script src="js/iconos.js"></script>

</head>

<body>   
    <header class="menu">
        <nav>
            <ul>
                <li><a href="index.php"><span class="primero"><i class="icono fas fa-home"></i></span>Inicio</a>
                </li>
                <li><a href="elementos/registro_alumno.php"><span class="segundo"><i class="icono fas fa-user-plus"></i></span>Regístrate</a>
                </li>
                <li><a href="elementos/in-sesion.php"><span class="tercero"><i class="icono fas fa-user"></i></span>Inicia sesión</a>
                </li>
                <li><a href="#"><span class="cuarto"><i class="icono fas fa-phone"></i></span>Contáctanos </a>
                </li>
                <li><a href="#"><span class="quinto"><i class="icono fas fa-info-circle"></i></span>Acerca de</a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="cont-bienvenida-portada">
           <div class="cont-degradado"></div>
        <div class="cont-txt-portada">
            <div class="img-logo">
                <img src="images/logo_itel2.png" alt="Logo ITEL">
            </div>
            <h1>Bienvenidos</h1>
            <p>Este sitio brinda la posibilidad de poder consultar tus calificaciones vía internet y así como la impresión de tu boleta de calificaciones</p>
        </div>
    </div>

    <div class="cont-descripcion">
        <div>
            <a id="registro-descripcion" href=""><i class="icono fas fa-user-plus"></i></a>
            <h2>Registrate</h2>
            <p>Para crear una cuenta solo debes tener en mano tu número de control y crear tu contraseña.</p>
        </div>
        <div>
            <a id="sesion-descripcion" href=""><i class="icono fas fa-user"></i></a>
            <h2>Inicia sesión</h2>
            <p>Una vez te hayas registrado podrás iniciar sesión con tu número de control y contraseña que ingresaste.</p>
        </div>
        <div>
            <a id="contacto-descripcion" href=""><i class=" fas fa-phone"></i></a>
            <h2>Contáctanos </h2>
            <p>Nos encantaría conocer qué opinas acerca de la página. No dudes en opinarnos tu experiencia.</p>
        </div>
        <div>
            <a id="acerca-descripcion" href=""><i class="fas fa-info-circle"></i></a>
            <h2>Acerca de</h2>
            <p>¿Te gustaría conocer acerca de la página? Ingresa aquí </p>
        </div>
    </div>
    
    <h1 id="txt-comentarios">Envianos tus comentarios</h1>
   <div class="cont-contacto">
   <div class="cont-mapa">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d118498.33589638815!2d-102.2648818425927!3d21.854719872508653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429f5141e9ebd79%3A0x9f93db09c44b6da5!2sInstituto+Tecnol%C3%B3gico+El+Llano!5e0!3m2!1ses-419!2smx!4v1526506146258" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
   </div>
   
   <div class="cont-from-contacto">
    <form class="form-contacto" action="#">
        <input type="text" name="Nombre" placeholder="Nombre" required>
        <input type="email" name="Correo" placeholder="Correo" required>
        <input type="tel" name="Telefono" placeholder="Teléfono" required>
        <textarea name="mensaje" placeholder="Escriba su mensaje" required></textarea>
        <input type="submit" value="Enviar" id="btn_enviar">
    </form>
       </div>
    </div>
    
    <div class="pie">
        <div align="center">Copyright © 2018. Instituto Tecnológico El Llano Aguascalientes. Todos los Derechos Reservados.</div>
        <div class="ubicacion" align="center">Km. 18 Carretera Ags.-S.L.P., El Llano Aguascalientes, C.P. 20330.</div>
        <footer class="telefono" align="center">Tel. (449) 9 62 11 00</footer>
    </div>
</body>

</html>