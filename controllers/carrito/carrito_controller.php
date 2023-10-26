<?php
	require_once("../../models/carrito_model.php");

    $carrito = new carrito_model();

    session_start();
	if (isset($_SESSION['pedido'])) {
		$idPedido = $_SESSION['pedido'];
	}

    // Obtener los productos del modelo pasando el idPedido
    $productos = $carrito->abrirCarrito($idPedido);

    // Eliminar un producto del carrito
    if (isset($_POST['eliminarProducto'])) {
        $idProducto = $_POST['eliminarProducto'];
        $productos = $carrito->eliminarProductoCarrito($idPedido, $idProducto);
    }

    if(isset($_POST['volverInicio'])){
        $idUsuario = $carrito->getIdUsuario($idPedido);
        session_start();
		$_SESSION['oculto'] = $idUsuario;
        header('location: /proyectoprogramacion/');
		exit();
    }

    if(isset($_POST['cancelarPedido'])){
        $idUsuario = $carrito->getIdUsuario($idPedido);
        $carrito->cancelarpedido($idPedido);
        session_start();
		$_SESSION['oculto'] = $idUsuario;
        header('location: /proyectoprogramacion/');
		exit();
    }

    if(isset($_POST['ordenarPedido'])){
        $idUsuario = $carrito->getIdUsuario($idPedido);
        $carrito->confirmarPedido($idUsuario);
        //Necesitaria confirmar que se registro el pedido
        header('location: /proyectoprogramacion/');
        exit();
    }



    // Cargar la vista
    require_once('../../views/carrito/carrito_view.php');
?>