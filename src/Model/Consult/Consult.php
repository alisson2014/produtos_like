<?php

namespace CRUD_PHP\Action\Model\Consult;

use PDO;

final class Consult
{
    protected string $sqlQuery;

    public function __construct(
        string $sqlQuery
    ) {
        $this->sqlQuery = $sqlQuery;
    }

    final public function sqlConsult(PDO $pdo): array
    {
        $arrayDados = [];
        $consult = $pdo->prepare($this->sqlQuery);
        $consult->execute();

        while ($dados = $consult->fetch(PDO::FETCH_OBJ)) {
            $arrayDados[] = $dados;
        }
        return $arrayDados;
    }
}
