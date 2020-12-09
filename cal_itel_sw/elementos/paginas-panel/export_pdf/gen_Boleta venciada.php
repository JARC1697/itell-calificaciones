<?php

include('../../cn.php');
session_start();
$alumno = $_SESSION['alumno'];

$sql = "SELECT * FROM alum_tics WHERE `Num_control` = '$alumno' ";
$d_alum = mysqli_query($conexion, $sql);

    if($row = mysqli_fetch_array($d_alum))
    {
	   $nombre = $row['Nombre'];
	   $apell_pat = $row['Apellido_pat'];
	   $apell_mat = $row['Apellido_mat'];
	   $carrera = $row['Crrera'];
       $semestre = $row['semestre'];
    }

$d_cal = mysqli_query( $conexion, "SELECT `mat_tics`.`nom_mat` , `mat_tics`.`semestre` ,                                                                 `cal_tics`.`clave_mat` , `cal_tics`.`cal_1` , `cal_tics`.`cal_2` ,                                             `cal_tics`.`cal_3` , `cal_tics`.`cal_4` , `cal_tics`.`cal_5`
                                   FROM `mat_tics` , `cal_tics`
                                   WHERE `mat_tics`.`clave_mat` LIKE `cal_tics`.`clave_mat`
                                   AND `cal_tics`.`num_control` =16900137
                                   AND `mat_tics`.`semestre` =3
                                   ORDER BY `cal_tics`.`clave_mat` ASC" );

    require ('lib_fpdf/fpdf.php');

    class PDF extends FPDF
    {        
         function Header()
        {
            $this->SetX((210)/2);
            $this->Image('../../../images/logo_sep.png',25,15,55);
            $this->SetFont('Arial','B',13);
            $this->Ln(9); 
            $this->Cell(186,6,utf8_decode('TECNOLÓGICO NACIONAL DE MÉXICO'),0,1,'R');
            $this->SetFont('','',12);
            $this->Cell(185,6,utf8_decode('Instituto Tecnológico El Llano Aguascalientes'),0,1,'R');
            $this->Ln(20); 
            $this->y0 = $this->GetY();
        }
        
        function Footer()
        {
            // Pie de página
            $this->SetY(-35);
            $this->SetFont('Arial','',7);
            $this->Cell(165,4,'Km. 18 Carretera Ags.-S.L.P, El Llano Aguascalientes, C.P. 20330',0,1,'C');
            $this->Cell(165,4,'Tels.(449)916-12-51, Fax. (449)916-20-94 Ext. 101, e-mail: itllano@hotmail.com',0,1,'C');
            $this->SetFont('','B');
            $this->Cell(165,4,'www.itllano.edu.mx',0,1,'C');
            $this->Image('../../../images/logo_itel2.png',30,260,12,18);
            $this->Image('../../../images/icono_sertificado.png',155,255,40,23);
            
        }       
    }

$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,1,'Carrera',0,1,'C');
$pdf->Cell(190,10,'INGENIERIA EN TICS',0,1,'C');
$pdf->Cell(190,10, utf8_decode('Boleta de Calificaciónes'),0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,7,'El que suscribe, Director del',0,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,'Instituto Tecnologico El Llano Aguascalientes',0,1,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(62,7,'HACE CONSTAR que el (la) C.',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(80,7,$nombre.' '.$apell_pat.' '. $apell_mat ,0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(20,7,'con No. de Control',0,1,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25,7,$alumno,0,0,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(150,7,utf8_decode('cursó y acreditó las siguientes materias correspondientes al ciclo escolar'),0,1,'L');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(35,7,'DIC-AGO 2017',0,1,'L');
$pdf->Cell(30,7,'Clave Materia',0,0,'C');
$pdf->Cell(22,7,'Semestre',0,0,'C');
$pdf->Cell(80,7,'Materias',0,0,'C');
$pdf->Cell(25,7,utf8_decode('Calificación'),0,0,'C');
$pdf->Cell(32,7,'Observaciones',0,1,'C');
$pdf->SetFont('Arial','',9);
    
    while($fila = $d_cal->fetch_assoc())
        {
    $pdf->Cell(30,7,$fila['clave_mat'],1,0,'C');
    $pdf->Cell(17,7,$fila['semestre'],1,0,'C');
    $pdf->Cell(90,7,$fila['nom_mat'],1,0,'C');
    $pdf->Cell(17,7,$fila['cal_5'],1,1,'C');
        }

$pdf->Ln(5);
$pdf->Cell(30,7,'Creditos Cusrsados',1,'L');

$pdf->Output('D', 'Boleta-de-calificaciones.pdf');

?>
