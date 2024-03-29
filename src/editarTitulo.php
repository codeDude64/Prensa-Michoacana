<?php
session_start();
if($_SESSION['IdLogin'] == null){
    header('Location:index.html');
}

$conn = new mysqli('db','administrator','adminpass123','PrensaMichoacana');

if($conn->connect_errno){
    echo 'Error: Hubo un error al conectar la base de datos \n';
    echo 'Error: ' .$conn->connect_errno;
    exit;
  }

  $sql = 'Select * from Titulo where IdTitulo ='.$_GET['IdTitulo'];

  $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $NombrePeticion = $row['Nombre'];
        $EstadoPeticion = $row['Estado'];
        $CiudadPeticion = $row['Ciudad'];
        $PeriodicidadPeticion = $row['Periodicidad'];
        $ResponsablePeticion = $row['Responsable'];
        $NoPaginasPeticion = $row['NoPaginas'];
        $OrientacionYMedidasPeticion = $row['OrientacionYMedidas'];


        echo '<!DOCTYPE html>
        <html lang="es">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="./css/bootstrap.css">
            <title>Editar un Título</title>
        </head>
        
        <body>
            <main class="container">
                <header class="row">
                    <h1> Edita el título  '  .$_SESSION['NombreUsuario'].'</h1>
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
                    <!-- Aqui va el formulario nuevo para agregar un nuevo titulo -->
                    <div class="col-6 offset-3">
                        <div class="card">
                            <div class="card-body">
                                <form action="controllers/ActualizarTitulo.php" method="POST">
                                    <!-- Escondiendo un input con el idtitulo que se resive por get, para poider mandarlo por post -->
                                    <input name="IdTitulo" hidden type="text" value="'.$_GET['IdTitulo'].'">
                                    <div class="form-group">
                                        <label for=""> Nombre</label>
                                         <input name="Nombre" type="text" class="form-control" required value="'.$NombrePeticion.'">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <input name="Estado" type="text" class="form-control" required value="'.$EstadoPeticion.'">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ciudad</label>
                                        <input name="Ciudad" type="text"class="form-control" required value="'.$CiudadPeticion.'">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Periodicidad</label>
                                        <input name="Periodicidad" type="text" class="form-control"  required value="'.$PeriodicidadPeticion.'">
                                    </div>
                                    <div class="form-group">
                                        <label form="">Responsable</label>
                                        <input name="Responsable" type="text" class="form-control" required value="'.$ResponsablePeticion.'">
                                    </div>
                                    <div class="form-group">
                                        <label form="">No.de Páginas</label>
                                        <input name="Numerodepaginas" type="number" class="form-control" required value="'.$NoPaginasPeticion.'">
                                    </div>
                                    <div class="form-group">
                                        <label form="">Orientación y Medidas</label>
                                        <input name="Orientacionymedidas" type="text" class="form-control" required value="'.$OrientacionYMedidasPeticion.'">
                                    </div>
                                    <div class="form-group offset-12">
                                        <input type="reset" value="Cancelar" class="btn btn-primary disabled">
                                        <input type="submit" value="Actualizar" class="btn btn-primary active">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </body>
        
        </html>';
    }else{
        echo 'Error no hay resultados de esta peticion';
    }
  
?>

<!-- <!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Editar un Título</title>
</head>

<body>
    <main class="container">
        <header class="row">
            <h1><?php echo 'Edita el título  '  .$_SESSION['NombreUsuario']?></h1>
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
  
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <form action="ActualizarTitulo.php" method="POST">
                           
                            <?php echo '<input name="IdTitulo" hidden type="text" value="'.$_GET['IdTitulo'].'">';?>
                            <div class="form-group">
                                <label for=""> Nombre</label>
                                <?php echo '<input name="Nombre" type="text" class="form-control" required '.$NombrePeticion.'>' ?>
                            </div>
                            <div class="form-group">
                                <label for="">Estado</label>
                                <input name="Estado" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Ciudad</label>
                                <input name="Ciudad" type="text"class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Periodicidad</label>
                                <input name="Periodicidad" type="text" class="form-control"  required>
                            </div>
                            <div class="form-group">
                                <label form="">Responsable</label>
                                <input name="Responsable" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label form="">No.de Páginas</label>
                                <input name="Numerodepaginas" type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label form="">Orientación y Medidas</label>
                                <input name="Orientacionymedidas" type="text" class="form-control" required>
                            </div>
                            <div class="form-group offset-12">
                                <input type="reset" value="Cancelar" class="btn btn-primary disabled">
                                <input type="submit" value="Actualizar" class="btn btn-primary active">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html> -->