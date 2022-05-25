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
    $server ='localhost';
    $user='root';
    $pass='n0m3l0';
    $bd='dbtecweb';
    $conexion = new mysqli($server,$user,$pass,$bd);

    //Select del morro
    $morro ="SELECT * FROM morro";
    $res=mysqli_query($conexion,$morro);
    $datos=mysqli_fetch_assoc($res);

    //Select del CENDI
    $idcendi=$datos['CENDI_idCENDI'];
    $cendi="SELECT * FROM cendi INNER JOIN morro ON CENDI_idCENDI = idCENDI  WHERE CENDI_idCENDI = '$idcendi'";
    $rescen=mysqli_query($conexion,$cendi);
    $datoscen=mysqli_fetch_assoc($rescen);

    //Select del derechohabiente
    $der ="SELECT * FROM derechohabiente";
    $resd=mysqli_query($conexion,$der);
    $datosd=mysqli_fetch_assoc($resd);

    //Select del conyuge
    $con ="SELECT * FROM conyuge";
    $resc=mysqli_query($conexion,$con);
    $datosc=mysqli_fetch_assoc($resc);
    $idg=$datos['GRUPO_idGRUPO'];

    //Select del grupo
    $gr="SELECT * FROM grupo INNER JOIN morro ON GRUPO_idGRUPO = idGRUPO WHERE idGRUPO = '$idg' ";
    $resg=mysqli_query($conexion,$gr);
    $datosg=mysqli_fetch_assoc($resg);

    //Select de la direccion derechohabiente
    $idd=$datosd['sepomex_id'];
    $dir="SELECT * FROM sepomex INNER JOIN derechohabiente ON sepomex_id = id WHERE sepomex_id = '$idd' ";
    $resdir=mysqli_query($conexion,$dir);
    $datosdir=mysqli_fetch_assoc($resdir);

    //Select de la direccion conyuge
    $idy=$datosc['sepomex_id'];
    $dirc="SELECT * FROM sepomex INNER JOIN conyuge ON sepomex_id = id WHERE sepomex_id = '$idy' ";
    $resdirc=mysqli_query($conexion,$dirc);
    $datosdirc=mysqli_fetch_assoc($resdirc);

    //Select de la ocupacion
    $ido=$datosd['OCUPACION_ID'];
    $oc="SELECT ocupacion.NOM FROM ocupacion INNER JOIN derechohabiente ON OCUPACION_ID = ID WHERE OCUPACION_ID = '$ido' ";
    $resoc=mysqli_query($conexion,$oc);
    $datosoc=mysqli_fetch_assoc($resoc);

    //Select de la adscripcion
    $idad=$datosd['OCUPACION_ID'];
    $ad="SELECT * FROM adscripcion INNER JOIN derechohabiente ON  ADSCRIPCION_idADS = idADS WHERE ADSCRIPCION_idADS = '$idad' ";
    $resad=mysqli_query($conexion,$ad);
    $datosad=mysqli_fetch_assoc($resad);

    //Select del horario de trabajo
    $idh=$datosd['HORARIO_idHORARIO'];
    $hor="SELECT * FROM horario INNER JOIN derechohabiente ON  HORARIO_idHORARIO =idHORARIO  WHERE HORARIO_idHORARIO = '$idh' ";
    $resh=mysqli_query($conexion,$hor);
    $datosh=mysqli_fetch_assoc($resh);

    //Select del horario de entrevista
    $iden=$datos['ENTREVISTA_idENTREVISTA'];
    $ent="SELECT * FROM entrevista INNER JOIN morro ON  ENTREVISTA_idENTREVISTA=idENTREVISTA  WHERE ENTREVISTA_idENTREVISTA = '$iden' ";
    $resent=mysqli_query($conexion,$ent);
    $datoent=mysqli_fetch_assoc($resent);

    //Select del horario de CITA
   /* $idcit=$datos['CITAS_idCITAS'];
    $cit="SELECT * FROM citas INNER JOIN morro ON  CITAS_idCITAS=idCITAS  WHERE CITAS_idCITAS = '$idcit' ";
    $rescit=mysqli_query($conexion,$cit);
    $datocit=mysqli_fetch_assoc($rescit);*/

   //Encabezado
    class PDF extends FPDF{
        function Header(){
            $this->Image('img/Lsep.png',10,10,40,0,'');
            $this->Image('img/Lipn.png',55,9,60,0,'');
            $this->Image('img/Lcdmx.png',150,10,60,20,'');
            
        }
    //Pie de pagina    
        function Footer(){
            $this->SetY(-18); //LA ordenada
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
            $this->SetFont('Arial','I',10);
            
        }
    }

    $pdf = new PDF('P','mm','letter');
    $pdf->SetFillColor(221,228,255);
    $pdf->AddPage('P','letter',0);
    $pdf->SetFont('Arial','B',15);
    $pdf->Ln(15);

    // Inicio del doc
    $pdf->Cell(198,12,utf8_decode('FICHA DE INSCRIPCIÓN'),0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(165,30,utf8_decode('CICLO ESCOLAR: 2022-2023'),0,0,'C');
    $pdf->Cell(30,30,$pdf->Image('img/'.$datos["FOTO"],175,37,30,0,''),1,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(150,12,utf8_decode('CENDI:')." ".$datoscen["NOMBRE"],0,0,'C');  
    $pdf->Cell(15,10,'Folio:',1,0,'C');
    $pdf->Cell(30,10,utf8_decode($datos["FOLIO"]),1,1,'C'); 
    $pdf->Cell(150,10,'',0,0,'C');
    $pdf->Cell(15,10,utf8_decode('Grupo:'),1,0,'C');
    $pdf->Cell(30,10,utf8_decode($datosg["NOMBRE"]),1,1,'C');  
    // Fin primera seccion

    //Inicio seccion datos del niño o niña
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(66,7,utf8_decode('DATOS DEL NIÑO O DE LA NIÑA:'),0,1,'L'); 
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(66,5,$datos["APE_PAT"],1,0,'C',1); 
    $pdf->Cell(66,5,$datos["APE_MAT"],1,0,'C',1); 
    $pdf->Cell(66,5,$datos["NOM"],1,1,'C',1);  
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(66,5,'Primer Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Segundo Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Nombre(s)',1,1,'C',0);
    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(66,5,$datos["FECHAN"],1,0,'C',1); 
    $pdf->Cell(66,5,$datos["EDAD"],1,0,'C',1); 
    $pdf->Cell(66,5,$datos["CURP"],1,1,'C',1);
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(66,5,'Fecha de Nacimiento:',1,0,'C',0); 
    $pdf->Cell(66,5,'Edad:',1,0,'C',0); 
    $pdf->Cell(66,5,'CURP:',1,1,'C',0);
    // Fin seccion del niño o niña

    //Inicio derechohabiente
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(66,7,utf8_decode('DATOS DEL O LA DERECHOHABIENTE:'),0,1,'L'); 
    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(66,5,utf8_decode($datosd["APE_PAT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["APE_MAT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["NOM"]),1,1,'C',1);  
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(66,5,'Primer Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Segundo Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Nombre(s)',1,1,'C',0);

    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(33,5,utf8_decode($datosdir["cp"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosdir["estado"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosdir["municipio"]),1,0,'C',1);
    $pdf->Cell(33,5,utf8_decode($datosdir["asentamiento"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["CALLE"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(33,5,'C.P.',1,0,'C',0); 
    $pdf->Cell(33,5,'Entidad',1,0,'C',0); 
    $pdf->Cell(33,5,'Alcaldia',1,0,'C',0);
    $pdf->Cell(33,5,'Colonia',1,0,'C',0); 
    $pdf->Cell(66,5,'Calle',1,1,'C',0);

    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(33,5,utf8_decode($datosd["NUM_EXT"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosd["NUM_INT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["TELF"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["TELC"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(33,5,utf8_decode('N°Ext.'),1,0,'C',0); 
    $pdf->Cell(33,5,utf8_decode('N°int.'),1,0,'C',0);
    $pdf->Cell(66,5,utf8_decode('Teléfono Fijo'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Teléfono Celular'),1,1,'C',0);

    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(66,5,utf8_decode($datosd["MAIL"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosoc["NOM"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["CURP"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(66,5,utf8_decode('Correo Electrónico'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Ocupación'),1,0,'C',0);
    $pdf->Cell(66,5,'CURP',1,1,'C',0); 

    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(66,5,utf8_decode($datosd["PLAZA"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["SUELDO"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosd["NUMEROE"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(66,5,utf8_decode('Puesto'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Sueldo Mensual'),1,0,'C',0);
    $pdf->Cell(66,5,utf8_decode('Número de empleado'),1,1,'C',0); 
    
    $pdf->SetFont('Arial','B',10);  
    $pdf->Cell(198,5,utf8_decode($datosad["NOMBRE_ESC"]),1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(198,5,utf8_decode('Adscripción'),1,1,'C',0); 
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(132,5,utf8_decode($datosh["HORA_E"]."AM - ".$datosh["HORA_S"]."PM"),1,0,'C',1);
    $pdf->Cell(66,5,utf8_decode($datosd["EXT"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(132,5,utf8_decode('Horario de trabajo'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Extensión'),1,1,'C',0);
    //FIn derechohabiente

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(66,7,utf8_decode('DATOS DEL CÓNYUGE(PADRE,MADRE):'),0,1,'L'); 
    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(66,5,utf8_decode($datosc["APE_PAT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosc["APE_MAT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosc["NOM"]),1,1,'C',1);  
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(66,5,'Primer Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Segundo Apellido',1,0,'C',0); 
    $pdf->Cell(66,5,'Nombre(s)',1,1,'C',0);
     
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(33,5,utf8_decode($datosdirc["cp"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosdirc["estado"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosdirc["municipio"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosdirc["asentamiento"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosc["CALLE"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10); 
    $pdf->Cell(33,5,'C.P.',1,0,'C',0); 
    $pdf->Cell(33,5,'Entidad',1,0,'C',0); 
    $pdf->Cell(33,5,'Alcaldia',1,0,'C',0);
    $pdf->Cell(33,5,'Colonia',1,0,'C',0); 
    $pdf->Cell(66,5,'Calle',1,1,'C',0);

    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(33,5,utf8_decode($datosc["NUM_EXT"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosc["NUM_INT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosc["TELT"]),1,0,'C',1); 
    $pdf->Cell(66,5,utf8_decode($datosc["TELC"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(33,5,utf8_decode('N°Ext.'),1,0,'C',0); 
    $pdf->Cell(33,5,utf8_decode('N°int.'),1,0,'C',0);
    $pdf->Cell(66,5,utf8_decode('Teléfono Fijo'),1,0,'C',0); 
    $pdf->Cell(66,5,utf8_decode('Teléfono Celular'),1,1,'C',0);

    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(198,5,utf8_decode($datosc["LUGART"]),1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(198,5,'Lugar de Trabajo:',1,1,'C',0);
    $pdf->SetFont('Arial','B',10);  
    $pdf->Cell(198,5,utf8_decode($datosc["DOMT"]),1,1,'C',1); 
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(198,5,'Domicilio de Trabajo:',1,1,'C',0);
    $pdf->SetFont('Arial','B',10); 
    $pdf->Cell(99,5,utf8_decode($datosc["TELT"]),1,0,'C',1); 
    $pdf->Cell(33,5,utf8_decode($datosc["EXT"]),1,0,'C',1);
    $pdf->Cell(66,5,utf8_decode($datosc["RELIGION"]),1,1,'C',1);  
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(99,5,utf8_decode('Teléfono de Trabajo'),1,0,'C',0); 
    $pdf->Cell(33,5,utf8_decode('Extensión'),1,0,'C',0);
    $pdf->Cell(66,5,utf8_decode('Religión'),1,1,'C',0);

    $pdf->AddPage('P','letter',0);
    $pdf->SetFont('Arial','B',8);
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
    $pdf->SetFont('Arial','B',12); 
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
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(198,12,utf8_decode('Presentarse el día'),0,1,'L');
    $pdf->Cell(66,12,utf8_decode('Ciudad de México a '),0,0,'R');
    $pdf->Cell(14,12,date("d")+1,0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,date("m"),0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,date("Y"),0,1,'C',1);
    $pdf->Cell(198,12,utf8_decode('A las:'),0,1,'L');
    $pdf->Cell(66,12,'',0,0,'C',0);
    $pdf->Cell(66,12,utf8_decode("Inicio: ".$datoent["INICIO"]." Fin ".$datoent["FIN"]),0,0,'C',1);
    $pdf->Cell(66,12,'Hrs.',0,1,'L',0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(198,12,utf8_decode('Expedido el día:'),0,1,'L');
    $pdf->Cell(66,12,utf8_decode('Ciudad de México a '),0,0,'R');
    $pdf->Cell(14,12,date("d")-1,0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,date("m"),0,0,'C',1);
    $pdf->Cell(15,12,utf8_decode('de'),0,0,'C');
    $pdf->Cell(25,12,date("Y"),0,1,'C',1);
    $pdf->Ln(10);
    $pdf->Cell(66,12,'',0,0,'C',0);
    $pdf->Cell(66,12,'','B',1,'C',1);
    $pdf->Cell(66,12,'',0,0,'C',0);
    $pdf->Cell(66,12,'Nombre y Firma del derechohabiente',0,1,'C',0);

    $pdf->AliasNbPages();
    
    $pdf->Output('I','Ficha_de_inscripcion.pdf');
 ?>
