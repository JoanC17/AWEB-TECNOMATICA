
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENTRAR</title>
    <link rel="stylesheet" href="styles-login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

</head>
<body>
<div id="app">
            <div v-if="!registrado">
              <h2>LOGIN</h2>
              <form class="primer-form" @submit.prevent="login">
                <div>
                  <label>Correo electrónico:</label>
                  <input v-model="loginForm.correo" type="email" class="form-control">
                  <p class="error-form">{{ errors.loginCorreo }}</p>
                </div>
                <div>
                  <label>Contraseña:</label>
                  <input class="form-control" v-model="loginForm.clave" type="password">
                  <p class="error-form" v-if="errors.loginClave" class="error">{{ errors.loginClave }}</p>
                </div>
                <input class="boton-inicio" value="INICIAR SESION" type="submit">
              </form>
              <p class="registro-parrafo">No tienes una cuenta? <a href="#" @click="registrarse">REGISTRESE AQUI</a></p>
            </div>

            
            <div v-else>
              <h2>REGISTER</h2>
              <form class="primer-form" @submit.prevent="registro">
                <div>
                  <label>Nombre:</label>
                  <input class="form-control" v-model="registroForm.nombre" type="text">
                  <p class="error-form" v-if="errors.registroNombre" class="error">{{ errors.registroNombre }}</p>
                </div>
                <div>
                  <label>Correo electrónico:</label>
                  <input class="form-control" v-model="registroForm.correo" type="email">
      
                  <p class="error-form" v-if="errors.registroCorreo" class="error">{{ errors.registroCorreo }}</p>
                </div>
                <div>
                  <label>Contraseña:</label>
                  <input class="form-control" v-model="registroForm.clave" type="password">
                  <p class="error-form" v-if="errors.registroClave" class="error">{{ errors.registroClave }}</p>
                </div>
                <div>
                    <label>Repetir Contraseña:</label>
                    <input class="form-control" v-model="registroForm.repetirclave" type="password">
                    <p class="error-form" v-if="errors.registroRepetirClave" class="error">{{ errors.registroRepetirClave }}</p>
                    <p class="error-form" v-if="errors.registroFailed" class="error">{{ errors.registroFailed }}</p>
                  </div>
                <input class="boton-inicio" value="REGISTRARSE" type="button" @click="registro">
              </form>
              <p>Ya tienes una cuenta? <a href="#" @click="iniciarSesion">INICIA SESION AQUI</a></p>
            </div>
        </div>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="init.js"></script>

    <script>      
      
      new Vue({
          el: '#app',
          data: {
            registrado: false,
            loginForm: {
              correo: '',
              clave: ''
            },
            registroForm: {
              nombre: '',
              correo: '',
              clave: '',
              repetirClave: ''
            },
            errors: {
              loginCorreo: '',
              loginClave: '',
              registroNombre: '',
              registroCorreo: '',
              registroClave: '',
              registroRepetirClave: '',
              registroFailed: ''
            }
          },
          methods: {
            async login() {
              this.resetErrors();
  
              // Validar campos
              if (!this.loginForm.correo.includes('@')) {
                this.errors.loginCorreo = 'Por favor ingresa un correo electrónico válido.';
              }
              if (this.loginForm.clave.length < 6) {
                this.errors.loginClave = 'La contraseña debe tener al menos 6 caracteres.';
              }
  
              // Si no hay errores, realizar lógica de inicio de sesión
              if (Object.values(this.errors).every(e => e === '')) {
                try{
                await firebase.auth().signInWithEmailAndPassword(this.loginForm.correo, this.loginForm.clave)
                this.registrado = true;
                console.log('Inicio de sesión exitoso');
                window.location.href = 'menu.php'
              } catch (error){
                console.error('Error al iniciar sesión:', error.message)
              }
            }
            },
            
            async registro() {
              this.resetErrors();
  
              // Validar campos
              if (this.registroForm.nombre.trim() === '') {
                this.errors.registroNombre = 'Por favor ingresa tu nombre.';
              }
              if (!this.registroForm.correo.includes('@')) {
                this.errors.registroCorreo = 'Por favor ingresa un correo electrónico válido.';
              }
              if (this.registroForm.clave.length < 6) {
                this.errors.registroClave = 'La contraseña debe tener al menos 8 caracteres.';
              }
              // if (this.registroForm.clave !== this.registroForm.repetirClave) {
              //   this.errors.registroRepetirClave = 'Las contraseñas no coinciden'
              // }
  
              // Si no hay errores, realizar lógica de registro
              if (Object.values(this.errors).every(e => e === '')) {
                try {
                  const userCredential = await firebase.auth().createUserWithEmailAndPassword(this.registroForm.correo, this.registroForm.clave);
                  const user = userCredential.user;

                  // Enviar el correo de verificación
                  await user.sendEmailVerification();

                  console.log('Registro exitoso. Se ha enviado un correo de verificación.');

                  // await firebase.auth().createUserWithEmailAndPassword(this.registroForm.correo, this.registroForm.clave);
                  // console.log('Registro succes')
                } catch (error){
                  this.errors.registroFailed = 'Error en registro:', error.message;
                  console.error('Error en registro ', error.message);
                }
              }
            },
            registrarse() {
              this.resetForm();
              this.registrado = true;
            },
            iniciarSesion() {
              this.resetForm();
              this.registrado = false;
            },
            resetForm() {
              this.loginForm.correo = '';
              this.loginForm.clave = '';
              this.registroForm.nombre = '';
              this.registroForm.correo = '';
              this.registroForm.clave = '';
              this.resetErrors();
            },
            resetErrors() {
              for (let key in this.errors) {
                this.errors[key] = '';
              }
            }
          }
        });
    </script>
       
</body>
</html>