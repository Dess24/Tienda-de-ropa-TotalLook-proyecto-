<?php
require_once('../../db/conectar.php');

class carrito_model{
    private $db;
    private $producto;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->producto = array();
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

    
    public function obtenerIdPedidoPendiente($idUsuario) {
        $sql = "SELECT idPedido FROM Pedidos WHERE idUsuario = ? AND Estado = 'Pendiente'";
        $consulta = $this->db->prepare($sql);
        $consulta->bind_param("i", $idUsuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $consulta->close();
    
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            return $fila['idPedido'];
        } else {
            return null; // No hay pedidos pendientes
        }
    }

    public function agregarProductoCarrito($idPedido, $idProducto) {
        // Agregar el producto al carrito
        $sql = "INSERT INTO Contiene (idPedido, idProducto) VALUES (?, ?)";
        $consulta = $this->db->prepare($sql);
        $consulta->bind_param("ii", $idPedido, $idProducto);
        $consulta->execute();
        $consulta->close();

        // Actualizar el precio total del carrito
        $productos = $this->abrirCarrito($idPedido);
        return $productos;
    }

    public function getIdUsuario($idPedido){
        $query = "SELECT idUsuario FROM pedidos WHERE idPedido = '$idPedido'";
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

    public function abrirCarrito($idPedido) {
        $productos = array();
        $precioTotal = 0; // Variable para almacenar el precio total
    
        // Obtener los idProductos correspondientes al idPedido de la tabla Contiene
        $sql = "SELECT c.idProducto 
        FROM Contiene c
        JOIN Pedidos p ON c.idPedido = p.idPedido
        WHERE p.Estado = 'Pendiente'";
        $consulta = $this->db->prepare($sql);
        $consulta->execute();
        $consulta->bind_result($idProducto);
    
        // Guardar los idProductos en un array
        while ($consulta->fetch()) {
            $productos[] = $idProducto;
        }
    
        $consulta->close();
    
        // Obtener los datos (nombre, talle, color, precio) de los productos
        $resultados = array();
        foreach ($productos as $idProducto) {
            $sql = "SELECT idProducto, Nombre, Talle, Color, Precio FROM Productos WHERE idProducto = ?";
            $consulta = $this->db->prepare($sql);
            $consulta->bind_param("i", $idProducto);
            $consulta->execute();
            $consulta->bind_result($idProducto, $nombre, $talle, $color, $precio);
    
            if ($consulta->fetch()) {
                $producto = array(
                    "idProducto" => $idProducto,
                    "Nombre" => $nombre,
                    "Talle" => $talle,
                    "Color" => $color,
                    "Precio" => $precio
                );
                $resultados[] = $producto;
    
                // Sumar el precio al precio total
                $precioTotal += $precio;
            }
    
            $consulta->close();
        }
    
        // Agregar el precio total al resultado solo si hay productos en el carrito
        if (!empty($resultados)) {
            $resultados[0]["PrecioTotal"] = $precioTotal;
        } else {
            echo "<script>confirm('El carrito se encuentra vacío');</script>";
        }
    
        return $resultados;
    }

    public function eliminarProductoCarrito($idPedido, $idProducto) {
        // Eliminar el producto del carrito
        $sql = "DELETE FROM Contiene WHERE idPedido = ? AND idProducto = ?";
        $consulta = $this->db->prepare($sql);
        $consulta->bind_param("ii", $idPedido, $idProducto);
        $consulta->execute();
        $consulta->close();
    
        // Actualizar el precio total del carrito
        $productos = $this->abrirCarrito($idPedido);
        return $productos;
    }

    public function cancelarPedido($idPedido){
        $sql = "DELETE FROM Contiene WHERE idPedido = ?";
        $consulta = $this->db->prepare($sql);
        $consulta->bind_param("i", $idPedido);
        $consulta->execute();
        $consulta->close();
    }

    public function confirmarPedido($idUsuario){
        $sql = "UPDATE Pedidos SET Estado = 'En proceso' WHERE Estado = 'Pendiente' and idUsuario = $idUsuario";
        $this->db->query($sql);

        $query = "INSERT INTO Pedidos (Estado, idUsuario) VALUES ('Iniciado', $idUsuario)";
        $this->db->query($query);
    }
    
}
?>