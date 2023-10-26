<?php

	require_once("../../models/administrador/administrarRegistros_model.php");
	$usuariosEnEspera = new administrarRegistros_model();

	
	session_start();
	if (isset($_SESSION['usuario'])) {
		$idUsuario = $_SESSION['usuario'];
	}
	
	$datos = $usuariosEnEspera->getRegistros();

	if(isset($_POST['volverInicio'])){
		session_start();
		$_SESSION['usuario'] = $idUsuario;
        header('location: /proyectoprogramacion/');
		exit();
    }

	if(isset($_POST['aceptar'])){
		$idUsuario2 = $_POST['idUsuario'];
		$usuariosEnEspera->aceptarUsuario($idUsuario2);
		session_start();
		$_SESSION['usuario'] = $idUsuario;
		header("Location: ".$_SERVER['PHP_SELF']);
        exit();
	}

	if(isset($_POST['denegar'])){
		$idUsuario2 = $_POST['idUsuario'];
		$usuariosEnEspera->denegarUsuario($idUsuario2);
		session_start();
		$_SESSION['usuario'] = $idUsuario;
		header("Location: ".$_SERVER['PHP_SELF']);
        exit();
	}

    require_once('../../views/administrador/administrarRegistros_view.php');

?>