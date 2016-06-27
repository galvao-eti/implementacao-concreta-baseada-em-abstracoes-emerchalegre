<?php

namespace Alfa;

class BaseDeDados implements \Alfa\Abstracao\BaseDeDados {

    public $conexao;
    public $nome;
    public $dependencia;

    public function __construct($nome, SGBD $servidor) {
        $this->nome = $nome;
        $this->dependencia = $servidor;
    }

    public function conectar() {
        $this->conexao = mysqli_connect($this->dependencia->getEndereco(), $this->dependencia->getUsuario(), $this->dependencia->getSenha(), $this->getNome());
        if (!$this->conexao) {
            throw new \Exception(mysqli_connect_error());
        }
    }

    public function desconectar() {
        if ($this->conexao) {
            mysqli_close($this->conexao);
            $this->conexao = NULL;
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}
