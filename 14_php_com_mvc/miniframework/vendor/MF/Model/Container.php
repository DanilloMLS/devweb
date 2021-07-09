<?php

namespace MF\Model;

use App\Connection;

class Container {
    public static function getModel($model) {
        //instância de um Model
        $class = "\\App\\Models\\".ucfirst($model);

        //conexão com o banco de dados
        $conn = Connection::getDb();
        return new $class($conn);
    }
}

?>