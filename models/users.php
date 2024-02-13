<?php

use PgSql\Lob;

require ('../database/Database.php');

class Users
{
    public $db;
    public $userID;
    public $username;
    public $email;
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $password;
    public $createdAt;
    public $profilePicture;

    public function __construct()
    {
        $this->db = new Database();
        $this->userID = "";
        $this->username = "";
        $this->email = "";
        $this->firstName = "";
        $this->lastName = "";
        $this->phoneNumber = "";
        $this->profilePicture = "";
    }
}