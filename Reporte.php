 <?php
   /* require('fpdf184/fpdf.php');
    $pdf = new FPDF('P','mm','letter'); //Posicion de la hoja P vertical L hotizontal,Unidad de medida del usuiario(pt,cm,mm,in)
    $pdf->AddPage('P','letter',0); //Aqui se pueden revisar sus tamaños, tipo de hoja, y su rotacion
    $pdf->SetFont('Arial','B',18);//Fuente,negrita,tamaño
    $pdf->Cell(50,12,'Hola Mundo',1,0,'L');//ancho,alto,texto interno,1 se muestra borde,1 continuar en la linea,alineacion del texto (L,R,C),color
    $pdf->Cell(50,12,'Hola Mundo',1,1,'L');
    $pdf->Output('I');//(I envia al navegador,D envia a nav y lo descarga,F guarda el fichero en local con nombre,S devuelve el doc como una cadena DESTINO),('NOMBRE.pdf'),
    */
    require('fpdf184/fpdf.php');
   
    class PDF extends FPDF{
        function Header(){
            $this->Image('img/Lsep.png',10,10,40,0,'');
            $this->Image('img/Lipn.png',55,9,60,0,'');
            $this->Image('img/Lcdmx.png',150,10,60,20,'');
            
        }
        
        function Footer(){
            $this->SetY(-18); //LA ordenada
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
            $this->SetFont('Arial','I',10);//Fuente,negrita,tamaño
            
        }
    }
    $pdf = new PDF('P','mm','letter');
    
    $pdf->SetFillColor(221,228,255);
    $pdf->AddPage('P','letter',0);
    $pdf->SetFont('Arial','B',15);//Fuente,negrita,tamaño
    $pdf->Ln(15);
    // Inicio del doc
    $pdf->Cell(198,12,utf8_decode('FICHA DE INSCRIPCIÓN'),0,1,'C');
    $pdf->SetFont('Arial','B',12);//Fuente,negrita,tamaño
    $pdf->Cell(165,12,utf8_decode('CICLO ESCOLAR: 2022-2023'),0,0,'C');
    $pdf->Cell(30,30,'Foto',1,1,'C');
    $pdf->SetFont('Arial','B',10);//Fuente,negrita,tamaño
    $pdf->Cell(150,12,utf8_decode('CENDI: '),0,0,'C');  
    $pdf->Cell(15,10,'Folio:',1,0,'L');
    $pdf->Cell(30,10,'',1,1,'L'); 
    $pdf->Cell(150,10,'',0,0,'C');
    $pdf->Cell(15,10,utf8_decode('Grupo:'),1,0,'');
    $pdf->Cell(30,10,'',1,1,'L');  
    // Fin primera seccion

    //Inicio seccion datos del niño o niña
    $pdf->SetFont('Arial','B',10);//Fuente,negrita,tamaño
    $pdf->Cell(66,7,utf8_decode('DATOS DEL NIÑO O DE LA NIÑA:'),0,1,'L'); 
    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1);  
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño 
    $pdf->Cell(66,5,'Primer Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Segundo Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Nombre(s)',1,1,'C',0);
    $pdf->SetFont('Arial','',6); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1);
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(66,5,'Fecha de Nacimiento',1,0,'C',0); 
    $pdf->Cell(66,5,'Edad',1,0,'C',0); 
    $pdf->Cell(66,5,'Curp',1,1,'C',0);
    // Fin seccion del niño o niña

    //Inicio derechohabiente
    $pdf->SetFont('Arial','B',10);//Fuente,negrita,tamaño
    $pdf->Cell(66,7,utf8_decode('DATOS DEL O LA DERECHOHABIENTE:'),0,1,'L'); 
    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1);  
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño 
    $pdf->Cell(66,5,'Primer Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Segundo Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Nombre(s)',1,1,'C',0);

    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño 
    $pdf->Cell(33,5,'CP',1,0,'C',0); 
    $pdf->Cell(33,5,'Entidad',1,0,'C',0); 
    $pdf->Cell(33,5,'Alcaldia',1,0,'C',0);
    $pdf->Cell(33,5,'Colonia',1,0,'C',0); 
    $pdf->Cell(66,5,'Calle',1,1,'C',0);

    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño
    $pdf->Cell(33,5,'NumExt',1,0,'C',0); 
    $pdf->Cell(33,5,'NumInt',1,0,'C',0);
    $pdf->Cell(66,5,'Telefono Fijo',1,0,'C',0); 
    $pdf->Cell(66,5,'Telefono Celular',1,1,'C',0);

    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño  
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño
    $pdf->Cell(66,5,utf8_decode('Correo Electrónico'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Ocupación'),1,0,'C',0);
    $pdf->Cell(66,5,'CURP',1,1,'C',0); 

    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño  
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño
    $pdf->Cell(66,5,utf8_decode('Puesto'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Sueldo Mensual'),1,0,'C',0);
    $pdf->Cell(66,5,utf8_decode('Número de empleado'),1,1,'C',0); 
    
    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño  
    $pdf->Cell(198,5,'',1,1,'L',1);
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño
    $pdf->Cell(198,5,utf8_decode('Adscripcion'),1,1,'C',0); 
    $pdf->Cell(132,5,'',1,0,'L',1);
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño
    $pdf->Cell(132,5,utf8_decode('Horario de trabajo'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Extensión'),1,1,'C',0);
    //FIn derechohabiente

    $pdf->SetFont('Arial','B',10);//Fuente,negrita,tamaño
    $pdf->Cell(66,7,utf8_decode('DATOS DEL CÓNYUGE(PADRE,MADRE):'),0,1,'L'); 
    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1);  
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño 
    $pdf->Cell(66,5,'Primer Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Segundo Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Nombre(s)',1,1,'C',0);
     
    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño 
    $pdf->Cell(33,5,'CP',1,0,'C',0); 
    $pdf->Cell(33,5,'Entidad',1,0,'C',0); 
    $pdf->Cell(33,5,'Alcaldia',1,0,'C',0);
    $pdf->Cell(33,5,'Colonia',1,0,'C',0); 
    $pdf->Cell(66,5,'Calle',1,1,'C',0);

    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(33,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,0,'L',1); 
    $pdf->Cell(66,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);//Fuente,negrita,tamaño
    $pdf->Cell(33,5,'NumExt',1,0,'C',0); 
    $pdf->Cell(33,5,'NumInt',1,0,'C',0);
    $pdf->Cell(66,5,'Telefono Fijo',1,0,'C',0); 
    $pdf->Cell(66,5,'Telefono Celular',1,1,'C',0);

    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(198,5,'',1,1,'L',1);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(198,5,'Lugar de Trabajo',1,1,'L',0);  
    $pdf->Cell(198,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(198,5,'Domicilio de Trabajo',1,1,'L',0);
    $pdf->SetFont('Arial','',6);//Fuente,negrita,tamaño 
    $pdf->Cell(99,5,'',1,0,'L',1); 
    $pdf->Cell(99,5,'',1,1,'L',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(99,5,'Telefono de Trabajo',1,0,'L',0); 
    $pdf->Cell(99,5,'Extension',1,1,'L',0);
     

    $pdf->AddPage('P','letter',0);
    $pdf->SetFont('Arial','B',8);//Fuente,negrita,tamaño
    $pdf->Ln(30);
    $pdf->Cell(198,12,utf8_decode('FOTOGRAFÍAS DEL O LA DERECHOHABIENTE,CÓNYUGE(PADRE,MADRES) Y PERSONA AUTORIZADA PARA RECOGER AL NIÑO O A LA NIÑA'),0,1,'C');
    $pdf->Ln(10);
    $pdf->Cell(25,30,'',0,0,'C');
    $pdf->Cell(30,30,'Foto',1,0,'C');
    $pdf->Cell(30,30,'',0,0,'C');
    $pdf->Cell(30,30,'Foto',1,0,'C');
    $pdf->Cell(30,30,'',0,0,'C');
    $pdf->Cell(30,30,'Foto',1,1,'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',12);//Fuente,negrita,tamaño 
    $pdf->Cell(25,5,'',0,0,'C');
    $pdf->Cell(30,5,'DERECHOHABIENTE',0,0,'C');
    $pdf->Cell(30,5,'',0,0,'C');
    $pdf->Cell(30,5,utf8_decode('CÓNYUGE'),0,0,'C');
    $pdf->Cell(30,5,'',0,0,'C');
    $pdf->Cell(30,5,'PERSONA AUTORIZADA',0,1,'C');
    $pdf->Cell(25,5,'',0,0,'C');
    $pdf->Cell(30,5,'',0,0,'C');
    $pdf->Cell(30,5,'',0,0,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);//Fuente,negrita,tamaño
    $pdf->Cell(198,12,utf8_decode('Presentarse el día'),0,1,'L');
    $pdf->Cell(66,12,utf8_decode('Ciudad de México a '),0,0,'R');
    $pdf->Cell(14,12,'',0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,'',0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,'',0,1,'C',1);
    $pdf->Cell(198,12,utf8_decode('A las:'),0,1,'L');
    $pdf->Cell(66,12,'',0,0,'C',0);
    $pdf->Cell(66,12,'',0,0,'C',1);
    $pdf->Cell(66,12,'Hrs.',0,1,'L',0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);//Fuente,negrita,tamaño
    $pdf->Cell(198,12,utf8_decode('Expedido el día:'),0,1,'L');
    $pdf->Cell(66,12,utf8_decode('Ciudad de México a '),0,0,'R');
    $pdf->Cell(14,12,'',0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,'',0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,'',0,1,'C',1);
    $pdf->Ln(10);
    $pdf->Cell(66,12,'',0,0,'C',0);
    $pdf->Cell(66,12,'','B',1,'C',1);
    $pdf->Cell(66,12,'',0,0,'C',0);
    $pdf->Cell(66,12,'Nombre y Firma del derechohabiente',0,1,'C',0);
    $pdf->AliasNbPages();
    
    $pdf->Output('D','Ficha_de_inscripcion.pdf');
 ?>