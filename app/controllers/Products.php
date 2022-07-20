<?php

class Products extends Controller{
    private $product_model;
    public function __construct()
    {
        $this->product_model = $this->model('Product');
    }
    public function index($name = '')
    {
        $products = $this->product_model->get_products();
        
        
        $data = [
            'title' => 'Product List',
            'page_tite' => 'Product List',
            'description' => 'Simple social network built on the TraversyMVC PHP framework',
            'products'=> $products
        ];

        $this->view('template/header', $data);
        $this->view('products/index', $data);
        $this->view('template/footer');
    }
}