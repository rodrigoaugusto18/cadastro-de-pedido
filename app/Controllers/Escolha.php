<?php

namespace App\Controllers;

class Escolha extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Você é uma pessoa física ou jurídica?';

        return view('escolha', $data);
    }
}
