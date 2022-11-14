<?php namespace App\Models;

use CodeIgniter\Model;

class FisicaModel extends Model
{
    protected $table = 'pessoa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cpf', 'nomepessoa'];
    protected $returnType = 'object';

    protected $validationRules = [
        'nomepessoa' => 'min_length[3]|is_unique[pessoa.nomepessoa]',
        'cpf' => 'min_length[11]|is_unique[pessoa.cpf]'

    ];
}