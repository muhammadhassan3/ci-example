<?php

namespace App\Models\Entity;

use CodeIgniter\Entity\Entity;

class NotesEntity extends Entity
{
    public string $id;
    public string $title;
    public string $detail;
    public string $createdAt;
}
