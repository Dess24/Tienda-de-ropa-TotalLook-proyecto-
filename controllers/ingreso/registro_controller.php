<?php
	//Llamada al modelo
	require_once("../../models/registro_model.php");


    //Creamos un objeto de la clase UsuarioModel
	$controlador = new RegistroUsuarioModel();


    if (isset($_POST['iniciar'])){
		$idProducto = $_POST['detallesProducto'];
		header('Location: inicioSesion_controller.php?detallesProducto=' . urlencode($idProducto));
		exit();
	}

    if(isset($_POST['volverInicio'])){

        header('location: /proyectoprogramacion');
		exit();
    }

    if (isset($_POST['Registrar'])) {
        echo "Registrado";
        $usuario = $_POST['usuario'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $celular = $_POST['celular'];
        $clave = $_POST['clave'];
        $resultado = $controlador->RegistroUsuario($usuario, $correo, $telefono, $celular, $clave);
        if ($resultado) {
            $idUsuario = $controlador->getIdUsuario($correo);
            session_start();
            $_SESSION['usuario'] = $idUsuario;
            header('location: /proyectoprogramacion/');
            exit();
        } else {
            echo "<script>alert('Los datos ingresados son incorrectos.');window.location.href = window.location.href;</script>";
        }
    }


    require_once("../../views/ingreso/register_view.php");



?>