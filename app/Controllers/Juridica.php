<?php namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Juridica extends BaseController
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
        $data['pessoas'] = $pessoasModel->findAll();
        $data['titulo'] = 'Exibindo a lista de pessoas';
        $data['msg'] = '';

        echo view('juridica_detalhes', $data);
    }

    public function inserir()
    {
        $data['titulo'] = 'Exibindo a lista de pessoas';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if($this->request->getMethod() === 'post') {
            $pessoasModel = new \App\Models\PessoasModel();
            $pessoasModel->set('razaosocial', $this->request->getPost('razaosocial'));
            $pessoasModel->set('cnpj', $this->request->getPost('cnpj'));

            if($pessoasModel->insert()) {
                $data['msg'] = 'Pessoa inserida com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao inserir pessoa';
            }
        }
        echo view('juridica_form', $data);
    }

    public function editar($cnpj)
    {
        $data['titulo'] = 'Editar pessoa do cnpj: ' . $cnpj;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $pessoasModel = new \App\Models\PessoasModel();
        $pessoas = $pessoasModel->find($cnpj);

        if($this->request->getMethod() === 'post') {
            $pessoas->razaosocial = $this->request->getPost('razaosocial');
            $pessoas->cnpj = $this->request->getPost('cnpj');

            if($pessoasModel->update($cnpj, $pessoas)) {
                $data['msg'] = 'Pessoa editada com sucesso';
            }
        }
        echo view('juridica_form', $data);
    }

    public function excluir($cnpj)
    {
        if(is_null($cnpj)) {
            $this->session->setFlashdata('msg', 'Pessoa não encontrada');
            return redirect()->to(base_url('juridica'));
        }
        $pessoasModel = new \App\Models\PessoasModel();
        if($pessoasModel->delete($cnpj)) {
            $this->session->setFlashdata('msg', 'Pessoa excluida com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir pessoa');
        }
        return redirect()->to(base_url('juridica'));
    }

}