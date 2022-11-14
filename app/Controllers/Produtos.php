<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Psr\Log\LoggerInterface;

class Produtos extends ResourceController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
    }

    public function index()
    {

        $pessoasModel = new \App\Models\PessoasModel();
        $listapessoas = $pessoasModel->findAll();
        $arraypessoas = [];
        $arrayRazaoSocial = [];

        foreach ($listapessoas as $pessoa) {
            $arraypessoas[$pessoa->id] = $pessoa->nomepessoa;
        }

        foreach ($listapessoas as $pessoa) {
            $arrayRazaoSocial[$pessoa->id] = $pessoa->razaosocial;
        }

        $data['pessoas'] = implode($arraypessoas);
        $data['razaosocial'] = implode($arrayRazaoSocial);
        $data['msg'] = '';
        $produtoModel = new \App\Models\ProdutoModel();
        $data['produtos'] = $produtoModel->findAll();
        $data['titulo'] = 'Lista de produtos';

        
        echo view('produtos_detalhes', $data);
    }

    public function inserir()
    {

        $data['acao'] = 'Inserir';
        $data['msg'] = '';
        $data['erros'] = '';
        if($this->request->getMethod() === 'post'){
            $produtoModel = new \App\Models\ProdutoModel();
            $dadosProduto = $this->request->getPost();
            
            if($produtoModel->insert($dadosProduto)) {
                $data['msg'] = 'Produto inserido com sucesso';
            }
            else {
                $data['msg'] = "Erro ao inserir produto";
                $data['erros'] = $produtoModel->errors();
            }
        }

        $produto = new \App\Models\ProdutoModel();
        $listaProduto = $produto->findAll();
        helper('form');
        $arrayproduto = [];

        foreach ($listaProduto as $produto) {
            $arrayproduto[$produto->pessoa_id] = $produto->pessoa_id;
        }
        $data['comboProduto'] = form_dropdown('nomeproduto', $arrayproduto);


        $data['titulo'] = 'Escolha os produtos';
        
        echo view('produtos_form', $data);
    }

    public function editar($id)
    {

        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $data['erros'] = '';
        if($this->request->getMethod() === 'post'){
            $produtoModel = new \App\Models\ProdutoModel();
            $dadosProduto = $this->request->getPost();
            
            if($produtoModel->update($id, $dadosProduto)) {
                $data['msg'] = 'Produto Editado com sucesso';
            }
            else {
                $data['msg'] = "Erro ao editar produto";
                $data['erros'] = $produtoModel->errors();
            }
        }
        $pessoasModel = new \App\Models\PessoasModel();
        $listapessoas = $pessoasModel->findAll();
        helper('form');
        $arraypessoas = [];
        $arrayRazaoSocial = [];

        foreach ($listapessoas as $pessoa) {
            $arraypessoas[$pessoa->id] = $pessoa->cpf;
        }

        foreach ($listapessoas as $pessoa) {
            $arrayRazaoSocial[$pessoa->id] = $pessoa->cnpj;
        }

        $data['titulo'] = 'Editando produtos ';
        $data['nomepessoas'] = implode($arraypessoas);
        $data['razaosocial'] = implode($arrayRazaoSocial);
        $data['comboPessoa'] = form_dropdown('pessoa_id', $arraypessoas);
        $data['comboRazao'] = form_dropdown('pessoa_id', $arrayRazaoSocial);
    
        echo view('produtos_form', $data);
    }

    public function excluir($id)
    {
        if(is_null($id)) {
            $this->session->setFlashdata('msg', 'Produto não encontrado');
            return redirect()->to(base_url('produtos'));
        }
        $produtoModel = new \App\Models\ProdutoModel();
        if($produtoModel->delete($id)) {
            $this->session->setFlashdata('msg', 'Produto excluido com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir produto');
        }
        return redirect()->to(base_url('produtos'));
    }


}