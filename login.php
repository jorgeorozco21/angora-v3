<?php
// Datos de conexión
$host = 'localhost';
$dbname = 'angora';
$username = 'root';
$password = '';

// Crear conexión
$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se envió el formulario de login
    if (isset($_POST['form_type']) && $_POST['form_type'] === 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $alertas = [];

        // Validaciones básicas
        if (empty($email)) {
            $alertas[] = 'El email es obligatorio';
        }

        if (empty($password)) {
            $alertas[] = 'El password es obligatorio';
        }

        if (empty($alertas)) {
            // Verificar en la base de datos si el email y la contraseña son correctos
            $sql = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = $conexion->query($sql);

            if ($resultado && $resultado->num_rows > 0) {
                $usuario = $resultado->fetch_assoc();

                if ($usuario['password'] === $password) {
                    // Login exitoso: guardar la información en la sesión
                    session_start();
                    $_SESSION['usuario_id'] = $usuario['id'];  // Guarda el ID del usuario
                    $_SESSION['usuario_email'] = $usuario['email']; // Guarda el email del usuario
                    $_SESSION['usuario_nombre'] = $usuario['nombre'];
                    $_SESSION['usuario_apellido'] = $usuario['apellido'];
                    $_SESSION['usuario_telefono'] = $usuario['telefono'];
                    $_SESSION['usuario_password'] = $usuario['password'];   


                    // Redirigir a la página principal después de un login exitoso
                    header('Location: /index.php');
                    exit();
                } else {
                    $alertas[] = 'La contraseña es incorrecta';
                }
            } else {
                $alertas[] = 'El email no está registrado';

                if (empty($email)) {
            $alertas[] = 'El email es obligatorio';
        }

        if (empty($password)) {
            $alertas[] = 'El password es obligatorio';
        }
            }
        }
    }

    elseif (isset($_POST['form_type']) && $_POST['form_type'] === 'register') {
        // Procesar el formulario de Registro
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $password = $_POST['password'];
        $alertas2 = [];

        // Validar si algún campo está vacío
        if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono) || empty($password)) {
            $alertas2[] = 'No se pueden dejar campos vacíos';
        }
    
        // Si no hay alertas2, intenta registrar al usuario
        if (empty($alertas2)) {
            $sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, password) 
                    VALUES ('$nombre', '$apellido', '$email', '$telefono', '$password')";
    
            // Si la inserción es exitosa, redirigir al login
            if ($conexion->query($sql) === TRUE) {
                header('Location: /login.php'); // Redirige en caso de éxito
                exit();
            } else {
                $alertas2[] = 'Hubo un error al registrar el usuario.';
            }
        }
    }
    
    
}     

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="icon" href="imagenes/angoraFavicon.png" type="image/x-icon">
</head>


<body>
    <header>
        <nav>
            <div class="contenedor_nav">
                <a href="index.php">
                    <img id="logo" src="imagenes/angora_logo.png" alt="Logotipo de Angora Sport Shop">
                </a>
                
            </div>
            <div class="contenedor_perfil">
                <a href="login.php"> <img src="imagenes/login.png" alt="Login"> </a>
                <a href="#"> <img src="imagenes/corazon.png" alt="Lista de Deseos"> </a>
                <a href="#"> <img src="imagenes/bolsa_compras.png" alt="Compras"> </a>
            </div>
        </nav>
    </header>

    <div class="centrar">
        <div class="container-form login">
            <div class="information">
                 <div class="info-childs">
                    <h2>¡Bienvenido Nuevamente!</h2>
                    <p>Si aún no tienes tu cuenta registrate</p>
                    <input type="button" value="Registrarse" id="sign-up">
                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Iniciar Sesión</h2>
                    <div class="icons">
    
                    </div>
                    <p>o Iniciar Sesión con una cuenta</p>
                    <div class="alertas">
                        <?php if (!empty($alertas)) : ?>
                            <?php foreach ($alertas as $alerta) : ?>
                                <p class="alertas-p"><?php echo $alerta; ?></p>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <form action="" class="form" method="POST">
                        <input type="hidden" name="form_type" value="login"> <!-- Identificador de formulario -->
                        <label for="email">
                            <i class='bx bx-envelope' ></i>
                            <input type="email" placeholder="Tu Correo Electronico" name="email" id="email" >
                        </label for="">
                        <label for="password">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder="Tu Contraseña" name="password" id="password">
                        </label>
                        <input type="submit" value="Iniciar Sesión">
                    </form>
    
                </div>
            </div>
        </div>

        <div class="container-form register hide">
            <div class="information">
                 <div class="info-childs">
                    <h2>Bienvenido</h2>
                    <p>Para unirte a nuestra comunidad por favor Inicia Sesión con tus datos</p>
                    <input type="button" value="Iniciar Sesión" id="sign-in">
                </div>
            </div>

            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Crear una cuenta</h2>

                    <div class="icons">
    
                    </div>
                    <form action="" class="form" method="POST">
                        <input type="hidden" name="form_type" value="register"> <!-- Identificador de formulario --> 
                        <label for="nombre">
                            <i class='bx bx-user'></i>
                            <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" required>
                        </label>
                        <label for="apellido">
                            <i class='bx bx-user'></i>
                            <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                        </label>
                        <label for="email">
                            <i class='bx bx-envelope' ></i>
                            <input type="email" placeholder="Tu Correo Electronico" name="email" id="email" required>
                        </label for="">
                        <label for="telefono">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="tel" placeholder="Tu Telefono" name="telefono" id="telefono" required>
                        </label>

                        <label for="password">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder="Tu Contraseña" name="password" id="password" required>
                        </label>
                        <input type="submit" value="Registrarse">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>