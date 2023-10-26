<?php
require_once('../../db/conectar.php');

class detallesProducto_model{
    private $db;
    private $producto;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->producto = array();
    }

    public function setOpciones($a){
        $idProductoSeleccionado = $a;
        $opciones = array();

        // Realizar la consulta SQL para obtener los datos de las opciones
        $query = "SELECT color FROM productos WHERE idProducto = ".$idProductoSeleccionado;
        $resultado = $this->db->query($query);

        if ($resultado) {
            // Recorrer los resultados y almacenarlos en el array de opciones
            while ($fila = $resultado->fetch_assoc()) {
                $opciones[] = $fila;
            }

            // Liberar el resultado
            $resultado->free();
        } else {
            echo 'Error en la consulta: ' . $this->db->error;
        }
        return $opciones;
    }

    public function getProducto($a){
        $idProductoSeleccionado = $a;
        $sql = "SELECT Imagen, MIN(idProducto) AS idProducto, MIN(Nombre) AS Nombre, MIN(Precio) AS Precio, MIN(Color) AS Color FROM Productos WHERE idProducto = ". $idProductoSeleccionado;
        $consulta = $this->db->query($sql);

        if ($consulta && $consulta->num_rows > 0){
            $resultado = $consulta->fetch_assoc();
            $this->producto = $resultado;
        }

        return $this->producto;
    }

    public function getIdPedido($idUsuario){
      $query = "SELECT idPedido FROM pedidos WHERE idUsuario = '$idUsuario'";
      $consulta = $this->db->query($query);
      if ($consulta) {
          $fila = $consulta->fetch_assoc();
          $idPedido = $fila['idPedido'];
          $consulta->free_result();
          return $idPedido;
      }
      return null;
    }

    function verificarIdPedido($idUsuario) {
        // Verificar si hay un idPedido asociado al idUsuario
        $query = "SELECT idPedido FROM Pedidos WHERE idUsuario = $idUsuario and Estado = 'Pendiente'";
        $resultado = $this->db->query($query);
    
        if ($resultado->num_rows > 0) {
            // El idUsuario tiene un idPedido existente
            return true;
        } else {
            // El idUsuario no tiene un idPedido existente
            return false;
        }
    }

    public function getAprobacion($idUsuario){
        $sql = "SELECT Aceptado FROM Usuarios WHERE idUsuario = ?";
        $consulta = $this->db->prepare($sql);
        $consulta->bind_param("i", $idUsuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $fila = $resultado->fetch_assoc();
        $aprobacion = $fila['Aceptado'];
        return $aprobacion;
    }
    

    function agregarProducto($idUsuario, $nombre, $color, $talle) {
        // Verificar si hay un pedido pendiente para el usuario
        $query = "SELECT idPedido, Estado FROM Pedidos WHERE idUsuario = $idUsuario and (Estado = 'Iniciado' OR Estado = 'Pendiente')";
        $resultado = $this->db->query($query);
    
        if ($resultado->num_rows > 0) {
            // El usuario tiene un pedido existente
            $row = $resultado->fetch_assoc();
            $idPedido = $row["idPedido"];
            $estadoPedido = $row["Estado"];
    
            if ($estadoPedido === "Iniciado") {
                $query = "INSERT INTO Contiene (idPedido, idProducto) VALUES ($idPedido, (SELECT idProducto FROM Productos WHERE Nombre = '$nombre' AND Color = '$color' AND Talle = '$talle'))";
    
                if ($this->db->query($query) === TRUE) {
                    $sql = "UPDATE Pedidos SET Estado = 'Pendiente' WHERE Estado = 'Iniciado' and idUsuario = $idUsuario";
                    $this->db->query($sql);
                    echo "<script>confirm('El producto ha sido agregado correctamente al carrito');</script>";
                } else {
                    echo "Error al agregar el producto a la tabla Contiene: " . $this->db->error;
                }

            } else if ($estadoPedido === "Pendiente"){
                // Verificar si el producto ya existe en la tabla "Contiene"
                $query = "SELECT idProducto FROM Contiene WHERE idPedido = $idPedido AND idProducto IN (SELECT idProducto FROM Productos WHERE Nombre = '$nombre' AND Color = '$color' AND Talle = '$talle')";
                $resultado = $this->db->query($query);
                    
                if ($resultado->num_rows > 0) {
                    echo "<script>confirm('El producto ya se encuentra en el carrito.');</script>";
                } else {
                    $query = "INSERT INTO Contiene (idPedido, idProducto) VALUES ($idPedido, (SELECT idProducto FROM Productos WHERE Nombre = '$nombre' AND Color = '$color' AND Talle = '$talle'))";
                    
                    if ($this->db->query($query) === TRUE){ 
                       echo "<script>confirm('El producto ha sido agregado correctamente al carrito');</script>";
                    } else {
                        echo "Error al agregar el producto a la tabla Contiene: " . $this->db->error;
                    }
               }
            }
        }  
    }
    

    public function getNombreProducto($idProductoSeleccionado){
        $query = "SELECT nombre FROM productos WHERE idproducto = '$idProductoSeleccionado'";
        $consulta = $this->db->query($query);
        if ($consulta) {
            $fila = $consulta->fetch_assoc();
            $nombreProducto = $fila['nombre'];
            $consulta->free_result();
            return $nombreProducto;
        }
        return null;
    }
    
    public function obtenerColores($nombreProducto){
        $sql = "SELECT DISTINCT Color FROM productos WHERE nombre = '$nombreProducto'";
        $consulta = $this->db->query($sql);
        
        if ($consulta->num_rows > 0) {
            $colores = array();
            while ($row = $consulta->fetch_assoc()) {
                $colores[] = $row['Color'];
            }
            return $colores;
        } else {
            return array(); // Devolver un array vacío en lugar de false
        }
    }

    public function obtenerTalles($nombreProducto) {
        $sql = "SELECT DISTINCT Talle FROM productos WHERE nombre = '$nombreProducto'";
        $consulta = $this->db->query($sql);
    
        if ($consulta->num_rows > 0) {
            $talles = array();
            while ($row = $consulta->fetch_assoc()) {
                $talles[] = $row['Talle'];
            }
            return $talles;
        } else {
            return array(); // Devolver un array vacío en lugar de false
        }
    }
    
}

?>
