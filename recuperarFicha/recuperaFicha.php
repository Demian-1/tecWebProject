<?php
include '../conexion.php';
$folio=$_POST["folio"];
$sql="SELECT folio FROM MORRO where folio=$folio";
$result=mysqli_query($conexion, $sql);
$row=$row=mysqli_fetch_assoc($result);
// echo $row['folio'];
if(is_null($row)){
    echo FALSE;
}else{
    echo TRUE;
}
?>