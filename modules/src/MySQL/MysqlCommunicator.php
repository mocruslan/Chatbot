<?php

namespace CharBot\Modules\MySQL;

use voku\db\DB;

class MysqlCommunicator
{
    private DB $dbConnection;

    public function __construct(string $hostname, string $username, string $password, string $database)
    {
        $this->dbConnection = DB::getInstance($hostname, $username, $password, $database);
    }

    /**
     * @throws \voku\db\exceptions\QueryException
     */
    public function query(string $sql): array
    {
        $result = $this->dbConnection->query($sql);
        return $result->fetchAll();
    }
}