<?php
    include('librerias/conexion.php');

    // Consultas de datos
    $querySql= "SELECT * FROM persona"; 
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
    $resultado= $conexion->consulta($querySql);
    $resultadoIdentificacion= $conexion->consulta($sqlTipoDocumento);
    $resultadoMunicipioNacimiento= $conexion->consulta($sqlMunicipioNacimiento);
    $resultadoIndividual= $conexion->consultaValor($sqlPersona, $values);
    
    foreach($resultadoIndividual as $filaIndividual){
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

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
        <form action="librerias/registrar.php" method="post" class="row g-3 needs-validation" novalidate>
            <div class="col-12">
                <label for="selTipoIdentificacion" class="form-label">Tipo de Identificación</label>
                <select class="form-select" aria-label="Default select example" id="selTipoIdentificacion" name="selTipoIdentificacion" required>
                    <option value="" selected>Seleccione...</option>
                        <?php
                            foreach($resultadoIdentificacion as $filaTipoDocumento){
                                $resultadoId= $filaTipoDocumento['tipoDocumentoId'];
                                $resultadoNombreIdentificacion= $filaTipoDocumento['tipoDocumentoNombre'];
                                $resultadoSigla= $filaTipoDocumento['tipoDocumentoSigla'];

                                if($tipoDocumento == $resultadoId){
                                    $seledOption= "selected";
                                }else{
                                    $seledOption= "";
                                }

                                echo '<option value="'.$resultadoId.'"'.$seledOption.'>'.$resultadoNombreIdentificacion.'</option>';
                            }
                        ?>
                </select>
            </div>            
            <div class="col-12">
                <label for="txtIdentificacion" class="form-label">Identificación</label>
                <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" value="<?php echo $numeroDocumento?>" required>
                <div class="valid-feedback">
                    Digitar el numero de Indentificacion
                </div>
            </div>
            <div class="col-12">
                <label for="txtPrimerNombre" class="form-label">Primer nombre</label>
                <input type="text" class="form-control" id="txtPrimerNombre" name="txtPrimerNombre" value="<?php echo $primerNombre ?>" required>
                <div class="valid-feedback">
                    Digitar el primer nombre
                </div>
            </div>
            <div class="col-12">
                <label for="txtNombres" class="form-label">Segundo nombre</label>
                <input type="text" class="form-control" id="txtSegundoNombre" name="txtSegundoNombre" value="<?php echo $segundoNombre ?>" required>
                <div class="valid-feedback">
                    Digitar el segundo nombre
                </div>
            </div>  
            <div class="col-12">
                <label for="txtPrimerApellido" class="form-label">Primer apellido</label>
                <input type="text" class="form-control" id="txtPrimerApellido" name="txtPrimerApellido" value="<?php echo $primerApellido ?>" required>
                <div class="valid-feedback">
                    Digitar el primer apellido
                </div>
            </div>
            <div class="col-12">
                <label for="txtSegundoApellido" class="form-label">Segundo apellido</label>
                <input type="text" class="form-control" id="txtSegundoApellido" name="txtSegundoApellido" value="<?php echo $segundoApellido ?>" required>
                <div class="valid-feedback">
                    Digitar el segundo apellido
                </div>
            </div>
            <div class="col-12">
                <label for="selFechaNacimiento" class="form-label">Fecha Nacimieto</label>
                <input type="date" class="form-control" id="selFechaNacimiento" name="selFechaNacimiento" value="<?php echo $fechaNacimiento ?>" required>
                <div class="valid-feedback">
                    Seleccione la fecha de nacimiento
                </div>
            </div>
            <div class="col-12">
                <label for="txtTelefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $telfonoPersona ?>" required>
                <div class="valid-feedback">
                    Digitar el telefono
                </div>
            </div>
            <div class="col-12">
                <label for="txtCorreoEletronico" class="form-label">Correo Eletronico</label>
                <input type="text" class="form-control" id="txtCorreoEletronico" name="txtCorreoEletronico" value="<?php echo $correoElectronico ?>" required>
                <div class="valid-feedback">
                    Digitar el correo eletronico
                </div>
            </div>
            <div class="col-12">
                <label for="selMunicipioNacimiento" class="form-label">Municipio Nacimiento</label>
                <select class="form-select" aria-label="Default select example" id="selMunicipioNacimiento" name="selMunicipioNacimiento" required>
                    <option value="" selected>Seleccione...</option>
                        <?php
                            foreach( $resultadoMunicipioNacimiento as $filaMunicipioNacimiento){
                                $resultadoMunicipioId= $filaMunicipioNacimiento['municipioId'];
                                $resultadoMunicipioNombre= $filaMunicipioNacimiento['municipioNombre'];

                                if($municipioNacimiento == $resultadoMunicipioId){
                                    $seledOptMunicipio= "selected";
                                }
                                else{
                                    $seledOptMunicipio="";
                                }

                                echo   '<option value="'.$resultadoMunicipioId.'" '.$seledOptMunicipio.'>'.$resultadoMunicipioNombre.'</option>';
                            }
                        ?>
                </select>
            </div>
            <div class="col-12">
                <label for="setMunicipioResidencia" class="form-label">Municipio Residencia </label>
                <select class="form-select" aria-label="Default select example" id="setMunicipioResidencia"name="setMunicipioResidencia" required>
                    <option value="" selected>Seleccione...</option>
                        <?php
                            foreach( $resultadoMunicipioNacimiento as $filaMunicipioNacimiento){
                                $resultadoMunicipioId= $filaMunicipioNacimiento['municipioId'];
                                $resultadoMunicipioNombre= $filaMunicipioNacimiento['municipioNombre'];

                                if($municipioResidencia == $resultadoMunicipioId){
                                    $seledOptMunicipio= "selected";
                                }
                                else{
                                    $seledOptMunicipio="";
                                }

                                echo  '<option value="'.$resultadoMunicipioId.'" '.$seledOptMunicipio.'>'.$resultadoMunicipioNombre.'</option>';
                            }
                                
                        ?>
                </select>
            </div>                        
            <button type="submit" class="btn btn-primary"> <i class="fa-regular fa-floppy-disk"></i>Guardar</button>
        </form>
    </div>


    <script src="js/validacion.js"></script>
    <script src="js/confirmacion.js"></script>
    <!-- <script src="js/jquery-3.6.4.min.js"></script> -->
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>