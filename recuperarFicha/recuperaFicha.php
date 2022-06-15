<?php
include '../conexion.php';
$folio=$_POST["folio"];
$sql="SELECT folio FROM MORRO where folio=$folio";
$result=mysqli_query($conexion, $sql);
$row=mysqli_fetch_assoc($result);
// echo $folio;
if($result->num_rows > 0){
    echo TRUE;
}else{
    echo FALSE;
}
?>