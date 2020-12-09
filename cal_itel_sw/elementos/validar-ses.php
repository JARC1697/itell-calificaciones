<?php 
mb_http_input("utf-8");
mb_http_output("utf-8");

include 'cn.php';

if ( isset( $_POST[ 'submit-sesion' ] ) ) {
    $cosultassi = "SELECT * FROM alumno_pass WHERE Num_control = '$num_contssi' AND Password = '$pass_alumssi'"; 
    $result_ssi = mysqli_query($conexion, $cosultassi);
    $dato_ssi = mysqli_num_rows($result_ssi);
    
    if ($dato_ssi > 0){
        header('Location: inicio-panel-usuario.php');
        session_start();
        $_SESSION['alumno'] = $num_contssi; 
    }else{
        echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                </div>
                <div class='error-txt'>
                     El número de control y contraseña que ingresaste no coinciden con ninguna cuenta. Regístrate para crear una cuenta.
                </div>
            </div>";
    }
}