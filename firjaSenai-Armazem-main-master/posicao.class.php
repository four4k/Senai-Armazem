
<?php

class posicao {
    private $id_posicao;
    private $codigo;
    private $id_prateleira;

    function __construct($id_posicao, $codigo, $id_prateleira) {
        $this->id_posicao = $id_posicao;
        $this->codigo = $codigo;
        $this->id_prateleira = $id_prateleira;
    }

    public function setId_posicao($id_posicao) {
        $this->id_posicao = $id_posicao;
    }
    public function getId_posicao() {
        return $this->id_posicao;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function getCodigo() {
        return $this->codigo;
    }
    
    public function setId_prateleira($id_prateleira) {
        $this->id_prateleira = $id_prateleira;
    }
    public function getId_prateleira() {
        return $this->id_prateleira;
    }
}
?>