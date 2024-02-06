<?php
    // Parse the INI configuration file to retrieve database credentials and setting
    $ini = parse_ini_file(__DIR__ . '/dbconfig.ini');

    // Uncomment the following lines for debugging and exit script after dumping INI contents
    // var_dump($ini);
    // exit;

    // Create a PDO database connection using the retrieved settings from the INI file
    $db = new PDO(
        "mysql:host=" . $ini['servername'] . 
        ";port=" . $ini['port'] . 
        ";dbname=" . $ini['dbname'], 
        $ini['username'], 
        $ini['password']
    );

    // Disable emulated prepared statements for enhanced security
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>