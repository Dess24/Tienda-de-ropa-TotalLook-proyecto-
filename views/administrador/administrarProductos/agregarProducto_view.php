<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Productos</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/proyectoprogramacion/styles/agregarProducto.css">
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
        <section class="agregar_container">
            <div class="agregar_inside">   
            <h1>Ingresar Producto</h1>
        <form method="post" enctype="multipart/form-data" action="">
            <section class="agregar_box">
            <input type="image" src="" alt=""></input>

        <section>
        <label for="nombre">Ingrese los datos del producto (Marca y Prenda en el nombre):</label>
<input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" required = "">


<select name="miSelectCategoria" required>
    <option value="" selected disabled hidden>Categoria</option>
    <option value="1">Básicos</option>
    <option value="2">Streetwear</option>
    <option value="3">Casual</option>
    <option value="4">Training</option>
    <option value="5">Sportwear</option>
    <option value="6">Accesorios</option>
</select>
        </section>


        <section>
        <label for="nuevoProductoPrecio">Precio</label>
        <input type="number" name="nuevoProductoPrecio" id="nuevoProductoPrecio" required = "">
        </section>

<section>
<label for="nuevoProductoStock">Cantidad de productos por color:</label>
<input type="number" name="nuevoProductoStock" id="nuevoProductoStock" required = "">
</section>


<section>
<label for="nuevoProductoColores">Color:</label>
<input type="text" name="nuevoProductoColor" id="nuevoProductoColor" required = "">
</section>

<section>
<label for="talles">Talles:</label>
<select name="talles" id="talles" required>
    <option value="" selected disabled hidden>Talle</option>
    <option value="XS">XS</option>
    <option value="S">S</option>
    <option value="M">M</option>
    <option value="L">L</option>
    <option value="XL">XL</option>
    <option value="XXL">XXL</option>
</select>
</section>

<section>
<label>Imagen
<input name="campoimagen" type="file"/>
</label>
</section>



<br><br>

<input class="input" type="submit" value="Guardar" name="guardar">
            </section>
            </form>
            </div>
        </section>
    </main>

        







    </body>
</html>