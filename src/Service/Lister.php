<?php

namespace CRUD_PHP\Action\Service;

use CRUD_PHP\Action\Model\Consult;
use PDO;

final class Lister
{
    use Consult;
    private readonly string $sqlQuery;
    private PDO $pdo;

    public function __construct(
        string $sqlQuery,
        PDO $pdo
    ) {
        $this->sqlQuery = $sqlQuery;
        $this->pdo = $pdo;
    }

    final public function returnsData(): array
    {
        $json = [];
        $consult = $this->sqlConsult($this->pdo, $this->sqlQuery);

        while ($dados = $consult->fetch(PDO::FETCH_OBJ)) {
            $json[] = $dados;
        }

        return $json;
    }
}
