<?php
session_start();
if($_SESSION['IdLogin'] == null){
    header('Location:index.html');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Agregar un Número</title>
</head>

<body>
    <main class="container">
        <header class="row">
            <h1><?php echo 'Agrega un Número  '  .$_SESSION['NombreUsuario']?></h1>
        </header>
        <nav class="row">
            <div class="col-12 navbar navbar-expand-sm bg-light bg-dark navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link mr-5" href="bienvenida.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link mr-5" href="about.html">Acerca de</a></li>
                    <li class="nav-item"><a class="nav-link mr-5" href="busqueda.php">Busqueda</a></li>
                    <div style="width: 14.9cm"></div>
                    <form action="cerrarSesion.php" method="get"><button class="btn btn-info ml-5" type="submit">Cerrar
                            Sesion</button></form>
                </ul>
            </div>
        </nav>
        <section class="row mt-5">
            <!-- Aqui va el formulario nuevo para agregar un nuevo número -->
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <?php echo '<form action="controllers/GuardarNumero.php?IdTomo='.$_GET['IdTomo'].'&NumeroTomo='.$_GET['NumeroTomo'].'&NombreTitulo='.$_GET['NombreTitulo'].'" method="POST"> ';?>
                            <?php echo '<input  hidden name="IdTomo" type="text" value='.$_GET['idTomo'].' >'; ?>
                            <?php echo '<input  hidden name="IdNumero" type="text" value="'.$_GET['IdNumero'].'" >'; ?>
                            <div class="form-group">
                                <label for=""> Numero de Periódico</label>
                                <input name="NoPeriodico" type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for=""> Fecha</label>
                                <input name="fecha" type="date" class="form-control" required>
                            </div>
                            
                            <div class="form-group offset-12">
                                <input type="reset" value="Cancelar" class="btn btn-primary disabled">
                                <input type="submit" value="Agregar" class="btn btn-primary active">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>