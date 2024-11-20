<?php
session_start();

// Verificar si el usuario ha iniciado sesión
$isAuthenticated = isset($_SESSION['usuario_id']);
$usuarioId = $_SESSION['usuario_id'];
$usuarioNombre = $_SESSION['usuario_nombre'];
$usuarioApellido = $_SESSION['usuario_apellido'];
$usuarioEmail = $_SESSION['usuario_email'];
$usuarioTelefono = $_SESSION['usuario_telefono'];
$usuarioPassword = $_SESSION['usuario_password'];

// Conexión a la base de datos
$host = 'localhost';
$dbname = 'angora';
$username = 'root';
$password = '';

$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Consultar los datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE id = $usuarioId";
$result = $conexion->query($sql);

// Verificar si se encontró el usuario y cargar los datos
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $usuarioNombre = $row['nombre'];
    $usuarioApellido = $row['apellido'];
    $usuarioEmail = $row['email'];
    $usuarioTelefono = $row['telefono'];
} else {
    header('Location: index.php');
    exit();
}

// Si el formulario se envía, actualizar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevoNombre = $_POST['nombre'];
    $nuevoApellido = $_POST['apellido'];
    $nuevoEmail = $_POST['email'];
    $nuevoTelefono = $_POST['telefono'];
    $nuevoPassword = $_POST['password'];
    $admin = 0;

    // Construir la consulta SQL
    if (!empty($nuevoPassword)) {
        // Encriptar la nueva contraseña y agregarla a la consulta
        $nuevoPasswordHash = password_hash($nuevoPassword, PASSWORD_DEFAULT);
        $updateSql = "UPDATE usuarios SET nombre = '$nuevoNombre', apellido = '$nuevoApellido', email = '$nuevoEmail', telefono = '$nuevoTelefono', password = '$nuevoPasswordHash', admin = $admin WHERE id = $usuarioId";
    } else {
        // Construir la consulta sin cambiar la contraseña
        $updateSql = "UPDATE usuarios SET nombre = '$nuevoNombre', apellido = '$nuevoApellido', email = '$nuevoEmail', telefono = '$nuevoTelefono', admin = $admin WHERE id = $usuarioId";
    }

    // Ejecutar la consulta
    if ($conexion->query($updateSql) === TRUE) {
        // Actualizar la información en la sesión
        $_SESSION['usuario_nombre'] = $nuevoNombre;
        $_SESSION['usuario_apellido'] = $nuevoApellido;
        $_SESSION['usuario_email'] = $nuevoEmail;
        $_SESSION['usuario_telefono'] = $nuevoTelefono;

        // Redirigir en caso de éxito
        header('Location: cuenta.php');
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
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

        <div class="container-form register ">
            <div class="information">
                 <div class="info-childs">
                    <h2>Bienvenido</h2>
                    <p>Ya eres parte de nuestra comunidad, disfurta de tus promociones y de los articulos que tenemos para ti</p>
                    
                </div>
            </div>

            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Edita tus datos</h2>
                    <div class="icons">
    
                    </div>
                    <form class="form" method="POST">
                        <input type="hidden" name="form_type" value="register"> <!-- Identificador de formulario --> 
                        <label for="nombre" >
                            <i class='bx bx-user'></i>
                            <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" value="<?php echo $usuarioNombre; ?>">
                        </label>
                        <label for="apellido">
                            <i class='bx bx-user'></i>
                            <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $usuarioApellido; ?>">
                        </label>
                        <label for="email">
                            <i class='bx bx-envelope' ></i>
                            <input type="email" placeholder="Tu Correo Electronico" name="email" id="email" value="<?php echo $usuarioEmail; ?>">
                        </label for="">
                        <label for="telefono">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="tel" placeholder="Tu Telefono" name="telefono" id="telefono" value="<?php echo $usuarioTelefono; ?>">
                        </label>

                        <label for="password">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="password" placeholder="Tu Contraseña" name="password" id="password" value="<?php echo $usuarioPassword; ?>" required>
                        </label>
                        <input type="submit" value="Editar">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>