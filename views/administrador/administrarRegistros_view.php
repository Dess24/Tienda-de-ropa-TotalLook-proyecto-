<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/proyectoprogramacion/styles/administrarRegistros.css">
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
    <section class="registros_container">
        <div class="registros_inside">

        <h1>Administrar Registros</h1>

<?php if (!$datos) {
   echo "<h2>No se encuentran registros en espera de ser aceptados.</h2>";
} else {
    echo "<table>
        <tr>
            <th><p>Nombre</p></th>
            <th><p>Correo</p></th>
            <th><p>Acciones</p></th>
        </tr>";
    foreach ($datos as $dato) {
        echo "<tr>
            <td>".$dato["Nombre"]."</td>
            <td>".$dato["Correo"]."</td>
            <td>
                <form action='' method='post'>
                    <input type='hidden' name='idUsuario' value='".$dato["idUsuario"]."'>
                    <input type='submit' name='aceptar' value='Aceptar'>
                    <input type='submit' onclick='return confirmarEliminar();' name='denegar' value='Denegar'>
                </form>
            </td>
        </tr>";
    }
} 
?>

        </div>   
    </section>
</main>




    <script>
        function confirmarEliminar() {
        return confirm('¿Estás seguro de que deseas eliminar este usuario?');
    }
    </script>
</body>
</html>