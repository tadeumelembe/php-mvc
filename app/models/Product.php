<?php

class Product
{
    private $table = 'products';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function get_products()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->result_set();
    }

    public function delete_products($ids)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id IN (' . $ids . ')');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
