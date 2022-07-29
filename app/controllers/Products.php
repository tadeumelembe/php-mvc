<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Product;

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
            'products' => $products,
            'head_buttons' => '<a class="btn btn-primary" href="' . BASEURL . 'addproduct" role="button">ADD</a> <a class="btn btn-danger" id="delete-product-btn" href="#" role="button">MASS DELETE</a>'
        ];

        $this->view('template/header', $data);
        $this->view('products/index', $data);
        $this->view('template/footer');
    }

    public function addproduct($name = '')
    {
        $products = $this->product_model->get_products();


        $data = [
            'title' => 'Product List',
            'page_tite' => 'Product List',
            'description' => 'Simple social network built on the TraversyMVC PHP framework',
            'products' => $products,
            'head_buttons' => '<a class="btn btn-primary" id="save-products" href="#" role="button">Save</a> <a class="btn btn-danger" id="delete-product-btn" href="' . BASEURL . '" role="button">Cancel</a>'
        ];

        $this->view('template/header', $data);
        $this->view('products/add', $data);
        $this->view('template/footer');
    }

    public function create($name = '')
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            die('hello');
            $new_product = $this->product_model::construct();
            // return;

            $check_if_exists = $this->product_model->get_product_sku($_POST['sku']);
            if ($check_if_exists)
                return redirect('addproduct');

            var_dump($check_if_exists);
            die;
            $product_ids = $_POST['product_ids'][0];

            $result = $this->product_model->delete_products($product_ids);
            redirect('products');
            # code...
        } else {
            $data = [
                'name' => 'Arroz',
                'price' => '123',
                'product_type' => 'Furniture',
                'sku' => '1d2as',
                'height' => '12.3',
                'length' => '45.8',
                'width' => '48',
                'size' => '',
                'weight' => '',
            ];
            $new_product = Product::construct($data);
            //$this->product_model->create($new_product);
            $class_name = 'Product'.$new_product->get_product_type();
            $this->model($class_name)->create($new_product);
            die;
            redirect('products');
        }
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
