<?php 
    $conn = new mysqli('db','administrator','adminpass123','PrensaMichoacana');
    if($conn->connect_errno){
        echo 'Error: Hubo un error al conectar la base de datos \n';
        echo 'Error: ' .$conn->connect_errno;
        exit;
      }
    $sql = 'UPDATE `Titulo` SET Status=false  WHERE IdTitulo='.$_GET['IdTitulo'];

    if($conn->query($sql)){
        header('Location: ../bienvenida.php');
      }else{
        echo "Error: Problemas al crear un nuevo titulo .... ".$conn->error;
    }

    $conn->close();

?>