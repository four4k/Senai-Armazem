<?php
    require 'repositorioArmazem.php';

    $aramzemRecebido = new Armazem(NULL, $_REQUEST['codigo'], $_REQUEST['nome']);

    $repositorioArmazem->cadastrarArmazem($aramzemRecebido);


    echo "<script> alert('Armazem cadastrado com sucesso!'); 
    window.location.href='index.html';</script>";
?>
