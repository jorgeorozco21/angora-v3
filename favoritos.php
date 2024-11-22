<?php
session_start(); // Asegúrate de iniciar la sesión

// Verificar si el usuario ha iniciado sesión
$isAuthenticated = isset($_SESSION['usuario_id']);
$usuarioNombre = $isAuthenticated ? $_SESSION['usuario_nombre'] : ''; // Obtener el nombre del usuario
$usuarioApellido = $_SESSION['usuario_apellido'];
$usuarioEmail = $_SESSION['usuario_email'];
$usuarioTelefono = $_SESSION['usuario_telefono'];
// Obtener el ID del usuario desde la sesión
$usuarioId = $_SESSION['usuario_id'];
$usuarioPassword = $_SESSION['usuario_password'];
$agregado = false;

$host = 'localhost';
$dbname = 'angora';
$username = 'root';
$password = '';

// Crear conexión
$conexion = new mysqli($host, $username, $password, $dbname);
// Datos de productos en JSON (igual que en detalleProducto.php)


// Verifica si la acción es agregar o eliminar
if (isset($_POST['action']) && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    // Obtén los favoritos almacenados en la sesión (puedes usar la base de datos si prefieres)
    if (!isset($_SESSION['favorites'])) {
        $_SESSION['favorites'] = [];
    }

    if ($action == 'add') {
        // Agregar el producto a favoritos si no está ya en la lista
        if (!in_array($productId, $_SESSION['favorites'])) {
            $_SESSION['favorites'][] = $productId;
        }
    } elseif ($action == 'remove') {
        // Eliminar el producto de favoritos
        $_SESSION['favorites'] = array_filter($_SESSION['favorites'], function($id) use ($productId) {
            return $id != $productId;
        });
        $_SESSION['favorites'] = array_values($_SESSION['favorites']); // Reindexar el array
    }

    // Devolver respuesta si es necesario
    json_encode(['favorites' => $_SESSION['favorites']]);
} else {
    json_encode(['error' => 'Acción o producto no especificado']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angora Sport Shop - Favoritos</title>
    <link rel="stylesheet" href="css/menu_principal.css">
    <link rel="stylesheet" href="css/favoritos.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" href="imagenes/angoraFavicon.png" type="image/x-icon">
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav>
            <div class="contenedor_nav">
                <a href="index.php">
                    <img id="logo" src="imagenes/angora_logo.png" alt="Logotipo de Angora Sport Shop">
                </a>
                <div class="contenedor_menu">
                    <ul class="menu_nav">
                        <li class="item_nav"><a href="mens.php" class="item_link">Men's</a></li>
                        <li class="item_nav"><a href="womens.php" class="item_link">Women's</a></li>
                    </ul>
                </div>
            </div>
            <div class="contenedor_perfil">
                <div id="contenedor_buscar">
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar">
                </div>
                <a href="login.php"><img src="imagenes/login.png" alt="Login"></a>
                <a href="#"><img src="imagenes/corazon.png" alt="Lista de Deseos"></a>
                <a href="carritoProducto.php"><img src="imagenes/bolsa_compras.png" alt="Compras"></a>
            </div>
        </nav>
    </header>

    <!-- Título de la página -->
    <div class="favorites-header">
        <h1>Productos Favoritos</h1>
    </div>

    <!-- Lista de productos favoritos -->
    <div class="favorites-list" id="favorites-list">
        <!-- Los productos favoritos se cargarán aquí -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section pages">
            <div class="page-info">
                <h3> My Account </h3>
<<<<<<< HEAD
                <a href="login.html"> Login </a>
            </div>
            <div class="page-info">
                <h3> Help </h3>
                <a href="contacto.html"> Contact </a>
=======
                <a href="login.php"> Login </a>
            </div>
            <div class="page-info">
                <h3> Help </h3>
                <a href="contacto.html"> Contact </a>
>>>>>>> e0bc31157671ffa74463292194c9f60b34529ffc
            </div>
            <div class="page-info">
                <h3> Pages </h3>
                <a href="blog.html"> Blog </a>
                <a href="nosotros.html"> About Us </a>
            </div>
        </div>
        <div class="footer-section payment">
            <img src="imagenes/cc-visa.png" alt="Visa" class="payment-icon">
            <img src="imagenes/american-express (1).png" alt="Amex" class="payment-icon">
            <img src="imagenes/cc-apple-pay.png" alt="Apple Pay" class="payment-icon">
        </div>

        <div class="footer-section social">
            <p> Follow us on:</p>
            <div class="social-icons">
                <a href="#"><img src="imagenes/instagram.png" alt="Instagram"></a>
                <a href="#"><img src="imagenes/tik-tok.png" alt="TikTok"></a>
                <a href="#"><img src="imagenes/twitter-alt.png" alt="Twitter"></a>
                <a href="#"><img src="imagenes/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="imagenes/pinterest.png" alt="Pinterest"></a>
            </div>
        </div>

        <div class="footer-bottom">
            <hr>
            <p>© 2024 | Angora Sport Shop | All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Datos de productos en JSON (igual a detalleProducto)
        const products = {
            49: {
                name: "Top Gris",
                price: "$35.00",
                image: "imagenes/top1.png",
                description: "Ideal para entrenamientos ligeros, con material transpirable."
            },
            50: {
                name: "Top Negro",
                price: "$35.00",
                image: "imagenes/top2.png",
                description: "Perfecto para yoga o correr, con diseño moderno y elástico."
            },
            51: {
                name: "Top Azul",
                price: "$35.00",
                image: "imagenes/top3.png",
                description: "Top con diseño cruzado que combina soporte y estilo."
            },
            52: {
                name: "Short Negro",
                price: "$30.00",
                image: "imagenes/short1.png",
                description: "Short de cintura alta que moldea y absorbe el sudor."
            },
            53: {
                name: "Short Negro",
                price: "$30.00",
                image: "imagenes/short2.png",
                description: "Diseño ergonómico y flexible, ideal para cualquier actividad."
            },
            54: {
                name: "Short Azul",
                price: "$32.00",
                image: "imagenes/short3.png",
                description: "Short con bolsillos, ideal para entrenamientos intensos."
            },
            1: {
        name: "Top Crema",
        price: "$20.00",
        image: "imgWomens/1.png",
        description: "Top de excelente calidad."
    },
    2: {
        name: "Top Negro",
        price: "$35.00",
        image: "imgWomens/2.png",
        description: "Top negro clásico, ideal para cualquier ocasión."
    },
    3: {
        name: "Top Rosa",
        price: "$35.00",
        image: "imgWomens/3.png",
        description: "Top rosa de alta calidad."
    },
    4: {
        name: "Conjunto Negro",
        price: "$35.00",
        image: "imgWomens/4.png",
        description: "Conjunto negro de alta calidad."
    },
    5: {
        name: "Top Blanco",
        price: "$35.00",
        image: "imgWomens/5.png",
        description: "Top blanco cómodo y elegante."
    },
    6:{
        name:"T-Shirt Verde",
        price: "$35.00",
        image:"imgWomens/6.png",
        description:"T-Shirt verde comodo y elegante"
    },
    8:{
        name:"T-Shirt Negra",
        price: "$35.00",
        image:"imgWomens/8.png",
        description:"T-Shirt Negra comodo y elegante"
    },
    9:{
        name:"Jacket Morada",
        price: "$35.00",
        image:"imgWomens/9.png",
        description:"Jacket morada comoda y elegante"
    },
    10:{
        name:"T-Shirt Verde Nike",
        price: "$35.00",
        image:"imgWomens/10.png",
        description:"T-Shirt verde nike comodo y elegante"
    },
    11:{
        name:"T-Shirt Azul",
        price: "$35.00",
        image:"imgWomens/11.png",
        description:"T-Shirt azul comodo y elegante"
    },
    12:{
        name:"Top Negro",
        price: "$35.00",
        image:"imgWomens/12.png",
        description:"Top Negro comodo y elegante"
    },
    13:{
        name:"Top Amarillo",
        price: "$35.00",
        image:"imgWomens/13.png",
        description:"Top Amarillo comodo y elegante"
    },
    14:{
        name:"Top Verde",
        price: "$35.00",
        image:"imgWomens/14.png",
        description:"Top verde comodo y elegante"
    },
    15:{
        name:"Top Rosa",
        price: "$35.00",
        image:"imgWomens/15.png",
        description:"Top rosa comodo y elegante"
    },
    16:{
        name:"Conjunto Azul",
        price: "$35.00",
        image:"imgWomens/16.png",
        description:"Conjunto azul comodo y elegante"
    },
    17:{
        name:"Bolsa Adidas",
        price: "$35.00",
        image:"imgWomens/17.png",
        description:"Bolsa Adidas comoda y elegante"
    },
    18:{
        name:"Conjunto Blanco",
        price: "$35.00",
        image:"imgWomens/18.png",
        description:"Conjunto blanco comodo y elegante"
    },
    19:{
        name:"T-Shirt Gris Reebok",
        price: "$35.00",
        image:"imgWomens/19.png",
        description:"T-Shirt gris reebok comodo y elegante"
    },
    20:{
        name:"Tenis Reebok",
        price: "$35.00",
        image:"imgWomens/20.png",
        description:"Tennis Reebok comodos y elegantes"
    },
    21:{
        name:"Leggins Negras Under Armour",
        price: "$35.00",
        image:"imgWomens/21.png",
        description:"Leggins negras comodas y elegantes"
    },
    22:{
        name:"Conjunto Completo Reebok",
        price: "$35.00",
        image:"imgWomens/22.png",
        description:"Conjunto completo reebok comodo y elegante"
    },
    23:{
        name:"Jacket Crema",
        price: "$35.00",
        image:"imgWomens/23.png",
        description:"Jacket crema comoda y elegante"
    },
    24:{
        name:"Jacket Gris",
        price: "$35.00",
        image:"imgWomens/24.png",
        description:"Jacket gris comoda y elegante"
    },
    7:{
        name:"T-Shirt Blanca",
        price: "$35.00",
        image:"imgWomens/7.png",
        description:"T-Shirt blanca comoda y elegante"
    },



    25: {
        name: "T-Shirt Gris ",
        price: "$20.00",
        image: "imgMens/1.png",
        description: "T-Shirt Gris de excelente calidad."
    },
    26: {
        name: "Sueter Negro",
        price: "$35.00",
        image: "imgMens/2.png",
        description: "Sueter Negro clásica, ideal para cualquier ocasión."
    },
    27: {
        name: "Sueter Negro Premium",
        price: "$35.00",
        image: "imgMens/5.png",
        description: "Sueter negro premium de alta calidad."
    },
    28: {
        name: "Sueter Gris",
        price: "$35.00",
        image: "imgMens/4.png",
        description: "Sueter gris de alta calidad."
    },
    29: {
        name: "T-Shirt Negra",
        price: "$35.00",
        image: "imgMens/3.png",
        description: "T-Shirt Negra cómodo y elegante."
    },
    30:{
        name:"T-Shirt Crema",
        price: "$35.00",
        image:"imgMens/12.png",
        description:"T-Shirt Crema comodo y elegante"
    },
    31:{
        name:"Pants Negro",
        price: "$35.00",
        image:"imgMens/7.png",
        description:"Pants negro comodo y elegante"
    },
    32:{
        name:"Conjunto Blanco Youngla",
        price: "$35.00",
        image:"imgMens/8.png",
        description:"Conjunto Blanco Youngla comodo y elegante"
    },
    33:{
        name:"Pants Verde",
        price: "$35.00",
        image:"imgMens/9.png",
        description:"Pants verde comodo y elegante"
    },
    34:{
        name:"T-Shirt Negra Youngla",
        price: "$35.00",
        image:"imgMens/10.png",
        description:"T-Shirt Negra Youngla comodo y elegante"
    },
    35:{
        name:"Conjunto Deportivo Youngla",
        price: "$35.00",
        image:"imgMens/11.png",
        description:"Conjunto Deportivo Youngla comodo y elegante"
    },
    36:{
        name:"T-Shirt Gris Gymshark",
        price: "$35.00",
        image:"imgMens/6.png",
        description:"T-Shirt Gris Gymshark comodo y elegante"
    },
    37:{
        name:"Sueter azul",
        price: "$35.00",
        image:"imgMens/13.png",
        description:"Sueter azul comodo y elegante"
    },
    38:{
        name:"Sueter Verde",
        price: "$35.00",
        image:"imgMens/14.png",
        description:"Sueter verde comodo y elegante"
    },
    39:{
        name:"T-Shirt Blanca Adidas",
        price: "$35.00",
        image:"imgMens/15.png",
        description:"T-Shirt blanca adidas comodo y elegante"
    },
    40:{
        name:"T-Shirt Bulls NBA",
        price: "$35.00",
        image:"imgMens/16.png",
        description:"T-Shirt Bulls NBA comodo y elegante"
    },
    41:{
        name:"Conjunto Nike",
        price: "$35.00",
        image:"imgMens/17.png",
        description:"Conjunto Nike comodo y elegante"
    },
    42:{
        name:"Pants Negro Nike",
        price: "$35.00",
        image:"imgMens/18.png",
        description:"Pants Negro Nike comodo y elegante"
    },
    43:{
        name:"Conjunto Azul",
        price: "$35.00",
        image:"imgMens/19.png",
        description:"Conjunto Azul comodo y elegante"
    },
    44:{
        name:"Conjunto Negro",
        price: "$35.00",
        image:"imgMens/20.png",
        description:"Conjunto Negro comodo y elegante"
    },
    45:{
        name:"Conjunto Gris",
        price: "$35.00",
        image:"imgMens/21.png",
        description:"Conjunto Gris comodo y elegante"
    },
    46:{
        name:"Gorra Adidas Azul",
        price: "$35.00",
        image:"imgMens/22.png",
        description:"Gorra adisas azul comoda y elegante"
    },
    47:{
        name:"Mochila Adidas Negra",
        price: "$35.00",
        image:"imgMens/23.png",
        description:"Mochila adidas negra comoda y elegante"
    },
    48:{
        name:"Mochila Adidas Verde",
        price: "$35.00",
        image:"imgMens/24.png",
        description:"Mochila adidas verde comoda y elegante"
    }
        };
        // Función para cargar los productos favoritos desde localStorage
        function loadFavorites() {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            const favoritesListContainer = document.getElementById("favorites-list");

            // Limpiar la lista de favoritos al cargar
            favoritesListContainer.innerHTML = '';

            if (favorites.length === 0) {
                favoritesListContainer.innerHTML = "<p>No tienes productos favoritos.</p>";
                return;
            }

            favorites.forEach(productId => {
                if (products[productId]) {
                    const product = products[productId];
                    const productElement = document.createElement("div");
                    productElement.className = "favorite-product";
                    productElement.innerHTML = `
                        <div class="favorite-product-image">
                            <img src="${product.image}" alt="${product.name}">
                        </div>
                        <div class="favorite-product-info">
                            <h3>${product.name}</h3>
                            <p>${product.price}</p>
                            <p>${product.description}</p>
                            <button class="remove-button" data-id="${productId}">Eliminar</button>
                        </div>
                    `;
                    favoritesListContainer.appendChild(productElement);
                }
            });

            // Añadir eventos de eliminación a los botones
            document.querySelectorAll('.remove-button').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    removeFavorite(productId);
                });
            });
        }

        // Función para eliminar un favorito
        function removeFavorite(productId) {
            let favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            favorites = favorites.filter(id => id != productId);
            localStorage.setItem('favorites', JSON.stringify(favorites));
            loadFavorites(); // Recargar los favoritos después de eliminar
        }

        // Cargar los productos favoritos al cargar la página
        loadFavorites();
    </script>
</body>
</html>
