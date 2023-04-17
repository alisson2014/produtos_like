<?php

namespace CRUD_PHP\Action\Model\Lister;

abstract class ListItems
{
    protected string $sqlQuery;

    public function __construct(
        string $sqlQuery
    ) {
        $this->sqlQuery = $sqlQuery;
    }

    abstract protected function setListName(): string;
}
