<?php

	require_once("../../models/administrador/administrarProductos_model.php");
	$productoMod = new administrarProductos_model();
	$productoMod2 = new administrarProductos_model();
	$productoMod3 = new administrarProductos_model();
	
	$datos = $productoMod->getProductosList();

	session_start();
	if (isset($_SESSION['usuario'])) {
		$idUsuario = $_SESSION['usuario'];
	}

    if (isset($_POST['agregarProducto'])){
		require_once('../../views/administrador/administrarProductos/agregarProducto_view.php'); //agregar para que cargue con el id
		exit();
	}

    
	if (isset($_POST['DarBaja'])){
		$Nombre = $_POST["Nombre"];
		
		$productoMod->deleteProductos($Nombre);
	}

	if (isset($_POST['DarAlta'])){
		$Nombre = $_POST["Nombre"];
		
		$productoMod->addProductos($Nombre);
	}
    
	if(isset($_POST['guardar'])){
		$nombre = $_POST['nombre'];
		$categoria = $_POST['miSelectCategoria'];
		$precio = $_POST['nuevoProductoPrecio'];
		$stock = $_POST['nuevoProductoStock'];
		$color = $_POST['nuevoProductoColor'];
		$talle = $_POST['talles'];
		$directorio_destino = "../../imagenes/imagenesProductos";
		$nombre_fichero = "campoimagen";
		$productoMod3->insertProductos($nombre,$categoria,$precio,$stock,$color,$talle,$directorio_destino, $nombre_fichero);
	}

	
    if(isset($_POST['volverInicio'])){
		session_start();
		$_SESSION['oculto'] = $idUsuario;
        header('location: /proyectoprogramacion/');
		exit();
    }


	if (isset($_POST['modificar'])){
		$Nombre = $_POST["Nombre"];
		$datos = $productoMod2->getModProductosList($Nombre);		
		require_once('../../views/administrador/administrarProductos/modificarProducto_view.php');	
		exit();
	}
    
	if(isset($_POST['modprecio'])){
		$nombre = $_POST['Nombre'];
		$precio = $_POST['precio'];
		$productoMod2->modificarPrecio($precio, $nombre);
    }

	if(isset($_POST['aplicarmod'])){
		$idProducto = $_POST["idProducto"];
		$modstock = $_POST['stock'];
		$modcolor = $_POST['color'];
		$modtalle = $_POST['talle'];
		$productoMod2->modificarProductos($modstock, $modcolor, $modtalle, $idProducto);
    }


	if(isset($_POST['agregarOtroProducto'])){
		$nombre = $_POST["Nombre"];
		$addstock = $_POST['stock'];
		$addcolor = $_POST['color'];
		$addtalle = $_POST['talle'];
		$precio = $_POST['Precio'];
		$imagen = $_POST['Imagen'];
		$estado = $_POST['Estado'];
		$idcategoria = $_POST['idCategoria'];
		$productoMod2->agregarOtroProducto($addstock, $addcolor, $addtalle, $nombre, $idcategoria, $precio, $estado, $imagen);
    }
    
    require_once('../../views/administrador/administrarProductos_view.php');
?>




