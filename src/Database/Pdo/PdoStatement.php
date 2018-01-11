<?php

namespace Romss\Database\Pdo;

use PDOStatement as PDOState;
use Romss\Database\IStatement;

class PdoStatement implements IStatement
{
    /**
     * @var PDOState $statement
     */
    private $statement;

    public function __construct(PDOState $statement)
    {
        $this->statement = $statement;
    }


    /**
     * @param $parameter
     * @param $value
     * @param $data_type
     * @return void
     */
    public function bindValue($parameter, $value, $data_type)
    {
        $this->statement->bindValue($parameter, $value, $data_type);
    }

    /**
     * @param null $input_parameters
     * @return void
     */
    public function execute($input_parameters = null)
    {
        $this->statement->execute($input_parameters);
    }

    /**
     * @return array
     */
    public function fetch(): array
    {
        return $this->statement->fetch();
    }

    /**
     * @return array
     */
    public function fetchAll(): array
    {
        return $this->statement->fetchAll();
    }
}
