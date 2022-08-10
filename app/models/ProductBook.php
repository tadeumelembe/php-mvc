<?php

namespace App\Model;

use App\Core\Database;

class ProductBook extends ProductType
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function create(Product $product,$id)
    {

        $this->db->query('INSERT INTO product_' . strtolower($product->getProductType())  . '(weight, product_id) VALUES(:weight, :product_id)');
        // Bind values
        $this->db->bind(':product_id', $id);
        $this->db->bind(':weight', $product->getWeight());

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getSize($product)
    {
        return 'Weight: ' . $product->weight . ' kg';
    }
}
