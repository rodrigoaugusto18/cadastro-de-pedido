<?php namespace App\Controllers;

class Status extends BaseController
{
    public function index()
    {

    }
    public function inserir()
    {
        $data['acao'] = 'Inserir';
        $data['msg'] = '';
        $data['erros'] = '';
        if($this->request->getMethod() === 'post'){
            $statusModel = new \App\Models\StatusModel();
            $dadosStatus = $this->request->getPost();
            
            if($statusModel->insert( $dadosStatus)) {
                $data['msg'] = 'Status inserido com sucesso';
            }
            else {
                $data['msg'] = "Erro ao inserir status";
                $data['erros'] = $statusModel->errors();
            }
        }
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

        
        echo view('status', $data);
    }
}
