<?php
mb_http_input("utf-8");
mb_http_output("utf-8");
//Conexion 
include 'cn.php';

if ( isset( $_POST[ 'submit' ] ) ) {    

	//Verifica si el usuario se ha reguistrado
	$verifica_numc = mysqli_query( $conexion, "SELECT * FROM `alumno_pass` WHERE Num_control = '$num_control' " );
	//Verifica si el usuario esta inscrito 
	$num_exist = mysqli_query( $conexion, "SELECT * FROM `alum_tics` WHERE Num_control = '$num_control' " );
    	
	if ( empty( $num_control ) ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                </div>
                <div class='error-txt'>
                 Debes agrega tu número de control para continuar.
                </div>
            </div>";
		
	} else if ( empty( $pass_alumno ) ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                </div>
                <div class='error-txt'>
                 Debes agrega una contraseña para continuar.
                </div>
            </div>";	
	
	} else if ( mysqli_num_rows( $verifica_numc ) > 0 ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                    </div>
                <div class='error-txt'>
                    El usuario $num_control ya está registrado.
                    </div>
                    </div>";

	} else if ( mysqli_num_rows( $num_exist ) == 0 ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                    </div>
                <div class='error-txt'>
                     El número de control $num_control no existe.
                    </div>
                    </div>";

	} else if ( strlen( $num_control ) > 11 ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                    </div>
                <div class='error-txt'>
                     El número de control que ingresaste es muy largo.
                    </div>
                    </div>";

	} else if ( !is_numeric( $num_control ) ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                    </div>
                <div class='error-txt'>
                     Este campo solo debe incluir números.
                    </div>
                    </div>";

	} else if ( strlen( $pass_alumno ) > 32 ) {
		echo "<div class='cont-error'>
                <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                    </div>
                <div class='error-txt'>
                    La contraseña que ingresaste es muy larga.
                    </div>
                    </div>";

	} else {
		try {
			//Consulta para insertar 
			$consulta = "INSERT INTO `calificaciones_itel`.`alumno_pass` (`Num_control`, `Password`, `fecha_reguistro`) VALUES('$num_control', '$pass_alumno', CURRENT_TIMESTAMP ) ";
			//Ejecutar consulta
			$result = mysqli_query( $conexion, $consulta );
		} catch ( PDOException $error ) {
			echo "<div class='cont-error'>
                    <div class='error-icono'>
                    <i class='fas fa-exclamation-triangle'></i>
                    </div>
                    <div class='error-txt'>
                        <strong>ADVERTENCIA:</strong> Error al registrarse.
                    </div>
                </div>";
		}

		if ( $result == true ) {
			echo "<div class='cont-reg-ex'>
            <div class='reg-ex-icon'>
            <i class='fas fa-user-plus'></i>
            </div>
            <div class='reg-ex-txt'>
            El usuario se registró exitosamente. Ahora ya puedes iniciar sesión.
            </div>
            </div>";
		}
	}
	//Cerrar conexion
	mysqli_close( $conexion );
}