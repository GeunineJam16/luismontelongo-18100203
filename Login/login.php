<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../Plugins/package/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../Plugins/animate/animate.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <div class="sidenav">
            <div class="login-main-text">
                <h2>Proyecto Final<br> Login</h2>
                <p>Favor de inciar session</p>
            </div>
        </div>
        <div class="main">
            <div class="col-md-6 col-sm-12">
                <div class="login-form">
                
                    <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" class="form-control" placeholder="Usuario">
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" placeholder="Contrasena">
                    </div>
                    <br>
                    <button id="btnlogear" class="btn btn-black">Inciar</button>
                    <button id="btnregistrarme" class="btn btn-secondary">Registrarme</button>
                
                </div>
            </div>
        </div>
        
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../Plugins/package/dist/sweetalert2.all.min.js"></script>
        <script src="login.js"></script>
</body>     
</html>
