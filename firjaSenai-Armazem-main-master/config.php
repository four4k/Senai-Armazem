<?php

// Array de estantes fictício
$estantes = array(
    array("id" => 1, "num_prateleiras" => 4, "capacidade_prateleira" => 50),
    array("id" => 2, "num_prateleiras" => 3, "capacidade_prateleira" => 40),
    array("id" => 3, "num_prateleiras" => 5, "capacidade_prateleira" => 60)
);

// Total de estantes
$total_estantes = count($estantes);

// Total de prateleiras
$total_prateleiras = 0;
foreach ($estantes as $estante) {
    $total_prateleiras += $estante['num_prateleiras'];
}

// Capacidade total do armazém
$capacidade_total = 0;
foreach ($estantes as $estante) {
    $capacidade_total += $estante['num_prateleiras'] * $estante['capacidade_prateleira'];
}

// Exibir relatório
echo "<h2>Registros dos Armazéns</h2>";
echo "<p>Total de Estantes: " . $total_estantes . "</p>";
echo "<p>Total de Prateleiras: " . $total_prateleiras . "</p>";
echo "<p>Capacidade Total do Armazém: " . $capacidade_total . "</p>";


// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "locadora"; // Nome de usuário do MySQL
$password = "alunolab"; // Senha do MySQL
$dbname = "sistema"; // Nome do banco de dados


$con = new mysqli($servername, $username, $password, $dbname);


if ($con->connect_error) {
    die("Erro na conexão com o banco de dados: " . $con->connect_error);
}
?>