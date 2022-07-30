<?php

namespace App\Model;

use App\Core\Database;

class ProductDVD extends ProductType
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function create(Product $product)
    {

        $this->db->query('INSERT INTO products (`name`, sku, price, productType, size) VALUES(:name, :sku, :price, :productType, :size)');
        // Bind values
        $this->db->bind(':name', $product->getName());
        $this->db->bind(':sku', $product->getSku());
        $this->db->bind(':price', $product->getPrice());
        $this->db->bind(':productType', $product->getProductType());
        $this->db->bind(':size', $product->getSize());

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function getSize($product)
    {
        return 'Size: ' . $product->size . ' MB';
      
    }
}
