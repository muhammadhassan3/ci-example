<?php

namespace App\Controllers;

use App\Models\MovieModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Config\Factories;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\Exceptions\HTTPException;
use CodeIgniter\View\Table;
use Config\Services;

class Movies extends BaseController
{
    //Declaring object
    private $movieModel;
    // private $movieModel = Services::movieModel();

    public function __construct()
    {
        //Initiate object
        // $this->movieModel = model(MovieModel::class); 

        //create new instance or get shared instance
        $this->movieModel = Factories::models('MovieModel');

        helper('form');
    }

    public function index()
    {
        $data['list'] = $this->movieModel->getAll();
        $data['title'] = 'Movie List';
        return view('template/header', $data)
            . view('movies/index')
            . view('template/footer');
    }

    public function show($title = null, $index = -1)
    {
        $model = model(MovieModel::class);
        $data['data'] = $model->getAll($title);
        if ($index > -1) return $index;
        if (empty($data['data'])) {
            throw new PageNotFoundException('Cannot find the movies item: ' . $title);
        }

        $data['title'] = $data['data']['title'];


        return view('template/header', $data)
            . view('movies/views')
            . view('template/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambahkan data ';

        return view('template/header', $data)
            . view('movies/create')
            . view('template/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambahkan data';

        $data = $this->request->getPost(['title', 'description']);

        if (!$this->validateData($data, [
            'title' => 'required|max_length[50]|min_length[3]',
            'description' => 'required|min_length[4]'
        ])) {
            return $this->create();
        }

        $post = $this->validator->getValidated();

        $this->movieModel->save([
            'title' => $post['title'],
            'description' => $post['description'],
        ]);

        return view('template/header', ['title' => 'Tambahkan data movie'])
            . view('movies/sucess')
            . view('template/footer');
    }

    public function getAllJson()
    {
        $data = $this->movieModel->getAll();

        $response = response();

        $body = [
            'status' => 'success',
            'data' => $data
        ];

        $response->setHeader('Content-Type', 'application/json');
        $response->setBody(json_encode($body));
        $response->noCache();

        return $response;
    }

    public function getAllWithParser()
    {
        $parser = Services::parser();

        $data['movies'] = $this->movieModel->getAll();
        $data['page_title'] = 'List Movie';
        $data['heading'] = 'Daftar Movie di database';
        return $parser->setData($data)->render('movies/list_data');
    }

    public function showTable()
    {
        //set template
        $template = [
            'table_open' => '<table border="1" cellpadding="4" cellspacing="0">',
        ];


        $table = new Table();
        $table->setHeading(['title' => "Judul", 'description' => 'Deskripsi']);
        $table->setTemplate($template);
        $table->setSyncRowsWithHeading(true);

        $data = $this->movieModel->getAll();

        // foreach ($data as $item) {
        //     $table->addRow($item['title'], $item['description']);
        // }

        return $table->generate($data);
    }

    public function exception()
    {

        throw new HTTPException("Gagal menjalankan proses", 401);
    }

    public function customResponse()
    {
        return $this->response->setStatusCode(400)->setJSON(["message" => "Silahkan gunakan endpoint lainnya"]);
    }

    public function redirect()
    {
        return redirect()->to('/movie/')->withHeaders()->withCookies();
    }
}
