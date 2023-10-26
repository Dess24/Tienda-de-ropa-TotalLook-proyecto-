<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Productos</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyectoprogramacion/styles/modificarProducto.css">
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
    <section class="modificar_container">
        <div class="modificar_inside">
        <table>
        <tr>
            <th>ID Producto</th>
            <th>Nombre</th>
            <th>Talle</th>
            <th>Color</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>

        <?php
        foreach ($datos as $dato) {
            echo "        <form action='' method='post'> 
            <tr>
                    <td>".$dato["idProducto"]."</td>
                    <td>".$dato["Nombre"]."</td>
                    <td>
                        <select name='talle'>
                            <option value='l' ".($dato["Talle"] == "l" ? "selected" : "").">L</option>
                            <option value='m' ".($dato["Talle"] == "m" ? "selected" : "").">M</option>
                            <option value='s' ".($dato["Talle"] == "s" ? "selected" : "").">S</option>
                            <option value='' ".($dato["Talle"] == "" ? "selected" : "")."></option>
                        </select>
                    </td>
                    <td>


                    <input type='text' name='color' value='".$dato["Color"]."' required>


            
                    </td>
                    <td>
                        <label>$ ".$dato["Precio"]."</label>
                    </td>
                    <td>
                        <input type='number' name='stock' min='0' value='".$dato["Stock"]."' required>
                    </td>
                    <td>
                        <form action='' method='post'>
                            <input type='hidden' name='idProducto' value='".$dato["idProducto"]."'>
                            <input type='submit' class='input' name='aplicarmod' value='Aplicar Modificacion'>
                        </form>
                    </td>
                </tr>
                </form>";
        }
        ?>
    </table>
    <br> <br> <br>


<h2> Modificar Precio</h2>
    <?php
    echo"
    <form action='' method='post'> 
    <input type='hidden' name='Nombre' value='".$dato["Nombre"]."'>  
    <input type='number' name='precio' min='0' required>
    <input type='submit' name='modprecio' value='Modificar precio'>
    </form>
    ";
    ?>

    


<h2 class="h2">Agregar Producto</h2>
<form action="" method="post">
    <table>
        <tr>
            <th><p>Nombre</p></th>
            <th><p>Talle</p></th>
            <th><p>Color</p></th>
            <th><p>Precio</p></th>
            <th><p>Stock</p></th>
            <th><p>Acciones</p></th>
        </tr>
        <tr>
            <td><?php echo $dato['Nombre']; ?></td>
            <td>
                <select name="talle">
                    <option value=""></option>
                    <option value="l">L</option>
                    <option value="m">M</option>
                    <option value="s">S</option>
                    
                </select>
            </td>
            <td>

            <?php echo "
            <input type='text' name='color' value='' required>
            </td>


            <td> <label>$ ".$dato['Precio']."</label> </td>
            <td><input type='number' name='stock' min='0' required></td>


            <td>
            <form action='' method='post'>
                <input type='hidden' name='Nombre' value='".$dato["Nombre"]."'>
                <input type='hidden' name='Precio' value='".$dato["Precio"]."'>
                <input type='hidden' name='Imagen' value='".$dato["Imagen"]."'>
                <input type='hidden' name='Estado' value='".$dato["Estado"]."'>
                <input type='hidden' name='idCategoria' value='".$dato["idCategoria"]."'>
                <input type='submit' name='agregarOtroProducto' class='input' value='Agregar'>
                        </form>
            </td>
        </tr>
    </table>
</form>
</form>

"; ?>
        </div>
    </section>
</main>

    

</body>
</html>