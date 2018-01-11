<?php

namespace Romss\Database;

/**
 * Interface IDatabase
 *
 * @package Database
 */
interface IStatement
{
    /**
     * @param $parameter
     * @param $value
     * @param $data_type
     * @return void
     */
    public function bindValue($parameter, $value, $data_type);

    /**
     * @param null $input_parameters
     * @return void
     */
    public function execute($input_parameters = null);

    /**
     * @return array
     */
    public function fetch(): array;

    /**
     * @return array
     */
    public function fetchAll(): array;
}
