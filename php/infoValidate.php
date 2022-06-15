<?php
    include '../conexion.php';

    $valid=$_POST["valid"];
    if($valid == '1'){
        $folio=$_POST["folio"];
        $sql="SELECT folio FROM MORRO where folio=$folio";
        $result=mysqli_query($conexion, $sql);
        if(mysqli_num_rows($result) > 0){
            echo '1';
        }else{
            echo '0';
        }
    }else if($valid == '2'){
        $group=$_POST["group"];
        $sql="SELECT LUGARES FROM grupo where idGRUPO=$group";
        $result=mysqli_query($conexion,$sql);
        $row = mysqli_fetch_row($result);
        if($row[0]>0){
            echo '1'; // Hay suficientes lugares
        }else{
            echo '0';
        }
    }else if($valid == '3'){
        
    }
?>