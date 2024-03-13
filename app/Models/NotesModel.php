<?php

namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model
{
    protected $table = 'notes';
    protected $createdField = 'created_at';

    protected $validationRules = [
        'title' => 'required|min_length[4]',
        'details' => 'required|min_length[4]'
    ];
}
