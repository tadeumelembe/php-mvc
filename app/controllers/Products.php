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

    public function index()
    {
        $products = $this->product_model->getProducts();

        foreach ($products as $product) {
            $class = 'App\Model\Product' . $product->productType;
            $product->displayType = (new $class)->getSize($product);
        }


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
        $products = $this->product_model->getProducts();

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

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);
            
            $new_product = Product::construct($_POST);
            
            $check_if_exists = $this->product_model->getProductSku($new_product->getSku());
            if ($check_if_exists)
                return redirect('products');


            if ($this->product_model->create($new_product)) {
                return redirect('products');
            } else {
                return redirect('products');
            }
        } else {
            return redirect('products');
        }
    }


    public function delete()
    {
        # code...
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $product_ids = $_POST['product_ids'][0];

            $result = $this->product_model->deleteProducts($product_ids);
            return redirect('products');
            # code...
        } else {
            return redirect('products');
        }
    }
}
