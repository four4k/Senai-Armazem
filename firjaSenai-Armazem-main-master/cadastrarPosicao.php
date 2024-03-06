<?php

    require 'repositorioPosicao.php';

    $prodposicaoRecebido = new Posicao(NULL, $_REQUEST['codigo'], $_REQUEST['id_prateleira']);

    $repositorioPosicao->cadastrarPosicao($prodposicaoRecebido);

    echo "<script> alert('Posição cadastrada com sucesso!'); </script>";
    echo "<script> location.href='index.html'; </script>"
?>