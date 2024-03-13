<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movie';

    protected $allowedFields = ['title', 'description'];

    public function getAll($title = "")
    {
        if ($title === '') {
            return $this->findAll();
        }

        return $this->where(['title' => $title])->first();
    }
}
