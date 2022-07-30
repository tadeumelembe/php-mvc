<?php

namespace App\Model;

use App\Core\Database;

class ProductFurniture extends ProductType
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function create(Product $product)
    {

        $this->db->query('INSERT INTO products (`name`, sku, price, productType, height, `length`, width) VALUES(:name, :sku, :price, :productType, :height, :length, :width)');
        // Bind values
        $this->db->bind(':name', $product->getName());
        $this->db->bind(':sku', $product->getSku());
        $this->db->bind(':price', $product->getPrice());
        $this->db->bind(':productType', $product->getProductType());
        $this->db->bind(':height', $product->getHeight());
        $this->db->bind(':length', $product->getLength());
        $this->db->bind(':width', $product->getWidth());

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSize($product)
    {
        return 'Dimensions: ' .$product->height . 'x' . $product->width . 'x' . $product->length;
    }
}
