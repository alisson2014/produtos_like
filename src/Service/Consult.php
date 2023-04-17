<?php

namespace CRUD_PHP\Action\Service;

use PDO;

final class Consult
{
    private readonly string $sqlQuery;

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
