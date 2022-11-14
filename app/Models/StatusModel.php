<?php namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nomestatus'];
    protected $returnType = 'object';

}