<?php

namespace App\Models;

use MF\Model\Model;
use PDO;

class Usuario extends Model {
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function salvar() {
        $query = "insert into usuarios(
            nome, email, senha
        ) values(
            :nome, :email, :senha
        )";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();

        return $this;
    }

    public function validarCadastro() {

        $valido = true;
        
        if (strlen($this->__get('nome')) < 3) {
            $valido = false;
        }
        
        if (strlen($this->__get('email')) < 3) {
            $valido = false;
        }
        
        if (strlen($this->__get('senha')) < 3) {
            $valido = false;
        }

        return $valido;
    }

    public function getUsuarioPorEmail() {
        $query = "select nome, email, senha from usuarios where email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>