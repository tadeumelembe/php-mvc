<?php

namespace App\Model;

class ProductFurniture extends ProductType
{
    public function create(Product $product)
    {
        return 'chegei';
        $this->db->query('INSERT INTO products (`name`, sku, price, product_type, height, length, widh) VALUES(:`name`, :sku, :price, :product_type, :height, :`length`, :width)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
