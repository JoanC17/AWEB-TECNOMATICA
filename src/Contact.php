<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CONTACTANOS</title>
    <link rel="stylesheet" href="estilo_form.css">
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/a5d609a3d6.js" crossorigin="anonymous"></script>
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body>
    
    <div class="content">
        <div class="contact-wrapper animated bounceInUp">
            <div class="contact-form">
                <h3>Contactanos para Atenderte</h3>
                <form action="https://formsubmit.co/joanjcs123@gmail.com" method="POST">
                    <p>
                        <label>Nombre Completo</label>
                        <input type="text" name="fullname">
                    </p>
                    <p>
                        <label>Correo</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label>Numero Telefono</label>
                        <input type="tel" name="phone">
                    </p>
                    <p>
                        <label>Asunto</label>
                        <input type="text" name="affair">
                    </p>
                    <p class="block">
                       <label>Mensaje</label> 
                        <textarea name="message" rows="3"></textarea>
                    </p>
                    <p class="block">
                        <button>
                            Enviar
                        </button>
                        <a href="menu.php" class="btn-regresar">Regresar</a>
                    </p>
                </form>
            </div>
        </div>

    </div>

</body>
</html>