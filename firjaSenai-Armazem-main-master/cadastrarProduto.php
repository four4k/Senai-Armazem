<?php

require 'repositorioProduto.php';
$produtoRecebido = new produto(NULL, $_REQUEST['codigo_produto'], $_REQUEST['nome_produto'], $_REQUEST['id_armazem'], $_REQUEST['id_estante'], $_REQUEST['id_prateleira'], $_REQUEST['id_posicao']);

$repositorioProduto->cadastrarProduto($produtoRecebido);

echo "<script> alert('Cadastrado com sucesso!'); </script>";
echo "<script> location.href='index.html';</script>";
?>


