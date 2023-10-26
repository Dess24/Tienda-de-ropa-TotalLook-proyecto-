<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyectoprogramacion/styles/log-in.css">
    <title>Total Look</title>
</head>
<body>

    <header>
    <nav class="header_container">

    <div class="logo-menu_container">

        <a href="/proyectoProgramacion/views/productos/productos_view.php">
            <div class="logo_container">
            </div>
        </a>

    </div>


    <div class="navbar_links_container">

        <div class="atras_container">
            <a href="#">
                <div class="atras_icon">
            
                </div>
            </a>
            <div class="cuenta_text">
            <form method="POST">
                <input type="submit" name="volverInicio" value="Volver">
            </form>
            </div>
        </div>

    </div>
    </nav>
    </header>

    <main>

        <div class="login-box">

            <h2>Registrarse</h2>
            <form method="POST" action="">
                <div class="user-box">
                    <input type="text" name="usuario" required="">
                    <label>Nombre</label>
                </div>

                
                <div class="user-box">
                    <input type="text" name="correo" required="">
                    <label>Gmail</label>
                </div>

                <div class="user-box">
                    <input type="text" name="telefono" required="">
                    <label>Telefono</label>
                </div>

                <div class="user-box">
                    <input type="text" name="celular" required="">
                    <label>Celular</label>
                </div>

                <div class="user-box">
                    <input type="password" name="clave" required="">
                    <label>Contraseña</label>
                </div>

                
            

            <div class="button-form">
                <input class="submit" type="submit" name="Registrar" value="Registrarse" id="Registrar">
                </form>
                <div id="register">
                    <form method="POST" action="">
                        <p>Tienes una cuenta?</p>
                        <input type="submit" name="iniciar" class="iniciar_sesion" value="Iniciar Sesión">
                    </form>
                </div>
            </div>

            

        </div>
            

    </main>
            




    <script>
        function confirmarEliminar() {
        return confirm('Su registro esta Pendiente!!!');
        }
    </script>


</body>
</html>