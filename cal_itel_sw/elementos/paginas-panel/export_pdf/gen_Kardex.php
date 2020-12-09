<?php
session_start();
$alumno = $_SESSION['alumno'];

include('../../cn.php');
include('sql_kardex.php');

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
            $this->Ln(10); 
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
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLeftMargin(20);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(170,4,'Carrera',0,1,'C');
$pdf->Cell(170,7,'INGENIERIA EN TICS',0,1,'C');
$pdf->Cell(170,10, utf8_decode('Kardex'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell(170,6,utf8_decode('Alumno: '.$nombre.' '.$apell_pat.' '.$apell_mat),0,1,'L');
$pdf->Cell(40,6,utf8_decode('Número de control: '.$alumno ),0,1,'L');
$pdf->Cell(20,6,'Promedio:',0,0,'L');
$pdf->Cell(170,6,'81',0,1,'L');
$pdf->Cell(18,6,'Creditos:',0,0,'L');
$pdf->Cell(170,6,'78',0,1,'L');
$pdf->SetFont('','',10);
$pdf->Ln(7);

$pdf->Cell(170,7, utf8_decode('Primer semestre'),0,1,'L');
    while($fila1 = $sem_1->fetch_assoc())
    {
        $pdf->Cell(30,7,$fila1['clave_mat'],1,0,'C');
        $pdf->Cell(15,7,$fila1['semestre'],1,0,'C');
        $pdf->Cell(110,7,$fila1['nom_mat'],1,0,'L');
        $pdf->Cell(15,7,$fila1['cal_gen'],1,1,'C');
    }

$pdf->Ln(4);
$pdf->Cell(170,7, utf8_decode('Segundo semestre'),0,1,'L');
    while($fila2 = $sem_2->fetch_assoc())
    {
        $pdf->Cell(30,7,$fila2['clave_mat'],1,0,'C');
        $pdf->Cell(15,7,$fila2['semestre'],1,0,'C');
        $pdf->Cell(110,7,$fila2['nom_mat'],1,0,'L');
        $pdf->Cell(15,7,$fila2['cal_gen'],1,1,'C');
    }

$pdf->Ln(4);
$pdf->Cell(170,7, utf8_decode('Tercer semestre'),0,1,'L');
    while($fila3 = $sem_3->fetch_assoc())
    {
        $pdf->Cell(30,7,$fila3['clave_mat'],1,0,'C');
        $pdf->Cell(15,7,$fila3['semestre'],1,0,'C');
        $pdf->Cell(110,7,$fila3['nom_mat'],1,0,'L');
        $pdf->Cell(15,7,$fila3['cal_gen'],1,1,'C');
    }

$pdf->AddPage();
$pdf->Cell(170,7, utf8_decode('Cuarto semestre'),0,1,'L');
    while($fila4 = $sem_4->fetch_assoc())
    {
        $pdf->Cell(30,7,$fila4['clave_mat'],1,0,'C');
        $pdf->Cell(15,7,$fila4['semestre'],1,0,'C');
        $pdf->Cell(110,7,$fila4['nom_mat'],1,0,'L');
        $pdf->Cell(15,7,$fila4['cal_gen'],1,1,'C');
    }


$pdf->Output('D', 'Kardex.pdf');

?>