<?php 

class Users
{
    private $db;

    public function __construct()
    {
        $this->db = new Base;
    }

    public function connect()
    {
        $this->db->query("SELECT * FROM usuarios");
        return $this->db->registers();
    }

}