<?php
    require_once("../../models/administrador/administrarPedidos_model.php");

    $Apedidos = new administrarPedidos_model();

    session_start();
    if (isset($_SESSION['usuario'])) {
        $idUsuario = $_SESSION['usuario'];
    }

    $pedidos = $Apedidos->getPedidos();
    $pedidosRealizados = $Apedidos->getPedidosRealizados();

    $productos = array(); // Inicializar la variable $productos

    foreach ($pedidos as $pedido) {
        $productos[$pedido['idPedido']] = $Apedidos->getProductosDelPedido($pedido['idPedido']);
    }

    if (isset($_POST['volverInicio'])) {
        session_start();
        $_SESSION['usuario'] = $idUsuario;
        header('location: /proyectoprogramacion/');
        exit();
    }

    if (isset($_POST['pedidoRealizado'])) {
        $pedidoId = $_POST['idPedido'];
        $Apedidos->confirmarPedido($pedidoId);
    }

    if (isset($_POST['levantado'])) {
        $pedidoId = $_POST['idPedido'];
        $Apedidos->pedidoLevantado($pedidoId);
    }

    // Pasar las variables a la vista
    require_once('../../views/administrador/administrarPedidos_view.php');
?>
