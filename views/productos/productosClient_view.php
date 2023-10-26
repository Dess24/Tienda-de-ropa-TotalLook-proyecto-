<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyectoProgramacion/styles/productosClient_view.css">
    <title>Total Look</title>
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
                <input type="image" src="/proyectoProgramacion/imagenes/imagenesNavbar/lupa.png" alt="Enviar formulario" class="buscador_image">
                </form>

            </div>
        </div>


        <div class="navbar_links_container">

    

            <div class="cuenta_container2">
                <a href="../views/log-in.php">
                    <div class="cuenta_icon2">
    
                    </div>
                </a>

                <div class="cuenta_text">
                    <form action="" method="post">
                    <input type="submit" name="cerrar" value="Cerrar Sesiòn">
                    </form>
                </div>
            </div>

            <div class="cuenta_container">
                <a href="../views/log-in.php">
                    <div class="cuenta_icon">
    
                    </div>
                </a>

                <div class="cuenta_text">
                    <form action="" method="post">
                    <input type="submit" name="abrirPedidos" value="Pedidos">
                    </form>
                </div>
            </div>


            <div class="carrito_container">

                <a href="../views/carrito_view.php">
                    <div class="carrito_icon">
    
                    </div>
                </a>

                <div class="carrito_text">
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
                    <form method="POST">
                    <input type="submit" name="volverInicio" value="Home">
                    <input type="submit" name="iniciar" value="Log-in">
                    <input type="submit" name="registro" value="Regìstrarse">
                    <input type="submit" name="abrirPedidos" value="Pedidos">
                    </form>
                </nav>
                <label for="menu_lateral" class="exit">
                
            </div>
        </div>







        <section class="categorias">
        <form action="" method="post">
        <select name="miSelect">
            <option selected disabled hidden>Prendas</option>
            <option value="Remera">Remeras</option>
            <option value="Calza">Calzas</option>
            <option value="Pantalon">Pantalones</option>
            <option value="Canguro">Canguros</option>
            <option value="Campera">Camperas</option>
            <option value="Gorra">Gorras</option>
            <option value="Riñonera">Riñoneras</option>
            <option value="Guante">Guantes</option>
            <option value="Cinto">Cintos</option>
            <option value="Lentes">Lentes</option>
            <option value="Gorro">Gorros</option>
        </select>

        <select name="miSelectMarca">
            <option selected disabled hidden>Marcas</option>
            <option value="Nike">Nike</option>
            <option value="Vans">Vans</option>
            <option value="Yuyo">Yuyo</option>
            <option value="Polo">Polo</option>
            <option value="Casual">Basics</option>
            <option value="Jordan">Jordan</option>
            <option value="New Era">New Era</option>
        </select>

        <select name="miSelectCategoria">
            <option selected disabled hidden>Categorias</option>
            <option value="1">Básicos</option>
            <option value="2">Streetwear</option>
            <option value="3">Casual</option>
            <option value="4">Training</option>
            <option value="5">Sportwear</option>
            <option value="6">Accesorios</option>
        </select>
        <input class="input_precio" type="number" name="filtroPrecio" id="filtroPrecio" placeholder="Precio maximo:">
        <input class="input_filtrar" type="submit" value="Filtrar" >
        </form>
        </section>






        

        

        <main>
            <h1>Lista de articulos</h1>
            <div class="product_container">
            <?php
                //Recorremos el array para ir mostrando fila a fila los registros
                foreach ($datos as $dato) {
                    echo "<div class='product'>
                    <img src='".$dato['Imagen']."' width='200'/>
                    <div class='product_text'>
                    <div class='product_info'>
                        <p>".$dato["Nombre"]."</p>
                        <p> $ ".$dato["Precio"]."</p>
                    </div>
                    <div class='button_container'>   
                        <form action='' method='post'>
                        <input style='Display: none;' type='text' name='detallesProducto' value='".$dato["idProducto"]."'>
                        <input type='submit' name='abrirProducto' value='Ver más' class='abrirProducto'>
                    </div>
                    </div>
                    </form>
                </div>";
                }
            ?>
            </div>
        </main>
        <article>
        

        </article>

        <footer>
            
        </footer>
    </body>
</html>