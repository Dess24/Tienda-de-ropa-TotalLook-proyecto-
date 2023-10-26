<?php
	require_once("../../models/historialPedidos_model.php");

    $pedido = new pedido_model();

    session_start();
	if (isset($_SESSION['usuario'])) {
		$idUsuario = $_SESSION['usuario'];
	}
    $datos = $pedido->getIdPedido($idUsuario);
    $datos = $pedido->getPedidosList($idUsuario);

    if(isset($_POST['volverInicio'])){
        header('location: /proyectoprogramacion/');
		exit();
    }


    if(isset($_POST['eliminarPedido'])){
        $idPedido = $_POST['idPedido'];
        $pedido->bajaPedido($idPedido);
        header('location: /proyectoprogramacion/controllers/pedidos/historialPedidos_controller.php');
    }

    // Cargar la vista
    require_once('../../views/pedidos/historialPedidos_view.php');
?>