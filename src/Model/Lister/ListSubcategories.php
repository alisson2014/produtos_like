<?php

namespace CRUD_PHP\Action\Model\Lister;

use CRUD_PHP\Action\Model\Lister\ListItems;
use PDO;

class ListSubcategories extends ListItems
{
    public function __construct(string $sqlQuery)
    {
        parent::__construct($sqlQuery);
    }

    public function sqlConsult(PDO $pdo): array
    {
        $arrayDados = [];
        $consult = $pdo->prepare($this->sqlQuery);
        $consult->execute();

        while ($dados = $consult->fetch(PDO::FETCH_OBJ)) {
            $arrayDados[] = $dados;
        }
        return $arrayDados;
    }
    public function setListName(): string
    {
        return "Subcategorias";
    }
}
