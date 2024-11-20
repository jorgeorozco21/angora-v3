<?php
session_start(); // Iniciar sesión

// Verificar si el usuario ha iniciado sesión
$isAuthenticated = isset($_SESSION['usuario_id']);
$usuarioId = $_SESSION['usuario_id'] ?? null;

// Datos de conexión
$host = 'localhost';
$dbname = 'angora';
$username = 'root';
$password = '';

// Crear conexión a la base de datos
$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Obtener datos de la dirección del usuario autenticado
$calle = $numero = $postal = $colonia = $pais = $estado = $ciudad = $descripcion = '';

if ($isAuthenticated) {
    $sql = "SELECT calle, numero, codigo_postal, colonia, pais, estado, ciudad, descripcion_hogar 
            FROM direccion WHERE idUsuario = $usuarioId";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $calle = $row['calle'];
        $numero = $row['numero'];
        $postal = $row['codigo_postal'];
        $colonia = $row['colonia'];
        $pais = $row['pais'];
        $estado = $row['estado'];
        $ciudad = $row['ciudad'];
        $descripcion = $row['descripcion_hogar'];
    } else {
        echo "No se encontraron datos de dirección.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $codigoPostal = $_POST['postal'];
    $colonia = $_POST['colonia'];
    $pais = $_POST['pais'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];

    // Actualizar los datos de la dirección en la base de datos
    $updateSql = "UPDATE direccion SET calle = '$calle', numero = $numero, colonia = '$colonia', codigo_postal = $codigoPostal,  
                pais = '$pais', estado = '$estado', ciudad = '$ciudad', descripcion_hogar = '$descripcion' 
                WHERE idUsuario = $usuarioId";

    if ($conexion->query($updateSql) === TRUE) {
        header("Location: cuenta.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
        echo "Consulta ejecutada: " . $updateSql;
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
                        <label for="calle" >
                            <i class='bx bx-user'></i>
                            <input type="text" name="calle" id="calle" placeholder="Tu Calle" value="<?php echo $calle; ?>" >
                        </label>
                        <label for="numero">
                            <i class='bx bx-user'></i>
                            <input type="number" name="numero" id="numero" placeholder="Tu Numero" value="<?php echo $numero; ?>" >
                        </label>
                        <label for="postal">
                            <i class='bx bx-envelope' ></i>
                            <input type="number" placeholder="Tu Código Postal" name="postal" id="postal" value="<?php echo $postal; ?>" >
                        </label>
                        <label for="colonia">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="tel" placeholder="Tu Colonia" name="colonia" id="colonia" value="<?php echo $colonia; ?>">
                        </label>
                        <label for="pais">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="pais" placeholder="Tu Pais" name="pais" id="pais" value="<?php echo $pais; ?>">
                        </label>

                        <label for="estado">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="estado" placeholder="Tu Estado" name="estado" id="estado" value="<?php echo $estado; ?>">
                        </label>

                        <label for="ciudad">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="ciudad" placeholder="Tu ciudad" name="ciudad" id="ciudad" value="<?php echo $ciudad; ?>">
                        </label>

                        <label for="descripcion">
                            <i class='bx bx-lock-alt' ></i>
                            <input type="text" placeholder="Tu descripcion" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
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