<?php
session_start(); // Asegúrate de iniciar la sesión
$isAuthenticated = isset($_SESSION['usuario_id']);
$usuarioNombre = $isAuthenticated ? $_SESSION['usuario_nombre'] : ''; // Obtener el nombre del usuario
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="css/menu_principal.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/resultados.css">
</head>
<body>
    <header>
        <nav>
            <div class="contenedor_nav">
                <a href="index.php">
                    <img id="logo" src="imagenes/angora_logo.png" alt="Logotipo de Angora Sport Shop">
                </a>
                <div class="contenedor_menu">
                    <ul class="menu_nav">
                      <li class="item_nav">
                        <a href="mens.php" class="item_link">
                           Men's 
                        </a>
                      </li>
                      <li class="item_nav">
                        <a href="womens.php" class="item_link">
                           Women's
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                <div class="contenedor_perfil">
                        <div id="contenedor_buscar">
                            <div class="boton_buscar">
                                <button onclick="searchProducts()" class="boton_buscar"> <img src="imagenes/buscar.png"> </button>
                            </div>
                            <input type="text" id="searchInput" placeholder="Buscar productos...">
                        </div>  
                        <?php if ($isAuthenticated) : ?>
                            <a href="cuenta.php" class="cuenta"> <img src="imagenes/login.png" alt="Login"> <span>Hola <?php echo htmlspecialchars($usuarioNombre); ?></span>  </a>
                            <a href="favoritos.php"> <img src="imagenes/corazon.png" alt="Lista de Deseos"> </a>
                        <?php else : ?>
                            <a href="login.php"> <img src="imagenes/login.png" alt="Login"> </a>
                        <?php endif; ?>   
                            <a href="carritoProducto.php"> <img src="imagenes/bolsa_compras.png" alt="Compras"> </a>
                </div>          
        </nav>
    </header>

    <section>
        <h1>Resultados de Búsqueda</h1>
        <div id="resultsContainer"></div>
    </section>

    <footer class="footer">
        <div class="footer-section pages">
            <div class="page-info">
                <h3> My Account </h3>
                <a href="login.php"> Login </a>
            </div>
            <div class="page-info">
                <h3> Help </h3>
                <a href="contacto.html"> Contact </a>
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
    <script src="buscar.js"></script>
    <script src="resultados.js"></script>
</body>
</html>
