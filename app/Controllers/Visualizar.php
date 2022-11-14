<?php namespace App\Controllers;

class Visualizar extends BaseController
{
    public function index()
    {
        $pessoasModel = new \App\Models\PessoasModel();
        $listapessoas = $pessoasModel->findAll();
        $data['listapessoas'] = $listapessoas;
        $arraypessoas = [];
        $arrayRazaoSocial = [];

        foreach ($listapessoas as $pessoa) {
            $arraypessoas[$pessoa->id] = $pessoa->nomepessoa;
        }
        foreach ($listapessoas as $pessoa) {
            $arrayRazaoSocial[$pessoa->id] = $pessoa->razaosocial;
        }        
        $data['razaosocial'] = implode($arrayRazaoSocial);
        $data['pessoas'] = implode($arraypessoas);
        $data['titulo'] = '';
        $data['msg'] = '';        
        
        $produtoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $produtoModel->findAll();
        $data['titulo'] = 'Lista de produtos';
        $data['msg'] = '';

        $status = new \App\Models\StatusModel();
        $listaStatus = $status->findAll();
        helper('form');
        $arrayStatus = [];
        $data['status'] = $status;
        $data['nomestatus'] = $status->findAll();;

        foreach ($listaStatus as $status) {
            $arrayStatus[$status->id] = $status->nomestatus;
        }
        $data['comboStatus'] = form_dropdown('nomestatus', $arrayStatus);

        echo view('visualizar', $data);
    }
    
}