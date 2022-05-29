<?php
	$nuevaURL="CRUDO.phs";
	$mysqli = new mysqli("localhost", "root", "", "dbtecweb");
	if ($mysqli->connect_errno) {
    	echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}else{
		echo "coneccion exitosa";
	}
	$FOLIO = $_POST['fol']; 
	$sql = "DELETE FROM MORRO WHERE FOLIO = " . $FOLIO;
	echo "<a href='CRUDO.phs.php' >".$sql."</a>";
	/*$result=$mysqli->query($sql);*/ /*esta es la sentencia que borra al morro */
	if($result>0){ /*no error*/
		echo "morro borrado de la existencia";
	}else{ /*error*/
		echo "el morro aun vive";
	}
	/*redireccionar a la primera pagina del CRUD*/
	Header("Location: $nuevaURL.php");
	die();
?>