<?php

namespace App;

use PDO;
use PDOException;

class Connection{
    //não é necessário instanciar a classe para chamar o método se ele for static
    public static function getDb() {
        try {
            $conn = new PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                ""
            );
            return $conn;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>