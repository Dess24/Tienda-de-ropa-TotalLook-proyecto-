<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $producto["Nombre"]; ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyectoprogramacion/styles/detallesProducto_view.css">
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

<div class="buscador_container">
    <div class="input_buscador_container">

        <form action="" method="post">
        <input type="text" name="buscador" id="buscador" placeholder="Buscar" class="buscador">
        <input type="image" src="/proyectoprogramacion/imagenes/imagenesNavbar/lupa.png" alt="Enviar formulario" class="buscador_image">
        </form>

    </div>
</div>


<div class="navbar_links_container">



    <div class="cuenta_container">
        <a href="">
            <div class="cuenta_icon">

            </div>
        </a>

        <div class="cuenta_text">
            <form action="" method="post">
            <input type="submit" name="cerrar" value="Cerrar Sesiòn">
            </form>
        </div>
    </div>

    <div class="cuenta_container2">
        <a href="#">
            <div class="atras_icon">

            </div>
        </a>

        <div class="cuenta_text">
            <form action="" method="post">
            <input type="submit" name="volverInicio" value="Volver">
            </form>
        </div>
    </div>

    <div class="cuenta_container2">
        <a href="#">
            <div class="carrito_icon">

            </div>
        </a>

        <div class="cuenta_text">
            <form action="" method="post">
            <input type="submit" name="abrirCarrito" value="Carrito">
            </form>
        </div>
    </div>

</div>

</div>

</nav>

</header>



<section class="hidden_space">
</section>


<input type="checkbox" for="" id="menu_lateral" class="menu_lateral">
        <div class="container_menu_lateral">
            <div class="cont_menu_lateral">
                <nav>
                    <input type="submit" name="" value="Home">
                    <input type="submit" name="" value="Carrito">
                    <input type="submit" name="" value="Log-in">
                    <input type="submit" name="" value="Regìstrarse">
                    <input type="submit" name="" value="Contàctanos">
                    <input type="submit" name="" value="Redes Sociales">
                </nav>
                <label for="menu_lateral" class="exit">
                
            </div>
        </div>



<main>

    <section class="product_container">
        <div class="produc_inside">

        <h1><?php echo $producto["Nombre"]; ?></h1>
    
        <img src='<?php echo $producto["Imagen"]; ?>' width='150'/>
        <p>$<?php echo $producto["Precio"]; ?></p>

        <form action='' method='POST'>
        <input style='Display: none;' type='text' name='nombreProducto' value='<?php echo $producto["Nombre"]; ?>'>

        <select name="selecColor" required>
        <option value='' selected disabled hidden>Color</option>
        <?php foreach ($colores as $color) { ?>
            <option value="<?php echo $color; ?>"><?php echo $color; ?></option>
            <?php } ?>
        </select>



        <select name="selecTalle" required>
        <option value="" selected disabled hidden>Talle</option>
        <?php foreach ($talles as $talle) { ?>
            <option value="<?php echo $talle; ?>"><?php echo $talle; ?></option>
            <?php } ?>
        </select>

        
        <div class="buttons_container">
            <input type='submit' name='agregarAlCarrito' value='Agregar al carrito'>
        </div>

            
        </form>

        </div>
        </section>

</main>




    
</body>
</html>
