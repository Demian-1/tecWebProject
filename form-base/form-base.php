<?php

    include '../conexion.php';

    $folio=$_POST['folio'];
    $cendi=$_POST['cendi'];
    $kid_apellido_pat=$_POST['kid_apellido_pat'];
    $kid_apellido_mat=$_POST['kid_apellido_mat'];
    $kid_nombres=$_POST['kid_nombres'];
    $kid_birthday=$_POST['kid_birthday'];
    $kid_age=$_POST['kid_age'];
    $kid_CURP=$_POST['kid_CURP'];
    $kid_foto=$_POST['kid_foto'];
    $kid_dos_padres=$_POST['kid_dos_padres'];
    $kid_cita=$_POST['kid_cita'];
    $kid_entrevista=$_POST['kid_entrevista'];
    $kid_grupo=$_POST['kid_grupo'];

    $sql="INSERT INTO `DBTECWEB`.`MORRO` (`FOLIO`, `CENDI_idCENDI`, `APE_PAT`, `APE_MAT`, `NOM_M`, `FECHAN`, `EDAD`, `CURP`, `FOTO_M`, `2PADRES`, `CITAS_idCITAS`, `ENTREVISTA_idENTREVISTA`, `GRUPO_idGRUPO`) VALUES ('$folio', '$cendi', '$kid_apellido_pat', '$kid_apellido_mat', '$kid_nombres', '$kid_birthday', '$kid_age', '$kid_CURP', '$kid_foto', '$kid_dos_padres', '$kid_cita', '$kid_entrevista', '$kid_grupo')";

    echo mysqli_query($conexion,$sql);

?>