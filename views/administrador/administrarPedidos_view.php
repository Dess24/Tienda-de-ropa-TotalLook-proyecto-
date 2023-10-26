<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidios</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/proyectoprogramacion/styles/administrar_pedidos.css">
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
            <form action="" method="POST">
            <input type="submit" name="volverInicio" value="Volver">
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
        <section class="pedidos_container">
            <h1>Administrar Pedidos</h1>
            <h3>Pedidos para armar:</h3>
            <div class="pedidos_inside">
            
        <?php
            foreach ($pedidos as $pedido) {
                echo "<div class='pedidos_box'>";
                echo "<h4>Pedido: " . $pedido['idPedido'] . "</h4>";
                echo "<table>";
                echo "<tr>
                        <th>Producto</th>
                        <th>Color</th>
                        <th>Talle</th>
                        <th></th>
                      </tr>";

                // Obtener los productos del pedido actual desde la variable definida en el controlador
                $productosPedido = $productos[$pedido['idPedido']];

                foreach ($productosPedido as $producto) {
                    echo "<tr>";
                    echo "<td>" . $producto['Nombre'] . "</td>";
                    echo "<td>" . $producto['Color'] . "</td>";
                    echo "<td>" . $producto['Talle'] . "</td>";
                    echo "<td>
                        <input type='checkbox' required>
                          </td>
                    </tr>";
                }
                echo "</table>";
                
                echo "<form method='post'>
                <input type='hidden' name='idPedido' value='" . $pedido['idPedido'] . "'>
                <input type='submit' name='pedidoRealizado' value='Listo'>
                </form>";
                echo "</div>";
            }
        ?>

        
            </div>
            <div class="pedidos_notificados">
            <h2>Pedidos notificados</h2>
        <?php
            foreach ($pedidosRealizados as $pedidoRealizado){
                echo "<div class='retirado'>";
                echo "<p>Pedido: " . $pedidoRealizado['idPedido'] . "</p>
                      <form method='post'>
                          <input type='hidden' name='idPedido' value='" . $pedidoRealizado['idPedido'] . "'>
                          <input type='submit' name='levantado' value='Retirado'>
                      </form>";
                echo "</div>";
            }
        ?>
            </div>
        </section>
        
    </main>
</body>
</html>
