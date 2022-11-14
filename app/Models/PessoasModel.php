<?php namespace App\Models;

use CodeIgniter\Model;

class PessoasModel extends Model
{
    protected $table = 'pessoa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['cpf', 'nomepessoa', 'cnpj', 'razaosocial'];
    protected $returnType = 'object';

}