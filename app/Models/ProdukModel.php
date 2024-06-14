<?php namespace app\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primarykey = 'id_produk';
    protected $allowedFields = ['nama_produk', 'harga_produk'];
}