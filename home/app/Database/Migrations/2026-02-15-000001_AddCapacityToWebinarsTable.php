<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCapacityToWebinarsTable extends Migration
{
    public function up()
    {
        $fields = [
            'capacity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 100,
                'after' => 'meet_link',
            ],
        ];

        $this->forge->addColumn('webinars', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('webinars', 'capacity');
    }
}
