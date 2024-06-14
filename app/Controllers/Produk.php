<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProdukModel;

class Produk extends ResourceController
{

    use ResponseTrait;
// all users
    public function index()
    {
        $model = new ProdukModel();
        $data = $model->orderBy('id_produk', 'DESC')->findAll();
        return $this->respond($data);
    }

// single user
public function show($id = null)
{
    $model = new ProdukModel();
    $data = $model->where('id_produk', $id)->first();
    if ($data) {
        return $this->respond($data);

    } else { 
         return $this->FailNotFound('Data tidak ditemukan.');
    }
} 

// create
public function create()
{
    $model = new ProdukModel();
    $data = [
        'nama_produk' => $this->request->getPost('nama_produk'),
        'harga_produk' => $this->request->getPost('harga_produk'),

    ];
    $model->insert($data);
    $response = [
        'status' => 208,
        'error'  => null,
        'messages' => [
            'success' => 'Data produk berhasil ditambahkan.'
         ]
    ];
    return $this->respondCreated($response);

}

//update
public function update($id = null)
{
    $model = new ProdukModel();
    $data = [
        'nama_produk' => $this->request->getVar('nama_produk'),
        'harga_produk' => $this->request->getVar('harga_produk'),
    ];    
    $model->update($id, $data);
    $response = [
        'status' => 200,
        'error' => null,
        'messages' => [
            'success' => 'Data produk berhasil diubah.'
        ]   
    ];
    return $this->respond($response);
}

}
