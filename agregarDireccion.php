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

session_start(); // Asegúrate de iniciar la sesión

// Verificar si el usuario ha iniciado sesión
$isAuthenticated = isset($_SESSION['usuario_id']);
$usuarioNombre = $isAuthenticated ? $_SESSION['usuario_nombre'] : ''; // Obtener el nombre del usuario

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Para ver qué valores se están enviando
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $codigoPostal = $_POST['codigo_postal'];
    $colonia = $_POST['colonia'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];
    $usuarioId = $_SESSION['usuario_id'];

    $alertas = [];

    $sql = "INSERT INTO direccion (calle, numero, colonia, codigo_postal, pais, estado, ciudad, descripcion_hogar, idUsuario) 
        VALUES ('$calle', $numero, '$colonia', $codigoPostal, '$pais', '$estado', '$ciudad', '$descripcion', $usuarioId)";

                   
    if ($conexion->query($sql) === TRUE) {
        header('Location: cuenta.php'); // Redirige en caso de éxito
        exit();
    } else {
        $alertas[] = 'Hubo un error al registrar el usuario.';
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="css/styleDireccion.css">
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
                    <h2>Bienvenido <?php echo $usuarioNombre; ?></h2>
                    <p>Ya eres parte de nuestra comunidad, disfurta de tus promociones y de los articulos que tenemos para ti</p>
                    
                </div>
            </div>

            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Agregar tu direccion</h2>
                    <div class="icons">
    
                    </div>
                    <form class="form" method="POST">
                        
                        <label for="calle">
                            <i class='bx bx-user'></i>
                            <input type="text" name="calle" id="calle" placeholder="Tu Calle">
                        </label>
                        <label for="numero">
                            <i class='bx bx-user'></i>
                            <input type="number" name="numero" id="numero" placeholder="Tu Numero">
                        </label>
                        <label for="codigo_postal">
                            <i class='bx bx-envelope'></i>
                            <input type="number" name="codigo_postal" id="codigo_postal" placeholder="Tu Código Postal">
                        </label>
                        <label for="colonia">
                            <i class='bx bx-lock-alt'></i>
                            <input type="text" name="colonia" id="colonia" placeholder="Tu Colonia">
                        </label>
                        <label for="pais">
                            <i class='bx bx-lock-alt'></i>
                            <input type="text" name="pais" id="pais" placeholder="Tu País">
                        </label>
                        <label for="estado">
                            <i class='bx bx-lock-alt'></i>
                            <input type="text" name="estado" id="estado" placeholder="Tu Estado">
                        </label>
                        <label for="ciudad">
                            <i class='bx bx-lock-alt'></i>
                            <input type="text" name="ciudad" id="ciudad" placeholder="Tu Ciudad">
                        </label>
                        <label for="descripcion_hogar">
                            <i class='bx bx-lock-alt'></i>
                            <input type="text" name="descripcion_hogar" id="descripcion_hogar" placeholder="Tu Descripción">
                        </label>

                        <input type="submit" value="Agregar">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>