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

    public static function construct($data)
    {
        $obj = new Product;
        $obj->setName($data['name']);
        $obj->setSku($data['sku']);
        $obj->setPrice(doubleval($data['price']));
        $obj->setProductType($data['productType']);
        $obj->setSize(doubleval($data['size']));
        $obj->setWidth(doubleval($data['width']));
        $obj->setWeight(doubleval($data['weight']));
        $obj->setLength(doubleval($data['length']));
        $obj->setHeight(doubleval($data['height']));
        return $obj;
    }


    public function getProducts()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->result_set();
    }

    public function getProductSku($sku)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE sku = :sku');
        $this->db->bind(':sku', $sku);

        $row = $this->db->single();

        return $row;
    }


    public function create(Product $product)
    {
        $this->db->query('INSERT INTO products (`name`, sku, price, productType) VALUES(:name, :sku, :price, :productType)');
        // Bind values
        $this->db->bind(':name', $product->getName());
        $this->db->bind(':sku', $product->getSku());
        $this->db->bind(':price', $product->getPrice());
        $this->db->bind(':productType', $product->getProductType());


        // try {
        //     $this->db->beginTransaction();
        //     $this->db->execute();
        //     $this->db->commit();
        //     $this->db->rollBack();
        //     return true;
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     return false;
        // }
        if ($this->db->execute()) {
            $className = 'App\Model\Product' . $product->getProductType();
            $result = (new $className)->create($product, $this->db->lastInsertId());
            return $result;

        } else {
            return false;
        }
    }


    public function deleteProducts($ids)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id IN (' . $ids . ')');

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    //+++Getters and setters+++

    public function getId()
    {
        return $this->id;
    }

    public function SetId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getProductType()
    {
        return $this->product_type;
    }

    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }
    //++++++++++++++++
}
