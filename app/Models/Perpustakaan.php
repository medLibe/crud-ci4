<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Perpustakaan extends Model
{
    protected $table      = 'daftar_member';
    protected $primaryKey = 'id';
 
    protected $returnType     = 'object';
 
    protected $allowedFields = ['nama_lengkap', 'hp', 'alamat', 'status_member'];
 
    // protected $useTimestamps = true;
    // protected $useSoftDelete = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
}