<?php
    session_start();
    if (isset($_SESSION['mensaje']))
    {
        $mensaje = $_SESSION['mensaje'];
        echo "<script languaje='javascript'>alert('$mensaje')</script>";
        unset($_SESSION['mensaje']);
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BuildingCop - Registro</title>

    <!-- Custom fonts for this template-->
    <link href="plantilla/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="plantilla/css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="javascript/funciones.js"></script>
    <script type="text/javascript" src="javascript/md5.js"></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrate</h1>
                            </div>
                            <form method="POST" action="Controlador.php" id="formRegistro" class="user">
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name = "con_nombre_empresa" id="exampleFirstName" required="required"
                                            placeholder="Nombre Empresa"
                                               value=<?php
                                               if (isset($_SESSION['con_nombre_empresa'])){
                                                   echo "\"".$_SESSION['con_nombre_empresa']."\"";
                                                   unset($_SESSION['con_nombre_empresa']);
                                               }
                                               ?>
                                        >
                                </div>

                                <center>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select name="con_id_identificacion" style="width: 80%; margin-top: 10px">
                                                <option value="1">NIT</option>
                                                <option value="2" selected>CC</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="number" class="form-control form-control-user" name="con_numero_documento" id="identificacion"
                                                   placeholder="identificación" required="required"
                                                   value=<?php
                                                   if (isset($_SESSION['con_numero_documento'])){
                                                       echo "\"".$_SESSION['con_numero_documento']."\"";
                                                       unset($_SESSION['con_numero_documento']);
                                                   }
                                                   ?>
                                            >
                                        </div>
                                    </div>
                                </center>

                                <div class="form-group">


                                    <input type="email" class="form-control form-control-user" name="usulogin" id="exampleInputEmail"
                                        placeholder="email" required="required"
                                           value=<?php
                                           if (isset($_SESSION['usulogin'])){
                                               echo "\"".$_SESSION['usulogin']."\"";
                                               unset($_SESSION['usulogin']);}
                                           ?>
                                    >
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                               id="InputPassword" name="password" placeholder="Password" value="" required="required">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                               id="InputPassword2" name="password2" value="" placeholder="Repeat Password">
                                    </div>
                                </div>
                                    <input type="hidden" name="ruta" value="gestionDeRegistro">
                                    <button  class="btn btn-primary btn-user btn-block" onclick="valida_registro()">Registrar</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">¿Ya tienes una cuenta? Inicia sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="plantilla/vendor/jquery/jquery.min.js"></script>
    <script src="plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="plantilla/js/sb-admin-2.min.js"></script>

</body>

</html>