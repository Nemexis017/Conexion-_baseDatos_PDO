<?php
    include('conexion.php');

    $conexion= new conexion();

    // echo $tipoDocumento = $_POST['selTipoIdentificacion']."</br>";
    // echo $numeroDocumento = $_POST['txtIdentificacion']."</br>";
    // echo $primerNombre = $_POST['txtPrimerNombre']."</br>";
    // echo $segundoNombre = $_POST['txtSegundoNombre']."</br>";
    // echo $primerApellido = $_POST['txtPrimerApellido']."</br>";
    // echo $segundoApellido = $_POST['txtSegundoApellido']."</br>";
    // echo $fechaNacimiento = $_POST['selFechaNacimiento']."</br>";
    // echo $numeroTelefono = $_POST['txtTelefono']."</br>";
    // echo $correoEletronico = $_POST['txtCorreoEletronico']."</br>";
    // echo $municipioNacimiento = $_POST['selMunicipioNacimiento']."</br>";
    // echo $municipioResidencia = $_POST['setMunicipioResidencia']."</br>";

    $values= array(
        ":tipoDocumento" => $_POST['selTipoIdentificacion'],
        ":numeroDocumento" => $_POST['txtIdentificacion'],
        ":primerNombre" => $_POST['txtPrimerNombre'],
        ":segundoNombre" => $_POST['txtSegundoNombre'],
        ":primerApellido" => $_POST['txtPrimerApellido'],
        ":segundoApellido" => $_POST['txtSegundoApellido'],
        ":municipioResidencia" => $_POST['setMunicipioResidencia'],
        ":municipioNacimiento" => $_POST['selMunicipioNacimiento'],
        ":fechaNacimiento" => $_POST['selFechaNacimiento'],
        ":numeroTelefono" => $_POST['txtTelefono'],
        ":correoEletronico" => $_POST['txtCorreoEletronico'],
        
    );
    
    $sqlInsert= 
    "INSERT INTO `registropersonas`.`persona`
    (
    `tipoDocumentoId`,
    `personaNumeroDocumento`,
    `personaPrimerNombre`,
    `personaSegundoNombre`,
    `personaPrimerApellido`,
    `personaSegundoApellido`,
    `municipioId`,
    `personaMunicipioNacimiento`,
    `personaFechaNacimiento`,
    `personaTelefonoContacto`,
    `personaCorreoElectronico`)
    VALUES
    (
        :tipoDocumento,
        :numeroDocumento,
        :primerNombre,
        :segundoNombre,
        :primerApellido,
        :segundoApellido,
        :municipioResidencia,
        :municipioNacimiento,
        :fechaNacimiento,
        :numeroTelefono,
        :correoEletronico
    )"; 

    $conexion->ejecutar($sqlInsert,$values);
    header('Location:http://localhost/ejercicioSena/registroPersonas/');

    
?>