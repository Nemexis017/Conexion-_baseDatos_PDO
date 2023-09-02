<?php 
    include('conexion.php');
    $conexion= new conexion();

    $id= $_POST['txtId'];

    $sqlDelete= 
    "DELETE FROM `registropersonas`.`persona`
    WHERE personaId= :id";

    $conexion->borrar($sqlDelete,$id);   
    header('Location:http://localhost/ejercicioSena/registroPersonas/');

?>