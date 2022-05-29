<?php
    
    $fol = $_POST['fol']; 
    $mysqli = new mysqli("localhost", "root", "", "dbtecweb");
	if ($mysqli->connect_errno) {
    	echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}else{
		echo "coneccion exitosa <br/>";
	}
    $sql = "SELECT * FROM MORRO where FOLIO = $fol";
	$result = $mysqli->query($sql);
	echo "modificando $fol <br/>";
	echo $result;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" type="text/css" href="styles/formulario.css">
    <script src="js/js.js" defer></script>
</head>
<body>
    <form action="respuesta.html" class="form">
        <h1 class="text-center">Registro 2022-2023</h1>
            <!-- Barra de progreso -->
            <div class="progressbar">
                <div class="progress" id="progress"></div>  
                <div class="progress-step progress-step-active" data-title="Básico"></div>
                <div class="progress-step" data-title="Niña/Niño"></div>
                <div class="progress-step" data-title="Derechohabiente"></div>
                <div class="progress-step" data-title="Cónyuge"></div>
            </div>
            <!-- Forms -->
        <div class="form-step form-step-active">
            <h2 class="text-center">Datos basicos</h2>
            <input type="text" name="ciclo_escolar" id="ciclo_escolar" value="2022-2023" disabled="true">
            <select name="CENDI" id="CENDI">
                <option selected disabled>CENDI</option>
                <option value="Cardenas">CENDI Amalia Solórzano de Cárdenas</option>
                <option value="Bassols">CENDI Clementina Batalla de Bassols</option>
                <option value="LopezMateos">CENDI Eva Sámano de López Mateos</option>
                <option value="Batiz">CENDI Laura Pérez de Bátiz</option>
                <option value="Erro">CENDI Margarita Salazar de Erro</option>
            </select>
            <label for="foto">Foto</label>
            <input id="foto" name="foto" type="file">
            <input type="number" name="folio" id="folio" placeholder="Folio">
            <input type="text" name="grupo" id="grupo" placeholder="Grupo">
            <a href="#" class="btn btn-nxt width-50 ml-auto" id="test2">Siguiente</a>
        </div>
        <div class="form-step" id="test">
            <h2 class="text-center">Datos del niño o de la niña</h2>  
            <input type="text" name="kid_apellido_pat" id="kid_apellido_pat" placeholder="Apellido paterno">
            <input type="text" name="kid_apellido_mat" id="kid_apellido_mat" placeholder="Apellido materno">
            <input type="text" name="kid_nombres" id="kid_nombres" placeholder="Nombre(s)">
            <label for="kid_birthday">Fecha de nacimiento</label>
            <input type="date" name="kid_birthday" id="kid_birthday" onblur="calcularEdad()">
            <input type="number" name="kid_age" id="kid_age" disabled="true" placeholder="Edad">
            <input type="text" name="kid_CURP" id="kid_CURP" placeholder="CURP">
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <a href="#" class="btn btn-nxt">Siguiente</a>
            </div>
        </div>
        <div class="form-step">
            <h2 class="text-center">Datos del o la derechohabiente</h2>  
            <input type="text" name="der_apellido_pat" id="der_apellido_pat" placeholder="Apellido paterno" >
            <input type="text" name="der_apellido_mat" id="der_apellido_mat" placeholder="Apellido materno" >
            <label></label>
            <input type="text" name="der_nombres" id="der_nombres" placeholder="Nombre(s)" >
            <div id="der_domicilio">
                <input type="number" name="der_cp" id="der_cp" / placeholder="Código postal">
                <input type="text" name="der_entidad" id="der_entidad" placeholder="Entidad" disabled > <!-- Aqui se pondran automaticamente en base al CP -->
                <input type="text" name="der_alcaldia" id="der_alcaldia" placeholder="Alcaldia" disabled>
                <input type="text" name="der_colonia" id="der_colonia" placeholder="Colonia" disabled >
                <input type="text" name="der_calle" id="der_calle" placeholder="Calle" />
                <input type="number" name="der_numExt" id="der_numExt" placeholder="Número exterior">
                <input type="number" name="der_numInt" id="der_numInt" placeholder="Número interior">
                <input type="tel" name="der_tel_fijo" id="der_tel_fijo" placeholder="Número telefónico fijo">
                <input type="tel" name="der_tel_celular" id="der_tel_celular" placeholder="Número celular">
            </div>
            <input type="email" name="der_email" id="der_email" placeholder="Correo electrónico">
            <select name="der_opcupacion" id="der_ocupacion">
                <option selected disabled>Ocupacion</option>
                <option value="der_docente">Docente</option>
                <option value="der_PAAE">PAEE</option>
                <option value="der_funcionari">Funcionario(a)</option>
            </select>
            <input type="text" name="der_CURP" id="der_CURP" placeholder="CURP">
            <input type="text" name="der_plaza" id="der_plaza" placeholder="Nombre de la plaza o puesto">
            <input type="number" name="der_sueldo" id="der_sueldo" placeholder="Sueldo (MXN)">
            <input type="text" name="der_numEmpleado" id="der_numEmpleado" placeholder="Número de empleado">
            <div id="der_horario">
                <label for="der_horario_inicio">Entrada: </label>
                <input type="time" name="der_horario_inicio" id="der_horario_inicio">
                <label for="der_horario_fin">Salida: </label>
                <input type="time" name="der_horario_fin" id="der_horario_fin">
            </div>
            <input type="number" name="der_extension" id="der_extension" placeholder="Extension">
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <a href="#" class="btn btn-nxt">Siguiente</a>
            </div>
        </div>
        <div class="form-step">
            <h2 class="text-center">Datos del cónyuge</h2>  
            <input type="text" name="cony_apellido_pat" id="cony_apellido_pat" placeholder="Apellido paterno">
            <input type="text" name="cony_apellido_mat" id="cony_apellido_mat" placeholder="Apellido materno">
            <input type="text" name="cony_nombres" id="cony_nombres" placeholder="Nombre(s)">
            <div id="cony_domicilio">
                <p>Domicilio:</p>
                <input type="number" name="cony_cp" id="cony_cp" placeholder="Código postal">
                <input type="text" name="cony_entidad" id="cony_entidad" placeholder="Entidad" disabled="true">
                <input type="text" name="cony_alcaldia" id="cony_alcaldia" placeholder="Alcaldia/Municipio" disabled="true">
                <input type="text" name="cony_colonia" id="cony_colonia" placeholder="Colonia" disabled="true">
                <input type="text" name="cony_calle" id="cony_calle" placeholder="Calle" disabled="true" />
                <input type="number" name="cony_numExt" id="cony_numExt" placeholder="Número exterior">
                <input type="number" name="cony_numInt" id="cony_numInt" placeholder="Número interior">
                <input type="tel" name="cony_tel_fijo" id="cony_tel_fijo" placeholder="55-1234-5678" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}">
                <input type="tel" name="cony_tel_celular" id="cony_tel_celular" placeholder="55-1234-5678" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}">
            </div>
            <input type="text" name="cony_lugar_trabajo" id="cony_lugar_trabajo" placeholder="Lugar de Trabajo">
            <input type="text" name="cony_domicilio_trabajo" id="cony_domicilio_trabajo" placeholder="Domicilio de trabajo">
            <input type="tel" name="cony_tel_trabajo" id="cony_tel_trabajo" placeholder="55-1234-5678" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}">
            <input type="tel" name="cony_tel_trabajo_ext" id="cony_tel_trabajo_ext" placeholder="1234" pattern="[0-9]{4}">
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Anterior</a>
                <input type="submit" value="Finalizar" class="btn">
            </div>
        </div>
     </form>
</body>
</html>