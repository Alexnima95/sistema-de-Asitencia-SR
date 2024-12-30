

<link rel="stylesheet" href="../srasistencia/css/estilo.css">

<?php session_start(); ?>
<?php include 'header.php'; ?>



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

    <div class="alert alert-success alert-dismissible mt20 text-center" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span class="result"><i class="icon fa fa-check"></i> <span class="message"></span></span>
    </div>

    <div class="alert alert-danger alert-dismissible mt20 text-center" style="display:none;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span class="result"><i class="icon fa fa-warning"></i> <span class="message"></span></span>
    </div>
</div>

	
<?php include 'scripts.php' ?>
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('LL'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);

  $('#attendance').submit(function(e){
    e.preventDefault();
    var attendance = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'attendance.php',
      data: attendance,
      dataType: 'json',
      success: function(response){
        if(response.error){
          $('.alert').hide();
          $('.alert-danger').show();
          $('.message').html(response.message);
        }
        else{
          $('.alert').hide();
          $('.alert-success').show();
          $('.message').html(response.message);
          $('#employee').val('');
        }
      }
    });
  });
    
});
</script>
</body>
</html>