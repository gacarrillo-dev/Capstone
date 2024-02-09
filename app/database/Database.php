<?php

class Database
{

    public $connection;


    public function __construct()
    {
        // Parse the INI configuration file
        $ini = parse_ini_file(__DIR__ . '/dbconfig.ini');

        // Construct DSN (Data Source Name) for PDO
        $dsn = "mysql:host=" . $ini['servername'] .
            ";port=" . $ini['port'] .
            ";dbname=" . $ini['dbname'];

        // Create a new PDO instance
        $this->connection = new PDO($dsn, $ini['username'], $ini['password'], [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

        // Set PDO attributes (optional, for improved security)
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /**
     *
     */
    public function query($sql, $params = [])
    {
        // Prepare and execute a query (to be implemented)
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);

        return $stmt;
    }
}