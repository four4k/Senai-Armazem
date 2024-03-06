<?php

    require 'repositorioEstante.php';

    
    $estanteRecebida = new Estante(NULL, $_REQUEST['codigo'], $_REQUEST['id_armazem']);


   $repositorioEstante->cadastrarEstante($estanteRecebida);

    echo "<script> alert('Estante cadastrada com sucesso!'); </script>";
    echo "<script> location.href='index.html'; </script>";

?>
