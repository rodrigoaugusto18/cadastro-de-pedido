<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Fazer pedido';

        return view('home', $data);
    }
}
