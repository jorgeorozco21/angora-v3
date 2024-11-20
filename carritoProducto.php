<?php
session_start(); // Asegúrate de que la sesión esté iniciada para poder trabajar con el carrito

// Obtener los productos desde el localStorage de forma dinámica
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angora Sport Shop - Carrito de Compras</title>
    <link rel="stylesheet" href="css/menu_principal.css">
    <link rel="stylesheet" href="css/detalleProducto.css">
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
                <a href="favoritos.php"><img src="imagenes/corazon.png" alt="Lista de Deseos"></a>
                <a href="#"><img src="imagenes/bolsa_compras.png" alt="Compras"></a>
            </div>
        </nav>
    </header>

    <div class="carrito-container">
        <h1>Mi Carrito de Compras</h1>
        
        <div id="carrito-productos"></div>
        
        <div id="carrito-vacio" style="display: none;">
            <p>No tienes productos en el carrito.</p>
        </div>
        
        <div id="total-carrito">
            <p>Total: <span id="total-price">$0.00</span></p>
            <button id="proceder-pago">Proceder al pago</button>
            <button id="eliminar-todos">Eliminar todo</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-section pages">
            <div class="page-info">
                <h3> My Account </h3>
                <a href="#"> Login </a>
            </div>
            <div class="page-info">
                <h3> Help </h3>
                <a href="#"> Contact </a>
            </div>
            <div class="page-info">
                <h3> Pages </h3>
                <a href="#"> Blog </a>
                <a href="#"> About Us </a>
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
        // Función para cargar el carrito desde el localStorage
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Verificar si el carrito está vacío
        if (cart.length === 0) {
            document.getElementById("carrito-vacio").style.display = "block";
            document.getElementById("carrito-productos").style.display = "none";
            document.getElementById("total-carrito").style.display = "none";
        } else {
            document.getElementById("carrito-vacio").style.display = "none";
            document.getElementById("carrito-productos").style.display = "block";
            document.getElementById("total-carrito").style.display = "block";

            // Datos de productos en JSON
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

            let total = 0;
            const carritoProductosContainer = document.getElementById("carrito-productos");

            // Recorrer el carrito y mostrar los productos
            cart.forEach(item => {
                const product = products[item.id];

                if (product) {
                    const productTotal = parseFloat(product.price.replace("$", "")) * item.quantity;
                    total += productTotal;

                    const productElement = document.createElement("div");
                    productElement.className = "producto-carrito";
                    productElement.innerHTML = `
                        <img src="${product.image}" alt="${product.name}" class="producto-imagen">
                        <div class="producto-info">
                            <h3>${product.name}</h3>
                            <p>${product.description}</p>
                            <p>Cantidad: ${item.quantity}</p>
                            <p>Precio: ${product.price}</p>
                            <p>Talla: ${item.size}</p>
                        </div>
                        <button class="eliminar-btn" data-id="${item.id}">Eliminar</button>
                    `;
                    carritoProductosContainer.appendChild(productElement);
                }
            });

            // Mostrar el total
            document.getElementById("total-price").innerText = `$${total.toFixed(2)}`;
        }

        // Función para eliminar un producto del carrito
        function eliminarProducto(id) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart = cart.filter(item => item.id !== id);
            localStorage.setItem("cart", JSON.stringify(cart));
            location.reload();  // Recargar la página para actualizar la vista
        }

        // Agregar el evento para eliminar productos
        document.getElementById("carrito-productos").addEventListener("click", function(event) {
            if (event.target.classList.contains("eliminar-btn")) {
                const id = event.target.getAttribute("data-id");
                eliminarProducto(id);
            }
        });

        // Función para eliminar todos los productos del carrito
        document.getElementById("eliminar-todos").addEventListener("click", function() {
            localStorage.removeItem("cart");
            location.reload();  // Recargar la página para mostrar el carrito vacío
        });
        




    </script>
</body>
</html>
