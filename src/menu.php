<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="estilo.css">
    <title>P-Digital</title>
</head>

<body>
    <!-- SECCION I N I C I O -->
    <section id="inicio">
        <div class="contenido">
            <header>
                <div class="contenido-header">
                    <h1>TECNOMATICA</h1>
                    <nav id="nav" class="">
                        <ul id="links">
                            <li><a href="#inicio" class="seleccionado" onclick="seleccionar(this)">INICIO</a></li>
                            <li><a href="#sobremi" onclick="seleccionar(this)">QUIENES SOMOS</a></li>
                            <li><a href="#servicios" onclick="seleccionar(this)">SERVICIOS</a></li>
                            <li><a href="mapa/mapa.html" onclick="seleccionar(this)">UBICACION</a></li>
                            <li><a href="Contact.php" onclick="seleccionar(this)">CONTACTO</a></li>
                            <li><a href="pcbuilder.php" onclick="seleccionar(this)">PC BUILDER</a></li>
                            
                        </ul>
                    </nav>

                    <!-- Icono del menu responsive -->
                    <div id="icono-nav" onclick="responsiveMenu()">
                        <i class="fa-solid fa-bars"></i>
                    </div>

                    <div class="redes">
                        <a href="https://www.youtube.com/channel/UC9_wEW3SaA3K8r7MlQ8QqKw"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.facebook.com/Th3N3dragonMasterPro"><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://api.whatsapp.com/send?phone=9933484764&text=UTecnico Disponible?"><i class="fa-brands fa-whatsapp"></i></a>
                        <!-- Botón de cerrar sesión para mobile -->
                        <a href="index.php" onclick="cerrarSesion()" class="logout-mobile" title="Cerrar Sesión">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </div>
                </div>
            </header>
            <div class="presentacion">
                <p class="bienvenida">Bienvenidos</p>
                <h2><span>TECNOMATICA</span>, plataforma digital</h2>
                <p class="descripcion">Estamos a su disposición y puedes consultar los servicios</p>
                <a href="#servicios">Ver Servicios</a>
            </div>
        </div>
    </section>

    <!-- SECCION S O B R E M I -->
    <section id="sobremi">
        <div class="contenedor-foto">
            <img src="img/ing_foto.jpg" alt="">
        </div>
        <div class="sobremi">
            <p class="titulo-seccion">TECNICOS</p>
            <h2>Hola, Somos<span> TECNOMATICA</span></h2>
            <h3>Nosotros</h3>
            <p>En Tecnomática del Sureste, conectamos tu mundo con la mejor tecnología.
Ofrecemos una amplia gama de equipos de cómputo, componentes y accesorios de última generación, diseñados para cubrir todas tus necesidades, ya seas empresa o usuario final. Además, contamos con software especializado que potencia la eficiencia de tus operaciones.

Nuestro equipo experto te brinda servicios profesionales de mantenimiento, reparación, instalación de redes y soporte técnico, asegurando que tu tecnología funcione siempre al máximo. En Tecnomática del Sureste, estamos comprometidos con ofrecer soluciones confiables, innovadoras y a la medida, para que lleves tu productividad al siguiente nivel.

¡Confía en nosotros y experimenta la diferencia tecnológica!</p>
            <a href="Contact.php">Comunícate</a>
        </div>
    </section>

    <!-- SECCION S E R V I C I O S -->
    <section id="servicios">
    <h3 class="titulo-seccion">MIS SERVICIOS</h3>
    <div class="fila">
        <!-- Servicio 1 -->
        <div class="servicio">
            <span class="icono"><i class="fas fa-wrench"></i></span>
            <h4>Mantenimiento</h4>
            <hr>
            <ul class="servicios-tag">
                <li>Telefonía</li>
                <li>Impresoras</li>
                <li>Laptop</li>
            </ul>
            <p>Realizamos mantenimiento a equipos de cómputo, telefonía e impresoras</p>
            <a href="servicio_mantenimiento.php">Ver Más</a>
        </div>
        <!-- Servicio 2 -->
        <div class="servicio">
            <span class="icono"><i class="fas fa-lock"></i></span>
            <h4>Liberaciones</h4>
            <hr>
            <ul class="servicios-tag">
                <li>Compañía</li>
                <li>Contraseñas</li>
                <li>Bloqueos</li>
            </ul>
            <p>Liberación de compañía telefónica, recuperación de contraseñas o desbloqueos</p>
            <a href="servicio_liberaciones.php">Ver Más</a>
        </div>
        <!-- Servicio 3 -->
        <div class="servicio">
            <span class="icono"><i class="fas fa-mobile-alt"></i></span>
            <h4>Accesorios</h4>
            <hr>
            <ul class="servicios-tag">
                <li>Audífonos</li>
                <li>Fundas</li>
                <li>Micas</li>
            </ul>
            <p>Vendemos accesorios para sus teléfonos a precios accesibles</p>
            <a href="servicio_accesorios.php">Ver Más</a>
        </div>
    </div>
</section>
   <!-- SECCTION C O N T A C T O -->
<section id="contacto">
    <h3 class="titulo-seccion">Contáctanos ahora</h3>
    <div class="contenedor-form">
        <form id="contactForm">
            <div class="fila mitad">
                <input type="text" id="name" placeholder="Nombre Completo" class="input-mitad">
                <input type="email" id="emailid" placeholder="Dirección de Email" class="input-mitad">
            </div>
            <div class="fila">
                <textarea id="msgContent" cols="30" rows="10" placeholder="Tu Mensaje..." class="input-full"></textarea>
            </div>
            <button type="submit" class="btn-enviar">Enviar</button>
            </div>
        </form>
    </div>
</section>


    <!-- SECCION FOOTER -->
    <footer>
        <p>Todos los derechos reservados - 2025</p>
        <div class="redes">
            <a href="https://www.youtube.com/channel/UC9_wEW3SaA3K8r7MlQ8QqKw"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://www.facebook.com/Th3N3dragonMasterPro"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://api.whatsapp.com/send?phone=9933484764&text=UTecnico Disponible?"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </footer>

    <!-- Firebase Scripts -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="init.js"></script>
    <script src="script.js"></script>

    <script>
        // Función para mostrar el modal de cerrar sesión
        function cerrarSesion() {
            document.getElementById('logoutModal').style.display = 'flex';
        }

        // Función para cancelar el cerrar sesión
        function cancelarCerrarSesion() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        // Función para confirmar el cerrar sesión
        async function confirmarCerrarSesion() {
            try {
                // Cerrar sesión con Firebase
                await firebase.auth().signOut();
                
                // Mostrar mensaje de confirmación
                alert('Sesión cerrada exitosamente');
                
                // Redirigir al login
                window.location.href = 'index.php';
                
            } catch (error) {
                console.error('Error al cerrar sesión:', error);
                alert('Error al cerrar sesión. Inténtalo de nuevo.');
            }
        }

        // Cerrar modal al hacer clic fuera de él
        window.onclick = function(event) {
            const modal = document.getElementById('logoutModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }

        // Verificar si el usuario está autenticado al cargar la página
        firebase.auth().onAuthStateChanged(function(user) {
            if (!user) {
                // Si no hay usuario autenticado, redirigir al login
                window.location.href = 'index.php';
            }
        });
    </script>
</body>

</html>