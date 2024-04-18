<?php

class Database
{
    public $connection;

    public function __construct($config)
    {
        $dsn = 'pgsql:' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, NULL, NULL, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($sql, $params = [])
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($params);

        return $statement;
    }
}
