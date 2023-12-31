<?php
    include('librerias/conexion.php');
    // include('librerias/busqueda.php');

    // busqueda de persona
    $consulta= ""; 
    if(isset($_GET['txtConsultaPersona'])){
        $consulta= " WHERE personaPrimerNombre like'%".$_GET['txtConsultaPersona']."%'"; 
    }

    // Consultas de datos
    $querySql= "SELECT * FROM persona". $consulta; 
    $sqlTipoDocumento= "SELECT * FROM registropersonas.tipodocumento";
    $sqlMunicipioNacimiento= "SELECT * FROM registropersonas.municipio";

    // Conexion a la base de datos
    $conexion= new conexion();

    // Metodos de la clase
    $resultado= $conexion->consulta($querySql);
    $resultadoIdentificacion= $conexion->consulta($sqlTipoDocumento);
    $resultadoMunicipioNacimiento= $conexion->consulta($sqlMunicipioNacimiento);
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
    <div class="container-fluid">
        <div class="row border-botton">
            <div class="col-4 titulo">
                <h4>Base de datos: ADM</h4>
            </div>
            <div class="col-3"></div>
            <div class="col-5 busquedaNavegacion">
                <form class="d-flex" role="search" method="post">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="buscadorN">
                    <label for="buscadorN"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></label>
                </form>
            </div>
        </div>
        
    </div>
    <div class="container-xxl">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Numero Documento</th>
                    <th scope="col">Nombre</th>
                    <!-- <th scope="col">Nombre N°2</th> -->
                    <th scope="col">Apellido</th>
                    <th scope="col">Apellido N°2</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Numero de telefono</th>
                    <th scope="col">Correo electronico</th>
                </tr>
            </thead>
            <tbody id="tablaQuery">
                <?php
                    $numero=1;
                    foreach($resultado as $fila){
                        $personaId= $fila['personaId'];
                        // $tipoDocumentoId= $fila['tipoDocumentoId'];
                        $personaNumeroDocumento= $fila['personaNumeroDocumento'];
                        $personaPrimerNombre= $fila['personaPrimerNombre'];
                        $personaSegundoNombre= $fila['personaSegundoNombre'];
                        $personaPrimerApellido= $fila['personaPrimerApellido'];
                        $personaSegundoApellido= $fila['personaSegundoApellido'];
                        $personaFechaNacimiento= $fila['personaFechaNacimiento'];
                        $personaTelefonoContacto= $fila['personaTelefonoContacto'];
                        $personaCorreoElectronico= $fila['personaCorreoElectronico'];

                        if($personaSegundoNombre == ""){
                            $personaSegundoNombre = "N-A";
                        }

                        echo "<tr >";
                            echo "<th scope='row'  >".$numero."</th>";
                            // echo "<td>".$tipoDocumentoId."</td>";
                            echo "<td>".$personaNumeroDocumento."</td>";
                            echo "<td>".$personaPrimerNombre."</td>";
                            // echo "<td>".$personaSegundoNombre."</td>";
                            echo "<td>".$personaPrimerApellido."</td>";
                            echo "<td>".$personaSegundoApellido."</td>";
                            echo "<td>".$personaFechaNacimiento."</td>";
                            echo "<td>".$personaTelefonoContacto."</td>";
                            echo "<td>".$personaCorreoElectronico."</td>";
                            echo "<td>
                                    <a href='actulizar.php?personaId=".$personaId."' >
                                        <i class='fa-solid fa-pen-to-square ubc-lef sytle'></i>
                                    </a>
                                </td>";
                            echo "<td>
                                    <a href='borrar.php?personaId=".$personaId."' >
                                        <i class='fa-solid fa-trash-can sytle'></i>
                                    </a>
                                </td>";
                        echo "</tr>";
                        $numero++;
                    }
                ?>
            </tbody>
        </table>
        
        <!-- Button trigger modal -->
        <div class="col-12">
            <div class="row">
                <div class="col-8"></div>
                <div class="col-2 ">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary ubc-lef" data-bs-toggle="modal" data-bs-target="#modalBuscar">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </button>
                    </div>
                </div>
                <div class="col-2">
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn  btn-secondary ubc-lef bnt-agregar" data-bs-toggle="modal"
                        data-bs-target="#modalRegistrar"><i class="fa-solid fa-user-plus"></i> Registrar</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->

    <div class="modal fadev" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="librerias/registrar.php" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-12">
                            <i class="aviso-obligacion">los campos obligatorios contienen<i class="obligacion">*</i></i>
                        </div>
                        <div class="col-md-12">
                            <label for="selTipoIdentificacion" class="form-label"><i class="obligacion">*</i> Tipo de Identificación</label>
                            <select class="form-select" aria-label="Default select example" id="selTipoIdentificacion"
                                name="selTipoIdentificacion" required>
                                <option value="" selected>Seleccione...</option>
                                <?php
                                    foreach($resultadoIdentificacion as $filaTipoDocumento){
                                        $resultadoId= $filaTipoDocumento['tipoDocumentoId'];
                                        $resultadoNombreIdentificacion= $filaTipoDocumento['tipoDocumentoNombre'];
                                        $resultadoSigla= $filaTipoDocumento['tipoDocumentoSigla'];

                                        echo '<option value="'.$resultadoId.'">'.$resultadoNombreIdentificacion.'</option>';
                                    }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label for="txtIdentificacion" class="form-label"><i class="obligacion">*</i> Identificación</label>
                            <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion"
                                required>
                            <div class="valid-feedback">
                                Digitar el numero de Indentificacion
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="txtPrimerNombre" class="form-label"><i class="obligacion">*</i> Primer nombre</label>
                            <input type="text" class="form-control" id="txtPrimerNombre" name="txtPrimerNombre"
                                required>
                            <div class="valid-feedback">
                                Digitar el primer nombre
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="txtNombres" class="form-label">Segundo nombre</label>
                            <input type="text" class="form-control" id="txtSegundoNombre" name="txtSegundoNombre">
                            <div class="valid-feedback">
                                Digitar el segundo nombre
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="txtPrimerApellido" class="form-label"><i class="obligacion">*</i> Primer apellido</label>
                            <input type="text" class="form-control" id="txtPrimerApellido" name="txtPrimerApellido"
                                required>
                            <div class="valid-feedback">
                                Digitar el primer apellido
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="txtSegundoApellido" class="form-label"><i class="obligacion">*</i> Segundo apellido</label>
                            <input type="text" class="form-control" id="txtSegundoApellido" name="txtSegundoApellido"
                                required>
                            <div class="valid-feedback">
                                Digitar el segundo apellido
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="selFechaNacimiento" class="form-label"> <i class="obligacion">*</i> Fecha Nacimieto</label>
                            <input type="date" class="form-control" id="selFechaNacimiento" name="selFechaNacimiento"
                                required>
                            <div class="valid-feedback">
                                Seleccione la fecha de nacimiento
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="txtTelefono" class="form-label"><i class="obligacion">*</i> Telefono</label>
                            <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" required>
                            <div class="valid-feedback">
                                Digitar el telefono
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="txtCorreoEletronico" class="form-label"><i class="obligacion">*</i> Correo Eletronico</label>
                            <input type="text" class="form-control" id="txtCorreoEletronico" name="txtCorreoEletronico"
                                required>
                            <div class="valid-feedback">
                                Digitar el correo eletronico
                            </div>
                        </div>
                        <div class="col-md-12">

                            <label for="selMunicipioNacimiento" class="form-label"><i class="obligacion">*</i> Municipio Nacimiento</label>
                            <select class="form-select" aria-label="Default select example" id="selMunicipioNacimiento"
                                name="selMunicipioNacimiento" required>
                                <option value="" selected>Seleccione...</option>
                                <?php
                                    foreach( $resultadoMunicipioNacimiento as $filaMunicipioNacimiento){
                                        $resultadoMunicipioId= $filaMunicipioNacimiento['municipioId'];
                                        $resultadoMunicipioNombre= $filaMunicipioNacimiento['municipioNombre'];

                                        echo   '<option value="'.$resultadoMunicipioId.'">'.$resultadoMunicipioNombre.'</option>';
                                    }
                                
                                ?>

                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="setMunicipioResidencia" class="form-label"><i class="obligacion">*</i> Municipio Residencia </label>
                            <select class="form-select" aria-label="Default select example" id="setMunicipioResidencia"
                                name="setMunicipioResidencia" required>
                                <option value="" selected>Seleccione...</option>
                                <?php
                                    foreach( $resultadoMunicipioNacimiento as $filaMunicipioNacimiento){
                                        $resultadoMunicipioId= $filaMunicipioNacimiento['municipioId'];
                                        $resultadoMunicipioNombre= $filaMunicipioNacimiento['municipioNombre'];

                                        echo   '<option value="'.$resultadoMunicipioId.'">'.$resultadoMunicipioNombre.'</option>';
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center">
                            <div class="col-md-5 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary"> <i class="fa-regular fa-floppy-disk"></i>
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fadev" id="modalBuscar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buscar Persona</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <!-- librerias/busqueda.php -->
                    <form action="index.php" method="GET" class="needs-validation" novalidate>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="txtConsultaPersona" id="txtConsultaPersona" class="form-control"  required>
                                    <div class="invalid-feedback">
                                        Por favor, complete el campo.
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 align-self-center">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    </form>
                            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>    

    <!-- Modal  modificar-->
    <script src="js/validacion.js"></script>
    <script src="js/busqueda.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>

</html>