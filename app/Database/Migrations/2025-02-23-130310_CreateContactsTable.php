<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100
            ],
            'surname' => [
                'type'       => 'VARCHAR',
                'constraint' => 100
            ],
            'street' => [
                'type'       => 'VARCHAR',
                'constraint' => 255
            ],
            'postcode' => [
                'type'       => 'VARCHAR',
                'constraint' => 20
            ],
            'town' => [
                'type'       => 'VARCHAR',
                'constraint' => 100
            ],
            'age' => [
                'type'       => 'INT',
                'constraint' => 3
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('contacts');
    }

    public function down()
    {
        $this->forge->dropTable('contacts');
    }
}
