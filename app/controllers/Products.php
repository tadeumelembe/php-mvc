<?php

class Products extends Controller
{
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
            'products' => $products
        ];

        $this->view('template/header', $data);
        $this->view('products/index', $data);
        $this->view('template/footer');
    }

    public function delete()
    {
        # code...
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $product_ids = $_POST['product_ids'][0];
          
            $result = $this->product_model->delete_products($product_ids);
           redirect('products');
            # code...
        } else {
            redirect('products');
        }
    }
}
