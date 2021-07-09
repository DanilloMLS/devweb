<?php

namespace App\Models;

use MF\Model\Model;
use PDO;

class Info extends Model {

    public function getInfo() {
        $query = "select id, titulo, descricao
                    from
                    tb_info";
        return $this->db->query($query)->fetchAll();
    }
}


?>