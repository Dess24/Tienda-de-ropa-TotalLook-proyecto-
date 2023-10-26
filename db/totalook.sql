create database totallook;
use totallook;

CREATE TABLE Usuarios (
  idUsuario INT AUTO_INCREMENT,
  Nombre VARCHAR(50),
  Correo VARCHAR(50),
  Direccion VARCHAR(100),
  Telefono INT,
  Celular INT,
  Estado boolean,
  Clave VARCHAR(64), -- Cambiado a 64 para sha-256
  Tipo VARCHAR(50),
  Aceptado boolean,
  CHECK (Tipo IN ('Administrador', 'Cliente')),
  PRIMARY KEY (idUsuario, Tipo),
  UNIQUE KEY (Correo)
);

CREATE TABLE Administrador (
  idUsuario INT,
  Tipo VARCHAR(50),
  CHECK (Tipo IN ('Administrador')),
  FOREIGN KEY (idUsuario, Tipo) REFERENCES Usuarios (idUsuario, Tipo),
  PRIMARY KEY (idUsuario)
);

CREATE TABLE Cliente (
  idUsuario INT,
  Tipo VARCHAR(50),
  CHECK (Tipo IN ('Cliente')),
  FOREIGN KEY (idUsuario, Tipo) REFERENCES Usuarios (idUsuario, Tipo),
  PRIMARY KEY (idUsuario)
);

CREATE TABLE Categoria (
idCategoria INT AUTO_INCREMENT,
Categoria varchar(50),
primary key(idCategoria));


CREATE TABLE Productos (
  idProducto INT AUTO_INCREMENT,
  Nombre VARCHAR(50),
  idCategoria int,
  Precio INT,
  Stock INT,
  Estado VARCHAR(50),
  CHECK (Estado IN ('Activo', 'Inactivo')),
  Descripcion VARCHAR(50),
  Talle VARCHAR(15),
  Color VARCHAR(50),
  Imagen varchar(100),
  PRIMARY KEY (idProducto),
  FOREIGN KEY (idCategoria) REFERENCES Categoria (idCategoria)
);

CREATE TABLE Pedidos (
  idPedido INT AUTO_INCREMENT,
  Estado varchar(20),
  idUsuario INT,
  CHECK (Estado IN ('Iniciado','Pendiente', 'Cancelado', 'En Proceso','Realizado','Retirado')),
  fechaHora datetime,
  PRIMARY KEY (idPedido, idUsuario),
  FOREIGN KEY (idUsuario) REFERENCES Usuarios (idUsuario)
);

CREATE TABLE Contiene (
  idPedido INT,
  idProducto int,
  PRIMARY KEY (idPedido, idProducto),
  FOREIGN KEY (idProducto) REFERENCES Productos (idProducto),
  FOREIGN KEY (idPedido) REFERENCES Pedidos (idPedido)
);

CREATE TABLE guarda (
  idusuario INT,
  idProducto INT,
  PRIMARY KEY (idUsuario, idProducto),
  FOREIGN KEY (idProducto) REFERENCES productos (idProducto),
  FOREIGN KEY (idUsuario) REFERENCES usuarios (idUsuario)
);

INSERT INTO `categoria` (`idCategoria`, `Categoria`) VALUES
(1, 'Básicos'),
(2, 'Streetwear'),
(3, 'Casual'),
(4, 'Training'),
(5, 'Sportwear'),
(6, 'Accesorios');

INSERT INTO Usuarios (Nombre, Correo, Direccion, Telefono, Celular, Clave, Tipo, Aceptado)
VALUES ('Luciano Gonzales', 'luciano@gmail.com', '123 Main St', 4685712, 5487564, SHA2('252525', 256), 'Administrador', true);
