<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-light" id="barra">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" id="title">Planificador de eventos</a>
            <form class="d-flex justify-content-between col-md-3" id="buttons">
                <a class="btn btn-outline-info" href="eventos.php" id="button1" role="button">Ver eventos</a>
                <a class="btn btn-outline-primary" href="index.php" role="button">Cerrar sesión</a>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row g-3">
            <div class="form-floating col-md-6">
                <input type="text" class="form-control" id="floatingInput" name="title">
                <label for="floatingInput">Título del evento</label>
            </div>
            <div class="form-floating col-md-6">
                <input type="date" class="form-control" id="floatingInput" name="date">
                <label for="floatingInput">Fecha del evento</label>
            </div>
            <div class="form-floating col-12">
                <textarea class="form-control" id="floatingTextarea2" name="desc" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Descripción</label>
            </div>
            <div class="d-flex flex-row-reverse ">
                <button type="submit" class="btn btn-outline-info" name="enviar">Guardar</button>
            </div>
        </form>
        <?php
        include_once('class/evento.class.php');
        if (isset($_POST['enviar'])) {
            $title = $_POST['title'];
            $date = $_POST['date'];
            $desc = $_POST['desc'];

            $evento=new eventoXusuario();
            $evento->agregarEvento($title, $date, $desc, 'usuario2');
        }
        ?>
    </div>
</body>

</html>