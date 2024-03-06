<?php
    require 'conexao.class.php';
    
    include 'armazem.class.php';


    interface IRepositorioArmazem {
        public function cadastrarArmazem($armazem);
        public function removerArmazem($armazem);
        public function atualizarArmazem($armazem);
        public function buscarArmazem($armazem);
        public function getListarArmazem();
    }

    class RepositorioArmazemSQL implements IRepositorioArmazem {
        private $conexao;

        public function __construct(){
            $this->conexao = new Conexao("localhost", "locadora", "alunolab", "sistema");
            if ($this->conexao->conectar() == false) {
                echo "Erro" . myslqi_error();
            }
        }
    

        public function cadastrarArmazem($armazem) {
            $id_armazem = $armazem->getId_armazem();
            $codigo = $armazem->getCodigo();
            $nome = $armazem->getNome();

            $sql = "INSERT INTO armazem(id_armazem, codigo_armazem, nome) VALUES (NULL, '$codigo', '$nome')";

            $this->conexao->executarQuery($sql);
        }

        public function removerArmazem($id_armazem) {
            $sql = "DELETE FROM armazem WHERE id_armazem = '$id_armazem'";

            $this->conexao->executarQuery($sql);
        }

        public function atualizarArmazem($armazem) {
            $id_armazem = $armazem->getId_armazem();
            $codigo = $armazem->getCodigo();
            $nome = $armazem->getNome();

            $sql = "UPDATE armazem SET codigo_armazem = '$codigo', nome='$nome' WHERE id_armazem = '$id_armazem'";

            $this->conexao->executarQuery($sql);
        }

        public function buscarArmazem($id_armazem) {
            $linha = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM armazem WHERE id_armazem = '$id_armazem'");

            $armazem = new Armazem($linha['id_armazem'], $linha['codigo_armazem'], $linha['nome']);

            return $armazem;
        }

        public function getListarArmazem(){
            $listagem = $this->conexao->executarQuery("SELECT * FROM armazem");

            $arrayArmazem = array();

            while($linha = mysqli_fetch_array($listagem)) {
                $armazem = new Armazem($linha['id_armazem'], $linha['codigo_armazem'], $linha['nome']);

                array_push($arrayArmazem, $armazem);
            }

            return $arrayArmazem;
        }

    }

    $repositorioArmazem = new RepositorioArmazemSQL();
?>
