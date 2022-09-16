<?php

require_once realpath('vendor/autoload.php');

use CharBot\Modules\MySQL\MysqlCommunicator;
use CharBot\Modules\MySQL\MysqlQueryBuilder;

$getMessage = "%" . $_POST["text"] . "%";

$mysqlCommunicator = new MysqlCommunicator("127.0.0.1", "root", "", "chatbot-sql");
try {
    $responses = $mysqlCommunicator->query(retrieveSQLRequest($getMessage));
    if (count($responses) > 0) {
        echo $responses[0]->response;
    } else {
        echo "I don't know what to say.";
    }
} catch (\voku\db\exceptions\QueryException $e) {
    echo $e->getMessage();
}

function retrieveSQLRequest(string $message): string
{
    $mysqlBuilder = new MysqlQueryBuilder();
    $mysqlBuilder->select("responses", ["response"])
        ->where("question", $message, "LIKE");

    return $mysqlBuilder->getSQL();
}

