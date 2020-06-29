<?php
 include "modulos/register.php";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Validación-->
  <link href="dist/css/validacion.css" rel="stylesheet">
  
  
  <link href="dist/css/sticky-footer-navbar.css" rel="stylesheet">
  
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Gift</b>.com</a>
  </div>

  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Registrarse</p>
      <!-- Inicio Form -->
      <form action="register.php" method="post" id="formulario">      
          <!-- Nombrey Apellido -->
          <div class="row mb-3">
            <div class="col-6">
              <div class="input-group">
                <input minlength="4" maxlength="13" type="text" name="txtNombre" class="form-control" placeholder="Nombre" required>           
                <div class="input-group-append">
                  <div class="input-group-text regist-card-body">
                    <span class="fas fa-user"></span>
                  </div>
                </div>                
              </div>
            </div>
            <div class="col-6">
              <div class="input-group">
                <input minlength="4" maxlength="13" type="text"name="txtApellido" class="form-control" placeholder="Apellido" required> 
                <div class="input-group-append">
                  <div class="input-group-text regist-card-body">
                    <span class="fas fa-user"></span>                
                  </div>
                </div>                
              </div>
            </div>
          </div>
          <!-- Rut -->
          <div class="input-group mb-3">
          <input type="text" name="txtRut" id="txtRut" class="form-control" placeholder="RUT" required />
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-user"></span>
            </div>
          </div>          
        </div> 
        <!-- Email -->       
        <div class="input-group mb-3">
          <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" placeholder="Email" onBlur="comprobarEmail()" required>        
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <!-- Telefono -->
        <div class="input-group mb-3">
          <input type="text" name="txtPhono" id="txtPhono" class="form-control" placeholder="Telefono" required />
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <!-- Regiones  -->
        <div class="input-group mb-3">
          <select name="cbxRegion" id="cbxRegion" class="form-control" required>
            <option selected value="0"> Region </option>
            <?php while ($region = $query->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $region['idRegion']; ?>"><?php echo $region['region']; ?></option>
            <?php } ?>
          </select>
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-flag red-text"></span>
            </div>
          </div>
        </div>
        <!-- Comunas  -->
        <div class="input-group mb-3">
        <select name="cbxComuna" id="cbxComuna" class="form-control" require></select>
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-flag-checkered red-text"></span>
            </div>
          </div>
        </div>
        <!-- Contraseña  -->
        <div class="input-group mb-3">
          <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Contraseña" required />
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Repite Contraseña  -->
        <div class="input-group mb-3">
          <input type="password" name="txtRetypePass" id="txtRetypePass" class="form-control" placeholder="Repetir Contraseña" onBlur="comprobarContraseña()" required>
          <div class="input-group-append">
            <div class="input-group-text regist-card-body">
              <span class="fas fa-lock red-text"></span>
            </div>
          </div>
        </div>
        <!-- Boton -->
        <div class="row">
          <div class="col-5 offset-7">
            <button type="submit" name="btnRegister" id="thesubmitBoton" class="btn btn-primary btn-block">Crear cuenta</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- O -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Iniciar sesión con Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Iniciar sesión con Google+
        </a>
      </div>

      <a href="login.php  " class="text-center">Ya estoy registrado</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Validación-->
<script src="dist/js/validacion.js"></script>
</body>
</html>