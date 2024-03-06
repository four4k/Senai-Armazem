<?php

    require 'repositorioPrateleira.php';
    
    $prateleiraRecebida = new Prateleira(NULL, $_REQUEST['codigo'], $_REQUEST['id_estante']);

    $repositorioPrateleira->cadastrarPrateleira($prateleiraRecebida);

    echo "<script> alert('Prateleira cadastrada com sucesso!'); </script>";
    echo "<script> location.href='index.html'; </script>"; 

?>