<?php
require_once('../../db/conectar.php');

class pedido_model{
    private $db;
    private $producto;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->producto = array();
    }

    public function getIdPedido($idUsuario){
        $sql = "SELECT idPedido FROM pedidos WHERE idUsuario = '$idUsuario'";
        $consulta = $this->db->query($sql);
        if ($consulta) {
            $fila = $consulta->fetch_assoc();
            $idPedido = $fila['idPedido'];
            $consulta->free_result();
            return $idPedido;
        }
        return null;
    }

    public function getPedidosList($idUsuario){
        $sql =" 
        SELECT p.idPedido, pr.Nombre, pr.Precio, pr.Talle, pr.Color, p.Estado
        FROM Pedidos p
        JOIN Usuarios u ON p.idUsuario = u.idUsuario
        JOIN Contiene c ON p.idPedido = c.idPedido
        JOIN Productos pr ON c.idProducto = pr.idProducto
        WHERE p.idUsuario = '$idUsuario' AND p.Estado IN ('En Proceso', 'Realizado', 'Retirado', 'Cancelado')
        ORDER BY p.idPedido";

$consulta = $this->db->query($sql);
while($filas = $consulta->fetch_assoc()){
    $this->producto[] = $filas;
}
return $this->producto;
}

public function bajaPedido($idPedido){
    $sql = "UPDATE Pedidos SET Estado = 'Cancelado' WHERE idPedido = '$idPedido' and Estado in ('En Proceso', 'Realizado')";
    $resultado = $this->db->query($sql);
    return $resultado;
}


}
?>