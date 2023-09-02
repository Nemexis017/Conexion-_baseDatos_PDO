<?php
    include('conexion.php');
    // include('actulizar.php');
    $conexion= new conexion();

    // $personaId=$_GET['personaId'];
    // $values = array(
    //     ':personaId' => $personaId,
    // );

    $valoresUpdate= array(
        ":idPesona"=> $_POST['txtIdPersona'],
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
    // borrar datos
    
    // ********************
    $sqlUpdate= "UPDATE `registropersonas`.`persona`
    SET
    `tipoDocumentoId` = :tipoDocumento,
    `personaNumeroDocumento` = :numeroDocumento,
    `personaPrimerNombre` = :primerNombre,
    `personaSegundoNombre` = :segundoNombre,
    `personaPrimerApellido` = :primerApellido,
    `personaSegundoApellido` = :segundoApellido,
    `municipioId` = :municipioResidencia,
    `personaMunicipioNacimiento` = :municipioNacimiento,
    `personaFechaNacimiento` = :fechaNacimiento,
    `personaTelefonoContacto` = :numeroTelefono,
    `personaCorreoElectronico` = :correoEletronico
    WHERE `personaId` = :idPesona; ";

    $conexion->ejecutar($sqlUpdate,$valoresUpdate);    
    header('Location:http://localhost/ejercicioSena/registroPersonas/');

?>