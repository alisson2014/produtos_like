<?php

namespace CRUD_PHP\Action\Model;

use PDO;
use PDOStatement;

trait Consult
{
    public function sqlConsult(
        PDO $pdo,
        string $query
    ): PDOStatement {
        $consult = $pdo->prepare($query);
        $consult->execute();
        return $consult;
    }
}
