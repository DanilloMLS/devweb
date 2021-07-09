<?php

namespace App\Models;

use MF\Model\Model;
use PDO;

class Produto extends Model {

    public function getProdutos() {
        $query = "select id, descricao, preco 
                    from
                    tb_produtos";
        return $this->db->query($query)->fetchAll();
    }
}

?>