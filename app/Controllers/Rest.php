<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;

use CodeIgniter\API\ResponseTrait;
use Config\Database;

class Rest extends Controller
{
    // protected $format = 'json';
    use ResponseTrait;

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        // $result = $this->db->query('SELECT * FROM movie');

        $result = $this->db->table('movie')->select(['title', 'description'])->where('title', 'Judul 1');
        $data['message'] = 'Data berhasil dimuat';
        $data['data'] = $result->get()->getRowArray();

        // $data["message"] = 'Get Berhasil dimulai';
        return $this->respond($data, 200);
    }

    public function new()
    {
        return 'Halaman Create data berhasil dimuat';
    }

    public function create()
    {
        return 'Proses penambahan data berhasil dijalankan';
    }

    public function show($id = null)
    {
        return 'Berhasil menampilkan halaman detail data';
    }

    public function edit($id  = null)
    {
        return 'Berhasil menampilkan halman pengubah data';
    }

    public function update($id  = null)
    {
        return 'Proses mengubah data berhasil dijalankan';
    }

    public function delete($id = null)
    {
        return 'Proses menghapus data berhasil dijalankan';
    }
}
