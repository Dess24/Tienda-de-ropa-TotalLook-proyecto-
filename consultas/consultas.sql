-- Consulta 1: Obtener el número total de productos por cada categoría
SELECT Categoria, COUNT(*) AS TotalProductos
FROM Productos
JOIN Categoria ON Productos.idCategoria = Categoria.idCategoria
GROUP BY Categoria;

-- Consulta 2: Obtener la lista de todos los productos vendidos junto con la cantidad total de cada producto
SELECT Productos.idProducto, Nombre, COUNT(*) AS TotalVendido
FROM Productos
JOIN Contiene ON Productos.idProducto = Contiene.idProducto
JOIN Pedidos ON Contiene.idPedido = Pedidos.idPedido
WHERE Pedidos.Estado = 'Retirado'
GROUP BY Productos.idProducto;

-- Consulta 3: Obtener la lista de los productos vendidos en cada pedido, incluyendo el estado del pedido
SELECT Pedidos.idPedido, Pedidos.Estado, Productos.idProducto, Productos.Nombre
FROM Pedidos
JOIN Contiene ON Pedidos.idPedido = Contiene.idPedido
JOIN Productos ON Contiene.idProducto = Productos.idProducto
WHERE Pedidos.Estado != 'Cancelado';

-- Consulta 4: Obtener el producto más vendido, junto con la cantidad total vendida
SELECT Productos.idProducto, Productos.Nombre, COUNT(*) AS TotalVendido
FROM Productos
JOIN Contiene ON Productos.idProducto = Contiene.idProducto
JOIN Pedidos ON Contiene.idPedido = Pedidos.idPedido
WHERE Pedidos.Estado = 'Retirado'
GROUP BY Productos.idProducto, Productos.Nombre
ORDER BY TotalVendido DESC
LIMIT 1;

-- Consulta 5: Obtener la cantidad de productos vendidos por mes en el año actual
SELECT MONTH(Pedidos.Fecha) AS Mes, COUNT(*) AS TotalVendido
FROM Pedidos
JOIN Contiene ON Pedidos.idPedido = Contiene.idPedido
WHERE YEAR(Pedidos.Fecha) = YEAR(CURRENT_DATE) and Pedidos.Estado = 'Retirado'
GROUP BY Mes;

-- Consulta 6: Obtener la lista de los clientes que han realizado al menos un pedido
SELECT DISTINCT Usuarios.idUsuario, Usuarios.Nombre
FROM Usuarios
JOIN Pedidos ON Usuarios.idUsuario = Pedidos.idUsuario;

-- Consulta 7: Obtener el total de pedidos realizado por cada cliente
SELECT Usuarios.idUsuario, Usuarios.Nombre, COUNT(*) AS TotalPedidos
FROM Usuarios
JOIN Pedidos ON Usuarios.idUsuario = Pedidos.idUsuario
GROUP BY Usuarios.idUsuario, Usuarios.Nombre;

-- Consulta 8: Obtener el cliente que ha realizado el pedido de mayor valor

-- Consulta 9: Obtener la lista de los productos que nunca han sido vendidos
SELECT idProducto, Nombre
FROM Productos
WHERE idProducto NOT IN (SELECT idProducto FROM Contiene);

-- Consulta 10: Obtener la lista de los clientes que tienen al menos un pedido en estado "Pendiente"
SELECT Usuarios.idUsuario, Usuarios.Nombre
FROM Usuarios
JOIN Pedidos ON Usuarios.idUsuario = Pedidos.idUsuario
WHERE Pedidos.Estado = 'Pendiente';

-- Consulta 11: Obtener la lista de los clientes que han realizado al menos un pedido en el último mes
SELECT Usuarios.idUsuario, Usuarios.Nombre
FROM Usuarios
JOIN Pedidos ON Usuarios.idUsuario = Pedidos.idUsuario
WHERE Pedidos.Fecha >= DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)
GROUP BY Usuarios.idUsuario, Usuarios.Nombre;

-- Consulta 12: Obtener la cantidad de pedidos por cada mes del año actual, incluyendo aquellos meses sin pedidos
SELECT MONTH(Fecha) AS Mes, COUNT(*) AS TotalPedidos
FROM Pedidos
WHERE YEAR(Fecha) = YEAR(CURRENT_DATE)
GROUP BY Mes;
SELECT m.MonthNumber AS Mes, COUNT(p.idPedido) AS TotalPedidos
FROM (
    SELECT 1 AS MonthNumber UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION
    SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
) AS m
LEFT JOIN (
    SELECT idPedido, MONTH(Fecha) AS Mes
    FROM Pedidos
    WHERE YEAR(Fecha) = YEAR(CURRENT_DATE)
) AS p ON m.MonthNumber = p.Mes
GROUP BY m.MonthNumber;



-- Consulta 13: Obtener el promedio de cantidad de productos vendidos por pedido
SELECT AVG(ConteoProductos) AS PromedioProductosVendidos
FROM (SELECT COUNT(*) AS ConteoProductos
      FROM Contiene
      GROUP BY idPedido) AS Subquery;

-- Consulta 14: Obtener el número de pedidos cancelados por cada cliente
SELECT Usuarios.idUsuario, Usuarios.Nombre, COUNT(*) AS PedidosCancelados
FROM Usuarios
JOIN Pedidos ON Usuarios.idUsuario = Pedidos.idUsuario
WHERE Pedidos.Estado = 'Cancelado'
GROUP BY Usuarios.idUsuario, Usuarios.Nombre;

-- Consulta 15: Obtener la lista de los productos vendidos en pedidos que están en estado "Retirado" junto con la fecha de entrega
SELECT Pedidos.idPedido, Pedidos.Fecha, Productos.idProducto, Productos.Nombre
FROM Pedidos
JOIN Contiene ON Pedidos.idPedido = Contiene.idPedido
JOIN Productos ON Contiene.idProducto = Productos.idProducto
WHERE Pedidos.Estado = 'Retirado';

-- Consulta 16: Obtener la cantidad de productos vendidos por cada cliente, mostrando sólo aquellos clientes cuya cantidad total de productos vendidos supere la media de todos los clientes
SELECT U.Nombre AS Cliente, COUNT(*) AS CantidadProductosVendidos
FROM Usuarios U
JOIN Pedidos P ON U.idUsuario = P.idUsuario
JOIN Contiene C ON P.idPedido = C.idPedido
GROUP BY U.idUsuario, U.Nombre
HAVING COUNT(*) > (
  SELECT AVG(NumProductosVendidos)
  FROM (
    SELECT U.idUsuario, COUNT(*) AS NumProductosVendidos
    FROM Usuarios U
    JOIN Pedidos P ON U.idUsuario = P.idUsuario
    JOIN Contiene C ON P.idPedido = C.idPedido
    GROUP BY U.idUsuario
  ) AS Subquery
);