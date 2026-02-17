<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Admin User
        $userModel = model('App\Models\UserModel');
        if ($userModel->where('email', 'adm@muzuriacademie.com')->countAllResults() == 0) {
            $userModel->save([
                'email' => 'adm@muzuriacademie.com',
                'password_hash' => password_hash('@dmin+243', PASSWORD_DEFAULT),
            ]);
        }

        // 2. Clear existing webinars to ensure our target webinar is the "Next" one
        // $db = \Config\Database::connect();
        // $builder = $db->table('webinars');
        // $builder->truncate(); // Optional: clean slate for webinars

        // 3. Create Specific Webinar
        $webinarModel = model('App\Models\WebinarModel');

        $webinarModel->save([
            'title' => 'Session de clôture de la formation - ART ORATOIRE',
            'description' => "Session de clôture de la formation - Art Oratoire",
            'date_time' => '2026-02-22 15:30:00',//
            'capacity' => 100
        ]);
    }
}
