<?php
require_once('../../db/conectar.php');

class RegistroUsuarioModel {
    private $db;

    public function __construct(){
        $this->db = Conectar::conexion();
    }


    public function RegistroUsuario($usuario, $correo, $telefono, $celular,  $clave) {
        $contraseña = $this->db->real_escape_string(hash('sha256', $clave));
        $sql = "INSERT INTO Usuarios (Nombre, Correo, Telefono, Celular, Clave, Tipo, Aceptado) VALUES ('$usuario', '$correo', $telefono, $celular, '$contraseña', 'Cliente', FALSE); ";
        $result = mysqli_query($this->db, $sql);
        $filasAfectadas = mysqli_affected_rows($this->db);
        return $filasAfectadas;
    }

    public function getIdUsuario($correo){
        $query = "SELECT idUsuario FROM usuarios WHERE Correo = '$correo'";
        $consulta = $this->db->query($query);
        if ($consulta) {
            $fila = $consulta->fetch_assoc();
            $idUsuario = $fila['idUsuario'];
            $consulta->free_result();
            return $idUsuario;
        } else {
            // Error en la consulta
            echo "Error en la consulta: " . $this->db->error;
        }
        return null;
    }
} 
?>