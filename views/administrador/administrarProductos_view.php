<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Productos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyectoprogramacion/styles/administrarProductos.css">
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
    <div class="cuenta_container">
        <div class="cuenta_text">
            <form action="" method="POST">
            <input type="submit" name="agregarProducto" value="Agregar Producto">
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
    <section class="productos_container">
        <div class="productos_inside">

        <?php
        

    echo "<table>
            <tr>
                <th><p>ID Producto</p></th>
                <th><p>Nombre</p></th>
                <th><p>Categoría</p></th>
                <th><p>Precio</p></th>
                <th><p>Estado</p></th>
                <th><p>Acciones</p></th>
            </tr>";


    foreach ($datos as $dato) {

        $EstadoProducto;
        $nombreControlador;
            if($dato["Estado"] == "Activo"){
                $EstadoProducto = 'Dar de baja';
                $nombreControlador = 'DarBaja';
            }elseif ($dato["Estado"] == "Inactivo"){
                $EstadoProducto = 'Dar de alta';
                $nombreControlador = 'DarAlta';
            }
        
        echo "<tr>
                <td>".$dato["idProducto"]."</td>
                <td>".$dato["Nombre"]."</td>
                <td>".$dato["Categoria"]."</td>
                <td>$ ".$dato["Precio"]."</td>
                <td>".$dato["Estado"]."</td>
                <td>
                
                    <form action='' method='post'>
                        <input type='hidden' name='Nombre' value='".$dato["Nombre"]."'>
                        <input type='submit' name='modificar' value='Modificar'>
                    </form>
                    <form action='' method='post'>
                        <input type='hidden' name='Nombre' value='".$dato["Nombre"]."'>
                        <input type='submit' name='$nombreControlador' value='$EstadoProducto'>
                    </form>
                </td>
            </tr>";
    }

    echo "</table>";
?>

        </div>
    </section>
</main>

        




    </body>
</html>