<?php 
   echo "<div class='marg-auto'>
    </div>";

   echo "<div>
            <div class='titulo-gen'>
                <h1>Calificaciones parciales</h1>
                    <div class='cont-src-sem'>
            </div>
    </div>";
    
    mb_http_input("utf-8");
    mb_http_output("utf-8");

       $datos = mysqli_query( $conexion, "SELECT `mat_tics`.`nom_mat` , `mat_tics`.`semestre` ,                                                     `cal_tics`.`clave_mat` , `cal_tics`.`cal_1` , `cal_tics`.`cal_2` ,                                       `cal_tics`.`cal_3` , `cal_tics`.`cal_4` , `cal_tics`.`cal_5`
                                          FROM `mat_tics` , `cal_tics`
                                          WHERE `mat_tics`.`clave_mat` LIKE `cal_tics`.`clave_mat`
                                          AND `cal_tics`.`num_control` =16900137
                                          AND `mat_tics`.`semestre` =4
                                          ORDER BY `cal_tics`.`clave_mat` ASC" );

    echo " <table class='tbl-parcial'>
        <tbody>
            <thead>
                <tr>
                    <th rowspan='2'>Nombre de la materia</th>
                    <th rowspan='2'>Semestre</th>
                    <th colspan='5'>CALIFICACION UNIDAD</th>
                </tr>
                <tr>
                    <th>1</td>
                    <th>2</td>
                    <th>3</td>
                    <th>4</td>
                    <th>5</td>
                </tr>
            </thead>";
           while(($rs = mysqli_fetch_array($datos, MYSQLI_ASSOC))){
               
             echo "<tr>" 
                 ."<td id='nom-mat'>".utf8_decode($rs['nom_mat'])."</td>" 
                 ."<td>".$rs['semestre']."</td>"
                 ."<td>".$rs['cal_1']."</td>" 
                 ."<td>".$rs['cal_2']."</td>" 
                 ."<td>".$rs['cal_3']."</td>" 
                 ."<td>".$rs['cal_4']."</td>" 
                 ."<td>".$rs['cal_5']."</td>" 
                 ."</tr>"; 
        } 
         echo "</tbody>
    </table>
    
                    <div class='cont-btn-down'> 
                    <div>Descargar PDF</div>
                    <div>
                        <a class='btn-down-pdf' href='paginas-panel/export_pdf/gen_pdf.php'><i class='fas fa-download'></i></a>
                        </div>
                    </div>
</div>";
                        
?>       