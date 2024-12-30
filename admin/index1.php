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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/your/custom/styles.css">
    <title>Ingreso Administrador</title>
    <style>
        .login-box {
            border-radius: 10px; /* Bordes redondeados */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-logo img {
            max-width: 100px; /* Ajusta el tamaño del logotipo */
            margin-bottom: 15px;
        }
    </style>
</head>
<body class="">
<div class="login-box">
    <div class="login-logo">
        <img src="../images/S-R.png" alt="Logotipo"> <!-- Ruta del logotipo -->
        <a href="#"><b>Ingreso</b> Administrador</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Ingresa para iniciar tu sesión</p>

        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" required autofocus>
                <span class="fa fa-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">
                        <i class="fa fa-sign-in"></i> Ingresar
                    </button>
                </div>
            </div>
        </form>

        <!-- Mostrar fecha y hora -->
        <div class="text-center mt-3">
            <p id="datetime"></p>
        </div>
    </div>

    <?php
    if (isset($_SESSION['error'])) {
        echo "
            <div class='alert alert-danger text-center mt-3'>
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
    setInterval(updateDateTime, 1000); // Actualiza cada segundo
    updateDateTime(); // Llama a la función al cargar
</script>

<?php include 'includes/scripts.php'; ?>
</body>
</html>