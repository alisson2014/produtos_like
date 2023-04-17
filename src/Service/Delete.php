<?php

namespace CRUD_PHP\Action\Service;

use PDO;

final class Delete
{
    private readonly string $queryDelete;

    public function __construct(
        string $queryDelete,
    ) {
        $this->queryDelete = $queryDelete;
    }

    final public function delete(PDO $pdo): void
    {
        $delete = $pdo->prepare($this->queryDelete);

        if ($delete->execute()) {
            mensagem("Sucesso, registro excluído com sucesso");
        } else {
            mensagem("Erro, erro ao tentar excluir o registro");
        }
    }
}
