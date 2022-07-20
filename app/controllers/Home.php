<?php

class Home extends Controller
{
    public function index($name = '')
    {
        $user = $this->model('User');
        $user->name = 'Alex';

        $data = [
            'title' => 'Product List',
            'description' => 'Simple social network built on the TraversyMVC PHP framework'
        ];

        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer');
    }

    public function more()
    {
        echo 'moe/index';
    }
}
