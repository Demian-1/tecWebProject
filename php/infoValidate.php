<?php
    $server ='localhost';
    $user='root';
    $pass='';
    $bd='dbtecweb';
    $conexion = new mysqli($server,$user,$pass,$bd);
    if(!$conexion){
        die(mysqli_error($conexion));
    }

    $folio=$_POST["folio"];
    $valid=$_POST["valid"];
    if($valid == '1'){
        $sql="SELECT folio FROM MORRO where folio=$folio";
        $result=mysqli_query($conexion, $sql);
        if(mysqli_num_rows($result) > 0){
            echo '1';
        }else{
            echo '0';
        }
    }else if($valid == '2'){
        
    }
?>