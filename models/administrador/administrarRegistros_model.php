<?php
	require_once('../../db/conectar.php');

	class administrarRegistros_model{
		
		//Declaramos atributos privados
		private $db;
		private $usuarios;
		
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conectar::conexion();
			//Determinamos que el atributo personas será un array
			$this->usuarios = array();
			
		}

        //Obtener registros pendientes
        public function getRegistros(){
            $sql = "SELECT idUsuario, Nombre, Correo FROM Usuarios WHERE Aceptado = false";
            $consulta = $this->db->query($sql);

            if ($consulta->num_rows > 0) {
                while($filas = $consulta->fetch_assoc()){
                    $this->usuarios[] = $filas;
                }
                return $this->usuarios;
            } else {
                return false;
            }
        }

        public function aceptarUsuario($idUsuario){       
            // Actualizar el valor de 'Aceptado' a true
            $sql = "UPDATE Usuarios SET Aceptado = true WHERE idUsuario = $idUsuario";
            $query = "INSERT INTO Pedidos (Estado, idUsuario) VALUES ('Iniciado', $idUsuario)";
            $this->db->query($query);
            if( $this->db->query($sql)){
                return true;
            } else {
                return false;
            }
        }

        public function denegarUsuario($idUsuario){       
            // Actualizar el valor de 'Aceptado' a true
            $sql = "DELETE FROM Usuarios WHERE idUsuario = $idUsuario";
            $denegar = $this->db->query($sql);
        }
    }
?>