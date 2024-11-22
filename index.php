<?php
session_start(); // Asegúrate de iniciar la sesión
// Verificar si el usuario ha iniciado sesión
$isAuthenticated = isset($_SESSION['usuario_id']);
$usuarioNombre = $isAuthenticated ? $_SESSION['usuario_nombre'] : ''; // Obtener el nombre del usuario
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Angora Sport Shop </title>
    <link rel="stylesheet" href="css/menu_principal.css">
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" href="imagenes/angoraFavicon.png" type="image/x-icon">

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
                            <a href="index.php"> <img src="imagenes/corazon.png" alt="Lista de Deseos"> </a>
                        <?php endif; ?>
                            
                            <a href="carritoProducto.php"> <img src="imagenes/bolsa_compras.png" alt="Compras"> </a>
                </div>          
        </nav>
    </header>

    <div class="contenedor_banner">
        <video src="imagenes/video_banner.mp4" alt="Gym Essentials" autoplay loop> </video>
        <div class="texto">
            <h1> The Essentials </h1>
            <p> Hit up our gym essentials, then hit the gym. </p>
            <a href="womens.php"> <button> Shop Women </button> </a>
            <a href="mens.php"> <button> Shop Men </button> </a>
        </div>
    </div>
    
    <section>
        <div class="contenedor">
            <div class="titulo-iconos">
                <div class="t-shirt">
                    <h2>T-Shirts & Tops</h2>
                </div>
            </div>
    
            <div class="imagenes-ropa">
                <div class="ropa">
                    <a href="detalleProducto.php?id=49">
                        <img src="imagenes/top1.png" alt="Top 1">
                    </a>
                    <p>Top Gris</p>
                    <p>US $35</p>
                </div>
    
                <div class="ropa">
                    <a href="detalleProducto.php?id=50">
                        <img src="imagenes/top2.png" alt="Top 2">
                    </a>
                    <p>Top Negro</p>
                    <p>US $35</p>
                </div>
    
                <div class="ropa">
                    <a href="detalleProducto.php?id=51">
                        <img src="imagenes/top3.png" alt="Top 3">
                    </a>
                    <p>Top Azul</p>
                    <p>US $35</p>
                </div>
            </div>
        </div>

        <div class="contenedor">
            <div class="titulo-iconos">
                <div class="short">
                    <h2>Shorts</h2>
                </div>

            </div>
    
            <div class="imagenes-ropa">
                <div class="ropa">
                    <a href="detalleProducto.php?id=52">
                        <img src="imagenes/short1.png" alt="Short 1">
                    </a>
                    <p>Short Negro</p>
                    <p> US $35</p>
                </div>
    
                <div class="ropa">
                    <a href="detalleProducto.php?id=53">
                        <img src="imagenes/short2.png" alt="Short 2">
                    </a>
                    <p>Short Rosa</p>
                    <p>US $35</p>
                </div>
    
                <div class="ropa">
                    <a href="detalleProducto.php?id=54">
                        <img src="imagenes/short3.png" alt="Short 3">
                    </a>
                    <p>Short Azul</p>
                    <p>US $35</p>
                </div>
            </div>
        </div>
    </section>


    <section class="seccion">
        
        <div class="banner">
            <div class="text">
                <h1> Winter Season </h1>
                <p> Hit up our gym essentials, then hit the gym. </p>
                <a href="womens.php"> <button> Shop Women </button> </a>
                <a href="mens.php"> <button> Shop Men </button> </a>
            </div>
        </div>
    </section>

    <section class="seccion-marcas"> 
        <h1> Marcas Asociadas </h1>
            <hr>
        <div class="marcas">
            <div class="marca">
                <img src="imagenes/Adidas_Logo.png" alt="Logo de adidas">
            </div>

            <div class="marca">
                <img src="imagenes/Gymshark_logo.png" alt="Logo de gymshark">
            </div>

            <div class="marca">
                <img src="imagenes/Puma_Logo.png" alt="Logo de puma">
            </div>

            <div class="marca">
                <img src="imagenes/Nike-Logo.png" alt="Logo de nike">
            </div>

            <div class="marca">
                <img src="imagenes/new_era_logo.png" alt="Logo de new era">
            </div>

            <div class="marca">
                <img src="imagenes/New_Balance_logo.png" alt="Logo de new balance">
            </div>

            <div class="marca">
                <img src="imagenes/Under_armour_logo.png" alt="Logo de under armour">
            </div>

            <div class="marca">
                <img src="imagenes/youngla.avif" alt="Logo de youngla">
            </div>

            <div class="marca">
                <img src="imagenes/Reebok_logo.png" alt="Logo de reebok">
            </div>

            <div class="marca">
                <img src="imagenes/castore_logo.png" alt="Logo de castore">
            </div>
        </div>


    </section>

    <footer class="footer">
        <div class="footer-section pages">
            <div class="page-info">
                <h3> My Account </h3>
                <a href="login.php"> Login </a>
            </div>
            <div class="page-info">
                <h3> Help </h3>
<<<<<<< HEAD
                <a href="contacto.html"> Contact </a>
=======
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
    <script src="buscar.js"></script>
</body>
</html>