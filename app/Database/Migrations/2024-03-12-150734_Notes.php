<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'serial',
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'varchar(50)',
                'null' => false
            ],
            'detail' => [
                'type' => 'text',
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('notes', true);
    }

    public function down()
    {
        $this->forge->dropTable('berita', true);
    }
}
