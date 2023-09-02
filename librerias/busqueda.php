<?php

    // $prueba= $_GET['txtConsultaPersona'];
    // echo $prueba; 

    function busqueda(){
        $consulta= ""; 
        if(isset($_GET['txtConsultaPersona'])){
            $hola= "esto no esta funcionando";
            echo $hola;
            // $consulta= " WHERE personaPrimerNombre like'%".$_GET['txtConsultaPersona']."%'";
            // header('Location:http://localhost/ejercicioSena/registroPersonas/')
            // exit;
        }
        else{
            $consulta= ""; 
        }
        return $consulta;
    }

?>