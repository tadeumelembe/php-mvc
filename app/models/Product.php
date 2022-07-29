<?php

namespace App\Model;

use App\Core\Database;

class Product
{
    private $table = 'products';
    private $db;
    private $id;
    private $name;
    private $sku;
    private $price;
    private $product_type;
    private $size;
    private $weight;
    private $height;
    private $length;
    private $width;

    public function __construct()
    {
        $this->db = new Database;
    }

    // public static function construct($data, $sku, $price, $product_type, $size = '', $weight = '', $height = '', $length = '', $width = '')
    public static function construct($data)
    {
        $obj = new Product;
        $obj->set_name($data['name']);
        $obj->set_sku($data['sku']);
        $obj->set_price($data['price']);
        $obj->set_product_type($data['product_type']);
        $obj->set_size($data['size']);
        $obj->set_width($data['width']);
        $obj->set_weight($data['weight']);
        $obj->set_length($data['length']);
        $obj->set_height($data['height']);
        return $obj;
    }

    //+++Getters and setters+++

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_sku()
    {
        return $this->sku;
    }

    public function set_sku($sku)
    {
        $this->sku = $sku;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function set_price($price)
    {
        $this->price = $price;
    }

    public function get_product_type()
    {
        return $this->product_type;
    }

    public function set_product_type($product_type)
    {
        $this->product_type = $product_type;
    }

    public function get_size()
    {
        return $this->size;
    }

    public function set_size($size)
    {
        $this->size = $size;
    }

    public function get_weight()
    {
        return $this->weight;
    }

    public function set_weight($weight)
    {
        $this->weight = $weight;
    }

    public function get_width()
    {
        return $this->weight;
    }

    public function set_width($width)
    {
        $this->width = $width;
    }

    public function get_height()
    {
        return $this->height;
    }

    public function set_height($height)
    {
        $this->height = $height;
    }

    public function get_length()
    {
        return $this->length;
    }

    public function set_length($length)
    {
        $this->length = $length;
    }
    //++++++++++++++++


    public function get_products()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->result_set();
    }

    public function get_product_sku($sku)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE sku = :sku');
        $this->db->bind(':sku', $sku);

        $row = $this->db->single();

        return $row;
    }


    public function create(Product $product)
    {

        $className = 'app/models/Product'. $product->get_product_type();
        $product_create = new $className;
       die($className);


        var_dump($product->get_product_type());
        die;

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
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
