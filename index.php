
<link rel="stylesheet" href="../srasistencia/css/estilo.css">
<?php session_start(); ?>
<?php include 'header.php'; ?>
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

        .login-box {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-logo img {
            max-width: 250px;
            margin-bottom: 15px;
        }

        .login-logo b {
            font-size: 1em;
            color: #000;
        }

        .login-box-body {
            margin-top: 20px;
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
            font-size: 0.9em;
            color: #888;
            margin-top: 20px;
        }

        .alert {
            font-size: 0.9em;
        }
    </style>

<body class="">
<div class="login-box">
  	 <div class="login-box-body">
        <h3 class="title">Bienvenido a Oficina S&R <br>Estimado Colaborador</h4>

        <form id="attendance">
           <p class="titulo">Ingresa tu ID de Colaborador</p>
            <div class="form-group has-feedback">
                <input type="text" class="form-control input-lg" id="employee" name="employee" required placeholder="ID de Colaborador">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group">
                <p class="titulo">Seleccione Estado:</p>
                <select class="form-control" name="status">
                    <option value="in">Marcar Entrada</option>
                    <option value="out">Marcar Salida</option>
                </select>
            </div>

            <div class="row">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin">
                        <i class="fa fa-sign-in"></i> Registrar Asistencia 
                    </button>
                </div>
                 
            </div>
           <div class="date">
                 <p id="date" class="bold"></p>
                <p id="time" class="bold"></p>
                </div>
        </form>
    </div>

  	<!-- Alertas -->
		<div class="alert alert-success custom-alert text-center" style="display:none;">
      <span class="result"><i class="icon fa fa-check-circle"></i> <span class="message"></span></span>
    </div>
		<div class="alert alert-danger custom-alert text-center" style="display:none;">
      <span class="result"><i class="icon fa fa-exclamation-triangle"></i> <span class="message"></span></span>
    </div>
</div>

<?php include 'scripts.php'; ?>
<script type="text/javascript">
$(function() {
  // Actualizar fecha y hora
  setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('LL'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  // Manejar envío del formulario
  $('#attendance').submit(function(e) {
    e.preventDefault();
    var attendanceData = $(this).serialize();

    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendanceData,
      dataType: 'json',
      success: function(response) {
        $('.custom-alert').hide(); // Ocultar alertas previas
        var alertType = response.error ? '.alert-danger' : '.alert-success';
        $(alertType).fadeIn().find('.message').html(response.message);
        
        if (!response.error) $('#employee').val(''); // Limpiar input si no hay error

        // Ocultar alerta automáticamente después de 3 segundos
        setTimeout(function() {
          $(alertType).fadeOut();
        }, 3000);
      }
    });
  });
});
</script>
</body>
</html>
