<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'webinar_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['registered', 'confirmed', 'attended', 'cancelled'],
                'default' => 'registered',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('webinar_id', 'webinars', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('participants');
    }

    public function down()
    {
        $this->forge->dropTable('participants');
    }
}
