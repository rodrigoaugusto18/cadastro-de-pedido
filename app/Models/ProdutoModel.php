<?php namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomeproduto', 'valor', 'pessoa_id'];
    protected $returnType = 'object';

}