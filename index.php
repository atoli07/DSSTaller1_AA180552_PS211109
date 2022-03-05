<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/inputFilter.js"></script>
</head>
<body>
<div class="container">
        <div class="header">
            <h1>Inicio de Sesión</h1>
        </div>
        <div class="contenedor">
            <form action="InicioSesion.php" method="post">
                <div class="inputIcon">
                    <input type="text" name="user" id="user"
                     placeholder="Ingrese su nombre de usuario" required>
                      <i class="bi bi-person-fill"></i>
                </div>
                <div class="inputIcon">
                    <input type="password" name="password" id="password"
                    placeholder="Ingrese su contraseña" required>
                     <i class="bi bi-lock-fill"></i>
                </div> 
                <div class="button" id="send">
                    <button type="submit" name="enviar" id="enviar" class="circularButton"><span>Ingresar</span></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
