<?php

namespace App\Models;

use MF\Model\Model;
use PDO;

class UsuarioSeguidor extends Model {
    private $id;
    private $id_usuario;
    private $id_usuario_seguindo;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function seguirUsuario($id_usuario_seguindo) {
        $query = "insert into
            usuarios_seguidores (
                id_usuario, id_usuario_seguindo
            ) values (
                :id_usuario, :id_usuario_seguindo)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':id_usuario_seguindo', $id_usuario_seguindo);
        $stmt->execute();

        return true;
    }

    public function deixarSeguirUsuario($id_usuario_seguindo) {
        $query = "delete from
            usuarios_seguidores
            where
            id_usuario = :id_usuario and
            id_usuario_seguindo = :id_usuario_seguindo";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
        $stmt->bindValue(':id_usuario_seguindo', $id_usuario_seguindo);
        $stmt->execute();

        return true;
    }
}

?>