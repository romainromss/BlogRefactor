<?php

namespace Romss\Database;

/**
 * Interface IDatabase
 *
 * @package Database
 */
interface IDatabase
{
    /**
     * représente la requête à faire avec les données
     * dynamique nécessaire à la requête
     *
     * @param string $statement La requête à faire
     * @param array $params Les données dynamique
     * @return IStatement
     */
    public function request(string $statement, array $params = []): IStatement;

    /**
     * Retourne le dernier id inséré
     *
     * @return int
     */
    public function lastId(): int;
}
