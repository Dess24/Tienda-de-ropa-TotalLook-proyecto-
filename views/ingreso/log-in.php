
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyectoProgramacion/styles/log-in.css">
    <title>Total Look</title>
</head>
<body>

    <header>

        <nav class="header_container">

            <div class="logo-menu_container">
    
    
                <a href="">
                    <div class="logo_container">
                    
                    </div>
                </a>
    
            </div>
            
    
            <div class="navbar_links_container">

                <div class="atras_container">
                    <a href="">
                        <div class="atras_icon">
            
                        </div>
                    </a>
                    <div class="cuenta_text">
                    <form action="" method="post">
                    <input type="submit" name="volverInicio" value="Volver">
                    </form>
                    </div>
                </div>
            </div>

        </nav>
    </header>
    
    <main>
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            <form method="POST" action="">
                <div class="user-box">
                    <input type="text" name="usuario" required="">
                    <label>Email:</label>
                </div>
                <div class="user-box">
                    <input type="password" name="clave" required="">
                    <label>Contraseña:</label>
                </div>
                <div class="button-form">
                <input type="submit" value="Iniciar" id="submit" name="Iniciar">
                    <div id="register">
                        No tienes una cuenta ?
                        <br>
                        <a class="iniciar_sesion" href="registro_controller.php">
                            Registrate
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>