<?php

namespace CRUD_PHP\Action\Service;

use PDO;

final class Delete
{
    private PDO $pdo;
    private readonly string $queryDelete;

    public function __construct(
        string $queryDelete,
        PDO $pdo
    ) {
        $this->queryDelete = $queryDelete;
        $this->pdo = $pdo;
    }

    final public function delete(): bool
    {
        $delete = $this->pdo->prepare($this->queryDelete);

        if ($delete->execute()) {
            return true;
        }

        return false;
    }
}
