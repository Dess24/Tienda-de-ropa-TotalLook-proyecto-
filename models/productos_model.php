<?php
	require_once('db/conectar.php');

	class productos_model{
		
		//Declaramos atributos privados
		private $db;
		private $productos;
		
		//Declaramos un constructor que sirve para incializar los atributos
		public function __construct(){
			
			//Asignamos al atributo db el valor del metodo conexion() de la clase Conectar
			//Conectar es la clase y conexion es el metodo
			$this->db = Conectar::conexion();
			//Determinamos que el atributo personas será un array
			$this->productos = array();
			
		}

		public function getEstadoPedido($idUsuario){
			$sql = "SELECT Estado FROM Pedidos WHERE Estado = 'Realizado' AND idUsuario =".$idUsuario;
			$consulta = $this->db->query($sql);
			if($consulta == "Realizado"){
				return true;
			} else {
				return false;
			}
		}		
		
		//Declaramos un metodo para obtener todos los registros de personas
		public function getProductos(){
		//	$sql = "SELECT idProducto, Imagen, Nombre, Precio, Color  FROM Productos group by Imagen" ;
	    $sql = "SELECT Imagen, MIN(idProducto) AS idProducto, MIN(Nombre) AS Nombre, MIN(Precio) AS Precio, MIN(Color) AS Color FROM Productos where Estado = 'Activo' GROUP BY Imagen";

			$consulta = $this->db->query($sql);
			
			while($filas = $consulta->fetch_assoc()){
				$this->productos[] = $filas;
			}
			
			return $this->productos;
		}

		public function getTipoUsuario($idUsuario) {
			$query = "SELECT Tipo FROM Usuarios WHERE idUsuario = $idUsuario";
			$consulta = $this->db->query($query);
			if ($consulta) {
				$fila = $consulta->fetch_assoc();
				$tipoUsuario = $fila['Tipo'];
				$consulta->free_result();
				return $tipoUsuario;
			}
			return null;
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

		function verificarPedidoExistente($idUsuario) {
			// Verificar si hay un idPedido asociado al idUsuario
			$query = "SELECT idPedido FROM Pedidos WHERE idUsuario = $idUsuario";
			$resultado = $this->db->query($query);
		
			if ($resultado->num_rows > 0) {
				// El idUsuario tiene un idPedido existente
				return true;
			} else {
				// El idUsuario no tiene un idPedido existente
				return false;
			}
		}

		public function getURLActual() {
			$protocolo = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
			$host = $_SERVER['HTTP_HOST'];
			$ruta = $_SERVER['REQUEST_URI'];
			return $protocolo . "://" . $host . $ruta;
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

		

	//Acá arrancan los filtros
	public function buscarProducto($buscarProducto){
		$sql = "SELECT Imagen, MIN(idProducto) AS idProducto, MIN(Nombre) AS Nombre, MIN(Precio) AS Precio, MIN(Color) AS Color FROM Productos WHERE Nombre LIKE '%".$buscarProducto."%' AND Estado = 'Activo' GROUP BY Imagen";
		$consulta = $this->db->query($sql);
	
		while($filas = $consulta->fetch_assoc()){
			$this->productos[] = $filas;
		}
	
		return $this->productos;
	}
	
	public function filtrarProductos($filtrarProducto, $filtrarMarca, $filtrarCategoria, $filtrarPrecio) {
		$sql = "SELECT Imagen, MIN(idProducto) AS idProducto, MIN(Nombre) AS Nombre, MIN(Precio) AS Precio, MIN(Color) AS Color FROM Productos WHERE Estado = 'Activo'";
	
		if (!empty($filtrarProducto)) {
			$sql .= " AND Nombre LIKE '%" . $filtrarProducto . "%'";
		}
	
		if (!empty($filtrarMarca)) {
			$sql .= " AND Nombre LIKE '%" . $filtrarMarca . "%'";
		}
	
		if (!empty($filtrarCategoria)) {
			$sql .= " AND idCategoria = " . $filtrarCategoria;
		}
	
		if (!empty($filtrarPrecio)) {
			$sql .= " AND Precio <= '" . $filtrarPrecio . "'";
		}
	
		$sql .= " GROUP BY Imagen";
	
		$consulta = $this->db->query($sql);
		$this->productos = array();
	
		while ($filas = $consulta->fetch_assoc()) {
			$this->productos[] = $filas;
		}
	
		return $this->productos;
	}
	
}
?>	