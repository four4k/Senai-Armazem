<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main/styles/relatorio.css">
    <link rel="stylesheet" href=".main/styles/fonts.css">
    <link rel="stylesheet" href="main/styles/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
<body>
    <style>
    ol,ul {
        padding-left: 0;
    }

    ol,ul,dl {
        margin-top: 0;
        margin-bottom: 0;
    }
    body{
        background-color: #f8fafd;
    }

    </style>
<header>
    <div class="logo">
    <a href="index.html"><img src="main/assets/images/main_logo.png"></a>
    </div>
    <nav id="nav">
    <ul id="menu">
        <li><a href="#">Cadastro</a>
            <ul class="submenu">
                <li><a href="main/forms/formWarehouse.html">Armazém</a></li>
                <li><a href="main/forms/formBookcase.html">Estante</a></li>
                <li><a href="main/forms/formShelf.html">Prateleira</a></li>
                <li><a href="main/forms/formPosition.html">Posição</a></li>
            </ul>
        </li>
        <li><a href="relatorio.php">Relatório</a></li>
        <li><a href="main/forms/formProducts.html">Produtos</a></li>
    </ul>
    </nav>
</header>
        <main>
        <form class="storage">
            <?php
            require_once 'config.php';
            function exibirDados($con, $sql, $titulo, $campos)
            {
                echo "<h3 class='title' >$titulo</h3>";
                echo "<table class='table'>";
                echo "<thead><tr>";
                foreach ($campos as $campo) {
                    echo "<th id='th'>$campo</th>";
                }
                echo "</tr></thead><tbody>";
                $result = $con->query($sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($campos as $campo) {
                                echo "<td>" . $row[$campo] . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . count($campos) . "'>Nenhum registro encontrado</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='" . count($campos) . "'>Erro na consulta: " . $con->error . "</td></tr>";
                }
                echo "</tbody></table>";
            }
            // armazéns
            $sql = "SELECT nome as 'Nome', codigo_armazem as 'Codigo do armazem' FROM armazem";
            $campos_armazens = array("Nome", "Codigo do armazem");
            exibirDados($con, $sql, "Armazens", $campos_armazens);

            // estantes
            $sql = "SELECT codigo_estante as 'Codigo da estante', id_armazem as 'Codigo do armazem' FROM estante";
            $campos_estantes = array("Codigo da estante", "Codigo do armazem");
            exibirDados($con, $sql, "Estantes", $campos_estantes);

            // prateleiras
            $sql = "SELECT codigo_prateleira as 'Codigo da prateleira', id_estante as 'Codigo da estante' FROM prateleira";
            $campos_prateleiras = array("Codigo da prateleira", "Codigo da estante");
            exibirDados($con, $sql, "Prateleiras", $campos_prateleiras);
            $con->close();
            ?>
        </form>
        </main>
</body>
</html>
