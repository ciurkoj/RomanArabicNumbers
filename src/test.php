<?php

$db = new mysqli();

$user1 = new User($db);


class User {
    private mysqli $db;
    public function __construct(mysqli $db){
        $this->db = $db;
    }
    
    public function getAll()
    {
        $this->db->get_client_info();
    }
}