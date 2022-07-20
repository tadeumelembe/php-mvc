<?php

class Product{
    private $table = 'products';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_products(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->result_set();
    }
}