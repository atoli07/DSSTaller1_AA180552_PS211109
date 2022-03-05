<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar sticky-top navbar-light" id="barra">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" id="title">Planificador de eventos</a>
            <form class="d-flex justify-content-end" id="buttons">
                <a class="btn btn-outline-primary" href="index.php" role="button">Cerrar sesión</a>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="shadow-sm p-3 mb-5 bg-body rounded">
                <legend>Agregar nuevo evento</legend>
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
            </div>
            <?php
            include_once('class/evento.class.php');
            include_once('class/InicioSesion.php');
            $evento = new eventoXusuario();
            $user = new usuario();
            $Usuario = $user->VerificarUsuario();

            if (isset($_POST['enviar'])) {
                $title = $_POST['title'];
                $date = $_POST['date'];
                $desc = $_POST['desc'];

                $timestamp = strtotime($date);
                $newDate = date("d/m/Y", $timestamp);

                $evento->agregarEvento($title, $newDate, $desc, $Usuario);
            }
            $eventos = $evento->obtenerEventos($Usuario);
            $eventosOrdenados = $evento->ordenarXfecha($Usuario);
            echo'<div class="row g-3">';
            foreach ($eventosOrdenados as $event) {
                echo "<div class=\"card col-3\" style=\"width: 18rem;\">";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\">" . $event->getTitulo() . "</h5>";
                echo '<h6 class="card-subtitle mb-2 text-muted">' . $event->getFecha() . '</h6>';
                echo '<p class="card-text">' . $event->getDescripcion() . '</p>';
                echo "</div>";
                echo "</div>";
            }
            echo'</div>';
        

            ?>
        </div>
</body>

</html>