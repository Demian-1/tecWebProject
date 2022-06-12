<?php
$server ='localhost';
$user='root';
$pass='';
$bd='dbtecweb';
$conexion = new mysqli($server,$user,$pass,$bd);
if(!$conexion){
    die(mysqli_error($conexion));
}


if(isset($_POST['submit'])){
    $folio=$_POST['folio'];
    header('location:../Reporte.php?folio='.$folio.'');
}



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Ficha</title>
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../styles/formulario.css">
    <link rel="icon" href="../assets/images/logo-cendi.jpg">
    <script src="js/js.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a href="../index.html" class="navbar-brand">
                    <img src="../assets/images/logo-cendi-removebg.png" alt="logo-cendi" class="d-inline-block align-text-top" width="30">
                  <span class="navbar-brand mb-0 h1">CENDI</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="../formulario.html">Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <form method="post" class="form shadow-lg" novalidate>
        <h1 class="text-center">Recupera tu ficha</h1>
        <p class="mt-4 pt-4">Si ya te registraste previamente, puedes recuperar tu ficha ingresando tu folio:</p>
        <input type="text" name="folio" id="folio" class="form-control needs-validation" maxlength="10" placeholder="Folio" required>
        <div class="invalid-feedback">Debe de tener 10 dígitos. Puede comenzar por "PE" o "PP"</div>
        
        <button type="submit" class="btn" name="submit">Submit</button>
       
     </form>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>