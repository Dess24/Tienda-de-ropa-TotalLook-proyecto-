<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/proyectoprogramacion/styles/carrito_view.css">
</head>
<body>


<header>

<nav class="header_container">

<div class="logo-menu_container">

    <a href="#">
        <div class="logo_container">

        </div>
    </a>

</div>

<div class="funciones_navbar">


<div class="navbar_links_container">


    <div class="cuenta_container">
        <a href="#">
            <div class="atras_icon">

            </div>
        </a>

        <div class="cuenta_text">
            <form action="" method="post">
            <input type="submit" name="volverInicio" value="Seguir navegando">
            </form>
        </div>
    </div>

</div>

</div>

</nav>

</header>


<section class="hidden_space">
</section>

<main>
    <section class="carrito_container">
    <div class="carrito_inside">
    <div class="carrito_box">

    <h1>Carrito</h1>
    <table>
        <th>Nombre</th>
        <th>Talle</th>
        <th>Color</th>
        <th>Precio</th>
        <th class="coso"></th>
        <?php
        // Obtener los datos del carrito desde el controlador

        // Recorrer los productos del carrito
        foreach ($productos as $producto) {
            $idProducto = $producto["idProducto"];
            $nombre = $producto["Nombre"];
            $talle = $producto["Talle"];
            $color = $producto["Color"];
            $precio = $producto["Precio"];

            // Mostrar los datos del producto en la tabla
            echo "<tr>";
            echo "<td><p>$nombre</p></td>";
            echo "<td><p>$talle</p></td>";
            echo "<td><p>$color</p></td>";
            echo "<td><p>$$precio</p></td>";
            echo "<td><form method='POST' action=''>
            <input type='hidden' name='eliminarProducto' value='$idProducto' />
            <button type='submit'>X</button></form></td>";
            echo "</tr>";
        }

        // Mostrar el precio total si existe
        if (!empty($productos) && isset($productos[0]["PrecioTotal"])) {
            $precioTotal = $productos[0]["PrecioTotal"];
            echo "<tr>";
            echo "<td colspan='3'><p class='precio'>Precio Total:</p></td>";
            echo "<td><p class='precio'>$$precioTotal</p></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <form action="" method="post">
        <input type="submit" name="ordenarPedido" value="Ordenar Pedido">
        <input type="submit" name="cancelarPedido" value="Cancelar">
    </form>

    </div>
    </div>
    </section>
</main>



    
    
</body>
</html>