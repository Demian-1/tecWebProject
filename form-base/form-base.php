<?php

    include '../conexion.php';

    // Niño datos:

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

    // Derechohabiente datos:

    $der_apellido_pat=$_POST['der_apellido_pat'];
    $der_apellido_mat=$_POST['der_apellido_mat'];
    $der_nombres=$_POST['der_nombres'];
    $der_cp=$_POST['der_cp'];
    $der_entidad=$_POST['der_entidad'];
    $der_alcaldia=$_POST['der_alcaldia'];
    $der_colonia=$_POST['der_colonia'];
    $der_calle=$_POST['der_calle'];
    $der_numExt=$_POST['der_numExt'];
    $der_numInt=$_POST['der_numInt'];
    $der_tel_fijo=$_POST['der_tel_fijo'];
    $der_tel_celular=$_POST['der_tel_celular'];
    $der_email=$_POST['der_email'];
    $der_CURP=$_POST['der_CURP'];
    $der_ocupacion=$_POST['der_ocupacion'];
    $der_plaza=$_POST['der_plaza'];
    $der_sueldo=$_POST['der_sueldo'];
    $der_numEmpleado=$_POST['der_numEmpleado'];
    $der_adscripcion=$_POST['der_adscripcion'];
    $der_jefe=$_POST['der_jefe'];
    $der_jefe_puesto=$_POST['der_jefe_puesto'];
    $der_horario=$_POST['der_horario'];
    $der_extension=$_POST['der_extension'];

    $sql_n="INSERT INTO `DBTECWEB`.`MORRO` (`FOLIO`, `CENDI_idCENDI`, `APE_PAT`, `APE_MAT`, `NOM_M`, `FECHAN`, `EDAD`, `CURP`, `FOTO_M`, `2PADRES`, `CITAS_idCITAS`, `ENTREVISTA_idENTREVISTA`, `GRUPO_idGRUPO`) VALUES ('$folio', '$cendi', '$kid_apellido_pat', '$kid_apellido_mat', '$kid_nombres', '$kid_birthday', '$kid_age', '$kid_CURP', '$kid_foto', '$kid_dos_padres', '$kid_cita', '$kid_entrevista', '$kid_grupo')";
    $sql_d="INSERT INTO `DBTECWEB`.`DERECHOHABIENTE` (`MORRO_Boleta_D`, `APE_PAT_D`, `APE_MAT_D`,`FOTO_D`, `NOM_D`,`AUT_D`,`FOTOA_D`, `NUM_EXT_D`, `NUM_INT_D`, `CALLE_D`, `TELF_D`, `TELC_D`, `MAIL_D`, `OCUPACION_ID`, `CURP_D`, `PLAZA_D`, `SUELDO_D`, `NUMEROE_D`, `ADSCRIPCION_idADS`, `NOMJEFE_D`, `CARGOJEFE_D`, `HORARIO_idHORARIO`, `EXT_D`, `COLONIA_D`, `MUNICIPIO_D`, `ESTADO_D`, `CP_D`) VALUES ('$folio', '$der_apellido_pat', '$der_apellido_mat','default.png', '$der_nombres',1,'default.png','$der_numExt','$der_numInt', '$der_calle', '$der_tel_fijo', '$der_tel_celular', '$der_email', '$der_ocupacion', '$der_CURP', '$der_plaza', '$der_sueldo', '$der_numEmpleado', '$der_adscripcion', '$der_jefe', '$der_jefe_puesto', '$der_horario', '$der_extension', '$der_colonia', '$der_alcaldia', '$der_entidad', '$der_cp')";

    $res_n = mysqli_query($conexion,$sql_n);
    echo mysqli_query($conexion,$sql_d);


?>