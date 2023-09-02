<?php
    include('librerias/conexion.php');

    // Consultas de datos
    $sqlTipoDocumento= "SELECT * FROM registropersonas.tipodocumento";
    $sqlMunicipioNacimiento= "SELECT * FROM registropersonas.municipio";

    $personaId=$_GET['personaId'];
    $sqlPersona="SELECT * FROM persona WHERE personaId=:personaId;";
    $values = array(
        ':personaId' => $personaId,
    );

    
    // Conexion a la base de datos
    $conexion= new conexion();

    // Metodos de la clase
    

    $resultadoIdentificacion= $conexion->consulta($sqlTipoDocumento);
    $resultadoMunicipioNacimiento= $conexion->consulta($sqlMunicipioNacimiento);
    $resultadoIndividual= $conexion->consultaValor($sqlPersona, $values);
    
    foreach($resultadoIndividual as $filaIndividual){
        $personaId= $filaIndividual['personaId'];
        $tipoDocumento= $filaIndividual['tipoDocumentoId'];
        $numeroDocumento= $filaIndividual['personaNumeroDocumento'];
        $primerNombre= $filaIndividual['personaPrimerNombre'];
        $segundoNombre= $filaIndividual['personaSegundoNombre'];
        $primerApellido= $filaIndividual['personaPrimerApellido'];
        $segundoApellido= $filaIndividual['personaSegundoApellido'];
        $fechaNacimiento= $filaIndividual['personaFechaNacimiento'];
        $telfonoPersona= $filaIndividual['personaTelefonoContacto'];
        $correoElectronico= $filaIndividual['personaCorreoElectronico'];
        $municipioNacimiento= $filaIndividual['personaMunicipioNacimiento'];
        $municipioResidencia= $filaIndividual['municipioId'];

        if($segundoNombre == ""){
            $segundoNombre = "N-A";
        }
        
    }

    foreach($resultadoIdentificacion as $filaTipoDocumento){
        $resultadoId= $filaTipoDocumento['tipoDocumentoId'];
        $resultadoNombreIdentificacion= $filaTipoDocumento['tipoDocumentoNombre'];
        $resultadoSigla= $filaTipoDocumento['tipoDocumentoSigla'];
    }

    foreach( $resultadoMunicipioNacimiento as $filaMunicipioNacimiento){
        $resultadoMunicipioId= $filaMunicipioNacimiento['municipioId'];
        $resultadoMunicipioNombre= $filaMunicipioNacimiento['municipioNombre'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> REGISTRO PERSONA </title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <!-- favicon -->
    <link rel="icon" href="img/favicon/nota.icon">
</head>
<body>
    <div class="container">
        <form action="librerias/eliminacion.php" method="post">
            <div class="col-12 row">
                <div class="col-3">

                </div>
                <div class="col-6">
                    <div class= "col-12">
                        <h5>Tipo de indentificacion:</h5>
                        <p><?php echo $resultadoNombreIdentificacion ?></p>
                    </div>
                    <div class="col-12">
                        <h5>Nombre completo:</h5>
                        <p><?php echo $primerNombre." ".$segundoNombre." ".$primerApellido." ".$segundoApellido;?></p>
                    </div>
                    <div class= "col-12">
                        <h5>Municipio de residencia: </h5>
                        <p><?php  echo $resultadoMunicipioNombre ?></p>
                    </div>
                    <div class= "col-12">
                        <h5>Fecha nacimiento: </h5>
                        <p><?php  echo $fechaNacimiento ?></p>
                    </div>
                    <div class= "col-12">
                        <h5>Telefono de persona: </h5>
                        <p><?php  echo $telfonoPersona ?></p>
                    </div>
                    <div class= "col-12">
                        <h5>Correo electronico: </h5>
                        <p><?php  echo $correoElectronico ?></p>
                    </div>
                    <div class= "col-12">
                        <!-- id del usuario -->
                        <input type="hidden" name="txtId" id="txtId" readonly value="<?php echo $personaId ?>">
                    </div>
                    <div class= "col-12">
                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i> BORRAR REGISTRO</button>
                    </div>
                </div>
            
            </div>
        </form>
        
    </div>
</body>
</html>