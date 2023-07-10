<?php
    class conexion{
        private $dsn;
        private $server;
        private $usuario;
        private $baseDatos;
        private $password;

        public function __construct(){
            $this->server= "localhost";
            $this->usuario= "root";
            $this->baseDatos= "registropersonas";
            $this->password="123456";
        }

        // conexion a la base de datos mysql
        public function conectar(){
            $this->dsn= 'mysql:host='.$this->server.';dbname='.$this->baseDatos.'';
            try{
                $conexion= new PDO($this->dsn,$this->usuario,$this->password );
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Conexión exitosa a base de datos ";
            }catch(PDOException $e){
                echo "Error al conectar a la base de datos: " . $e->getMessage();
            }
            return $conexion;
        }

        // metodos para consultas y demas
        public function consulta($querySql){
            $conexion= $this->conectar();
            $consulta= $conexion->query($querySql);
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                $resultado[]= $fila;
            } 
            return $resultado;
        }

        public function ejecutar($querySql, $values){
            $conexion= $this->conectar();
            $queryEjecutar= $conexion->prepare($querySql);
            $queryEjecutar->execute($values);
        }

        public function borrar(){
            $conexion= $this->conectar();
            $queryEjecutar= $conexion->prepare($querySql);
            $queryEjecutar->execute($values);
        }
    }

?>