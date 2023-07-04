<?php
    include('librerias/conexion.php');

    $querySql= "SELECT * FROM persona"; 
    $conexion= new conexion;
    $resultado= $conexion->consulta($querySql);

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
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">N°</th>
                <th scope="col">Numero Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $numero=1;
                    foreach($resultado as $fila){
                        $personaNumeroDocumento= $fila['personaNumeroDocumento'];
                        $personaPrimerNombre= $fila['personaPrimerNombre'];
                        // $personaSegundoNombre= $fila['personaSegundoNombre'];
                        $personaPrimerApellido= $fila['personaPrimerApellido'];

                        echo "<tr>";
                            echo "<th scope='row'>".$numero."</th>";
                            echo "<td>".$personaNumeroDocumento."</td>";
                            echo "<td>".$personaPrimerNombre."</td>";
                            echo "<td>".$personaPrimerApellido."</td>";
                        echo "</tr>";
                        $numero++;
                    }
                ?>   
            </tbody>
        </table>
        
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar Persona</button>

    </div>

    <!-- Modal -->

    <div class="modal fadev" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">registrar personas</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="registrar.php" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-12">
                    <label for="selTipoIdentificacion" class="form-label">Tipo de Identificación</label>
                    <select class="form-select" aria-label="Default select example" id="selTipoIdentificacion">
                        <option value="0" selected>Seleccione...</option>
                        <option value="1">Registro persona</option>
                        <option value="2">Tarjeta de identidad</option>
                        <option value="3">Cedula de ciudadania</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="txtIdentificacion" class="form-label">Identificación</label>
                    <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required>
                    <div class="valid-feedback">
                        Digitar el numero de Indentificacion
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="txtPrimerNombre" class="form-label">Primer nombre</label>
                    <input type="text" class="form-control" id="txtPrimerNombre"  name="txtPrimerNombre" required>
                    <div class="valid-feedback">
                        Digitar el primer nombre
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtNombres" class="form-label">Segundo nombre</label>
                    <input type="text" class="form-control" id="txtNombres"  name="txtNombres" required>
                    <div class="valid-feedback">
                        Digitar el segundo nombre
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtPrimerApellido" class="form-label">Primer apellido</label>
                    <input type="text" class="form-control" id="txtPrimerApellido"  name="txtPrimerApellido" required>
                    <div class="valid-feedback">
                        Digitar el primer apellido
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtSegundoApellido" class="form-label">Segundo apellido</label>
                    <input type="text" class="form-control" id="txtSegundoApellido"  name="txtSegundoApellido" required>
                    <div class="valid-feedback">
                        Digitar el segundo  apellido
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="selFechaNacimiento" class="form-label">Fecha Nacimieto</label>
                    <input type="date" class="form-control" id="selFechaNacimiento"  name="selFechaNacimiento" required>
                    <div class="valid-feedback">
                        Seleccione la fecha de nacimiento
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtTelefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="txtTelefono"  name="txtTelefono" required>
                    <div class="valid-feedback">
                        Digitar el telefono
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="txtCorreoEletronico" class="form-label">Correo Eletronico</label>
                    <input type="text" class="form-control" id="txtCorreoEletronico"  name="txtCorreoEletronico" required>
                    <div class="valid-feedback">
                        Digitar el correo eletronico
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="selMunicipioNacimiento" class="form-label">Municipio Nacimiento</label>
                    <select class="form-select" aria-label="Default select example" id="selMunicipioNacimiento">
                        <option value="0" selected>Seleccione...</option>
                        <option value="1">Neiva</option>
                        <option value="2">Medellin</option>
                        <option value="3">Bogota</option>
                
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="setMunicipioResidencia" class="form-label">Municipio Residencia </label>
                    <select class="form-select" aria-label="Default select example" id="setMunicipioResidencia">
                        <option value="0" selected>Seleccione...</option>
                        <option value="1">Neiva</option>
                        <option value="2">Medellin</option>
                        <option value="3">Bogota</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            
        </div>
        </div>
    </div>
    </div> 
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>