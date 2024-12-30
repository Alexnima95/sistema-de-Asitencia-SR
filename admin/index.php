<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="../srasistencia/css/estilo.css">
    <title>Ingreso Administrador</title>
    <style>
        /* Estilo general para centrar el contenido */
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .title{
    font-size: 25px; /* Tamaño del texto */
  font-weight: bold; /* Opcional: Negrita */
    text-align: center;
    color: #000;
        }

        .titulo{
    font-size: 18px; /* Tamaño del texto */
  font-weight: bold; /* Opcional: Negrita */
    text-align: center; 
    
    }

        .login-box {
            background: #ffffff;
            margin-top: 50px;
            border-radius: 10px 5% / 20px 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logosr{
            max-width: 200px;
           
        }

        .login-logo p {
            font-size: 15px;
            color: #333;
            font-weight: bold;
           
        }
         .login-logo p {
            font-size: 15px;
            color: #333;
            font-weight: bold;
           
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            box-shadow: none;
        }

        .form-control:focus {
            border-bottom: 2px solid #007bff;
            box-shadow: none;
        }

        .form-group.has-feedback .form-control-feedback {
            right: 10px;
        }

        #datetime {
            font-size: 1em;
            color: #000;
            font-weight: bold;
            margin-top: 20px;
        }

        .alert {
            font-size: 0.9em;
        }
    </style>
</head>
<body>
<div class="login-box">
   
    <!-- Formulario -->
    <div class="login-box-body">
       <img src="../images/S-R.png" alt="Logotipo" class="logosr">
        <!-- Cambia la ruta del logotipo según sea necesario -->
        <p class="title">ACCEDE AL SISTEMA DE ASISTENCIA</p>
       
        <p class="titulo">Ingresa tus credenciales para continuar</p>

        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Ingresa tu Usuario" required autofocus>
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Ingresa tu Contraseña" required>
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name="login">
                    <i class="fa fa-sign-in"></i> Ingresar
                </button>
            </div>
        </form>

        <!-- Fecha y hora -->
        <div id="datetime"></div>
    </div>

    <!-- Alertas de error -->
    <?php
    if (isset($_SESSION['error'])) {
        echo "
            <div class='alert alert-danger mt-3'>
                <p>" . $_SESSION['error'] . "</p>
            </div>
        ";
        unset($_SESSION['error']);
    }
    ?>
</div>

<script>
    // Función para mostrar la fecha y hora actual
    function updateDateTime() {
        const now = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false };
        document.getElementById('datetime').innerText = now.toLocaleString('es-ES', options);
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
