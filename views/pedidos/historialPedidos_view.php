<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/proyectoprogramacion/styles/historialPedidos.css">
</head>
<body>
    
<header>
<nav class="header_container">

<div class="logo-menu_container">

    <label for="menu_lateral" class="menu_hamburguesa">



    </label>

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
    <section class="pedidos_container">
    <div class="pedidos_inside">
        <h1>Pedidos</h1>
        <table>
            <tr>
                <th><p>Num Pedido</p></th>
                <th><p>Descripción</p></th>
                <th><p>Estado</p></th>
            </tr>
            <?php
            $prevIdPedido = null;
            
            foreach ($datos as $dato) {
                if ($dato['idPedido'] !== $prevIdPedido) {
                    if ($prevIdPedido !== null) {
                        echo "</table><td><p>".$prevEstadoPedido;
    
                        if ($prevEstadoPedido !== "En Proceso") {
                            echo "<form action='' method='post'>
                                    <input type='hidden' name='idPedido' value='".$prevIdPedido."'>
                                    <input type='submit' name='eliminarPedido' value='X'>
                                </form>";
                        }
                        
                        echo "</p></td></tr>"; // Cerrar la descripción y el estado
                    }
    
                    echo "
                    <tr>
                        <td><p>".$dato["idPedido"]."</p></td>
                        <td>
                            <table>
                                <tr>
                                    <th class='title'>Producto</th>
                                    <th class='title'>Precio</th>
                                    <th class='title'>Talle</th>
                                    <th class='title'>Color</th>
                                </tr>
                    ";
                }
    
                echo "
                    <tr>
                        <td class='dato'>".$dato["Nombre"]."</td>
                        <td class='dato'>$ ".$dato["Precio"]."</td>
                        <td class='dato'>".$dato["Talle"]."</td>
                        <td class='dato'>".$dato["Color"]."</td>
                    </tr>
                ";
                
                $prevIdPedido = $dato['idPedido'];
                $prevEstadoPedido = $dato['Estado'];
            }
            
            if ($prevIdPedido !== null) {
                echo "</table><td><p>".$prevEstadoPedido;
    
                if ($prevEstadoPedido !== "En Proceso") {
                    echo "<form action='' method='post'>
                            <input type='hidden' name='idPedido' value='".$prevIdPedido."'>
                            <input type='submit' name='eliminarPedido' value='X'>
                        </form>";
                }
                
                echo "</p></td></tr>"; // Cerrar la descripción y el estado
            }
            ?>
        </table>
    </div>
    </section>
</main>

    
    
</body>
</html>