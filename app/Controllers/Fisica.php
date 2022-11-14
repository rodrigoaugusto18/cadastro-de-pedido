<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Fisica extends BaseController
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

        echo view('fisica_detalhes', $data);
    }

    public function inserir()
    {
        $data['titulo'] = 'Exibindo a lista de pessoas';
        $data['acao'] = 'Inserir';
        $data['msg'] = '';

        if($this->request->getMethod() === 'post') {
            $pessoasModel = new \App\Models\PessoasModel();
            $pessoasModel->set('nomepessoa', $this->request->getPost('nomepessoa'));
            $pessoasModel->set('cpf', $this->request->getPost('cpf'));

            if($pessoasModel->insert()) {
                $data['msg'] = 'Inseriso com sucesso';
            }
            else {
                $data['msg'] = 'Erro ao inserir pessoa';
            }
        }
        echo view('fisica_form', $data);
    }

    public function editar($cpf)
    {
        $data['titulo'] = 'Editar pessoa do cpf: ' . $cpf;
        $data['acao'] = 'Editar';
        $data['msg'] = '';
        $pessoasModel = new \App\Models\PessoasModel();
        $pessoas = $pessoasModel->find($cpf);

        if($this->request->getMethod() === 'post') {
            $pessoas->nomepessoa = $this->request->getPost('nomepessoa');
            $pessoas->cpf = $this->request->getPost('cpf');

            if($pessoasModel->update($cpf, $pessoas)) {
                $data['msg'] = 'Pessoa editada com sucesso';
            }
        }
        echo view('fisica_form', $data);
    }

    public function excluir($cpf)
    {
        if(is_null($cpf)) {
            $this->session->setFlashdata('msg', 'Pessoa não encontrada');
            return redirect()->to(base_url('fisica'));
        }
        $pessoasModel = new \App\Models\PessoasModel();
        if($pessoasModel->delete($cpf)) {
            $this->session->setFlashdata('msg', 'Pessoa excluida com sucesso');
        }
        else {
            $this->session->setFlashdata('msg', 'Erro ao excluir categoria');
        }
        return redirect()->to(base_url('fisica'));
    }

}