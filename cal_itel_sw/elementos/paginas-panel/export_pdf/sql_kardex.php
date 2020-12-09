<?php
#Datos alumno
$sql = "SELECT * 
        FROM alum_tics 
        WHERE `Num_control` = '$alumno' ";
$d_alum = mysqli_query($conexion, $sql);

    if($row = mysqli_fetch_array($d_alum))
    {
	   $nombre = $row['Nombre'];
	   $apell_pat = $row['Apellido_pat'];
	   $apell_mat = $row['Apellido_mat'];
	   $carrera = $row['Crrera'];
       $semestre = $row['semestre'];
    }
#cal semestre1
$sem_1 = mysqli_query( $conexion, "SELECT `mat_tics`.`nom_mat` , `cal_tics`.`clave_mat` , `cal_tics`.`cal_gen`                                      , `mat_tics`.`semestre`
                                   FROM `mat_tics` , `cal_tics`
                                   WHERE `mat_tics`.`clave_mat` LIKE `cal_tics`.`clave_mat`
                                   AND `cal_tics`.`num_control` = $alumno
                                   AND `mat_tics`.`semestre` =1
                                   ORDER BY `mat_tics`.`semestre` ASC" );
#cal semestre2
$sem_2 = mysqli_query( $conexion, "SELECT `mat_tics`.`nom_mat` , `cal_tics`.`clave_mat` , `cal_tics`.`cal_gen`                                      , `mat_tics`.`semestre`
                                   FROM `mat_tics` , `cal_tics`
                                   WHERE `mat_tics`.`clave_mat` LIKE `cal_tics`.`clave_mat`
                                   AND `cal_tics`.`num_control` = $alumno
                                   AND `mat_tics`.`semestre` =2
                                   ORDER BY `mat_tics`.`semestre` ASC" );
#cal semestre3
$sem_3 = mysqli_query( $conexion, "SELECT `mat_tics`.`nom_mat` , `cal_tics`.`clave_mat` , `cal_tics`.`cal_gen`                                      , `mat_tics`.`semestre`
                                   FROM `mat_tics` , `cal_tics`
                                   WHERE `mat_tics`.`clave_mat` LIKE `cal_tics`.`clave_mat`
                                   AND `cal_tics`.`num_control` = $alumno
                                   AND `mat_tics`.`semestre` =3
                                   ORDER BY `mat_tics`.`semestre` ASC" );
#cal semestre4
$sem_4 = mysqli_query( $conexion, "SELECT `mat_tics`.`nom_mat` , `cal_tics`.`clave_mat` , `cal_tics`.`cal_gen`                                      , `mat_tics`.`semestre`
                                   FROM `mat_tics` , `cal_tics`
                                   WHERE `mat_tics`.`clave_mat` LIKE `cal_tics`.`clave_mat`
                                   AND `cal_tics`.`num_control` = $alumno
                                   AND `mat_tics`.`semestre` =4
                                   ORDER BY `mat_tics`.`semestre` ASC" );
?>