<?php

namespace App\Model;

use App\Core\Database;

class ProductDVD extends ProductType
{
    public function __construct()
    {
        $this->db = new Database;
    }

    public function create(Product $product, $id)
    {

        $this->db->query('INSERT INTO product_' . strtolower($product->getProductType())  . '(size, product_id) VALUES(:size, :product_id)');
        // Bind values
        $this->db->bind(':product_id', $id);
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
