<?php

namespace App\Model;

use App\Core\Database;

class ProductFurniture extends ProductType
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function create(Product $product,$id)
    {

        $this->db->query('INSERT INTO product_' . strtolower($product->getProductType())  . '(height, `length`, width, product_id) VALUES(:height, :length, :width, :product_id)');
        // Bind values
        $this->db->bind(':product_id', $id);
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
