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
$pdf->SetLeftMargin(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(170,4,'Carrera',0,1,'C');
$pdf->Cell(170,7,'INGENIERIA EN TICS',0,1,'C');
$pdf->Cell(170,10, utf8_decode('Constancia de inscripción'),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(55,8,'A QUIEN CORRESPONDA',0,1,'L');
$pdf->Ln(1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(170,8,'Por medio de la Presente, El (la) que suscribe, Jefe(a) de Depto. de Servicios Escolares',0,1,'L');
$pdf->Cell(10,8,'del',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(120,8,utf8_decode('INSTITUTO TECNOLÓGICO EL LLANO AGUASCALIENTES'),0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,8,'HACE CONSTAR',0,1,'R');
$pdf->Cell(35,8,'que el (la) C.',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(85,8,$nombre.' '.$apell_pat.' '. $apell_mat ,0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(45,8,'con No. de Control',0,1,'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,8,$alumno,0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(140,8,utf8_decode('se encuentra inscrito (a) y cursando actualmente, como alumno (a)'),0,1,'R');
$pdf->Cell(20,8,'regular el',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25,8,'quinto',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(45,8,'semestre de la carrera ',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(70,8,utf8_decode('INGENIERÍA EN TICS'),0,1,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(55,8,utf8_decode('en el periodo de enero de '),0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'enero',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(8,8,'de',0,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'2017',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(5,8,'a',0,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'junio',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(8,8,'de',0,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'2017.',0,1,'C');
$pdf->Ln(2);
$pdf->SetFont('Arial','',12);
$pdf->Cell(170,8,'Por los usos legales que al (la) interesado (a) convengan, se extiende la presente',0,1,'L');
$pdf->Cell(115,8,'en el municipio de El Llano, estado de Aguascalientes, a los',0,0,'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'30',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(35,8,utf8_decode('días del mes de'),0,1,'R');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'enero',0,0,'C');
$pdf->SetFont('Arial','',12);
$pdf->Cell(8,8,'de',0,0,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,8,'2017.',0,1,'C');
$pdf->Ln(3);
$pdf->Cell(105,8,'ATENTAMENTE',0,1,'C');
$pdf->Cell(105,8,utf8_decode('Tierra Rica, Sapineta Nostra, Homo Superior Est'),0,1,'C');

$pdf->Output('D', 'Constancia de estudios.pdf ');
?>








