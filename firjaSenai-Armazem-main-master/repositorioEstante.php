<?php

    require_once 'conexao.class.php';
    include 'estante.class.php';

    interface IRepositorioEstante {
        public function cadastrarEstante($estante);
        public function removerEstante($estante);
        public function atualizarEstante($estante);
        public function buscarEstante($estante);
        public function getListarEstante();
    }


    class RepositorioEstanteSQL implements IRepositorioEstante {
        private $conexao;

        function __construct() {
            $this->conexao = new Conexao("localhost", "locadora", "alunolab", "sistema");
            if ($this->conexao->conectar() == false) {
                echo "Erro" . myslqi_error();
            }
        }

        public function cadastrarEstante($estante) {
            $id_estante = $estante->getId_estante();
            $id_armazem = $estante->getId_armazem();
            $codigo = $estante->getCodigo();

            $sql = "INSERT INTO estante(id_estante, codigo_estante, id_armazem) VALUES (NULL, '$codigo', '$id_armazem')";

            $this->conexao->executarQuery($sql);
        }

        public function removerEstante($id_estante) {
            $sql = "DELETE FROM estante Where id_estante = '$id_estante'";

            $this->conexao->executarQuery($sql);
        }

        public function atualizarEstante($estante){
            $id_estante = $estante->getId_estante();
            $id_armazem = $estante->getId_armazem();
            $codigo = $estante->getCodigo();

            $sql = "UPDATE estante SET codigo_estante = '$codigo', id_armazem = '$id_armazem' WHERE id_estante = '$id_estante'";

            $this->conexao->executarQuery($sql);
        }

        public function buscarEstante($id_estante) {
            $linha = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM estante WHERE id_estante = '$id_estante'");

            $estante = new Estante($linha['id_estante'],  $linha['codigo_estante'], $linha['id_armazem']);

            return $estante;
        }

        public function getListarEstante() {
            $listagem = $this->conexao->executarQuery("SELECT * FROM estante");

            $arrayEstante = array();

            while($linha = mysqli_fetch_array($listagem)) {
                $estante = new Estante($linha['id_estante'], $linha['codigo_estante'], $linha['id_armazem']);

                array_push($arrayEstante, $estante);

            }

            return $arrayEstante;
        }
    }

    $repositorioEstante = new RepositorioEstanteSQL();
?>