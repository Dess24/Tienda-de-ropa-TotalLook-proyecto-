<?php
	//Llamada al modelo
	require_once("../../models/inicioSesion_model.php");
    require_once("../../views/ingreso/log-in.php");

    //Creamos un objeto de la clase UsuarioModel
	$controlador = new UsuarioModel();

    if(isset($_POST['volverInicio'])){

        header('location: /proyectoprogramacion');
		exit();
    }

    if (isset($_POST['Iniciar'])) {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $resultado = $controlador->validarUsuario($usuario, $clave);
        if ($resultado) {
            $idUsuario = $controlador->obtenerId($usuario);
            session_start();
            $_SESSION['usuario'] = $idUsuario;
            header('location: /proyectoprogramacion/');
            exit();
        } else {
            echo "<script>alert('Los datos ingresados son incorrectos.');window.location.href = window.location.href;</script>";
        }
    }



?>