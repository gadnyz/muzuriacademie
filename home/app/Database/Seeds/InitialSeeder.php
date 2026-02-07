<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Admin User
        $userModel = model('App\Models\UserModel');
        if ($userModel->where('email', 'admin@muzuriacademie.com')->countAllResults() == 0) {
            $userModel->save([
                'email' => 'admin@muzuriacademie.com',
                'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
            ]);
        }

        // 2. Clear existing webinars to ensure our target webinar is the "Next" one
        // $db = \Config\Database::connect();
        // $builder = $db->table('webinars');
        // $builder->truncate(); // Optional: clean slate for webinars

        // 3. Create Specific Webinar
        $webinarModel = model('App\Models\WebinarModel');

        $webinarModel->save([
            'title' => 'WEBINAIRE OFFERT – ART ORATOIRE',
            'description' => "Apprenez à parler avec impact et confiance !\n\nAvec Mr Emmanuel KISHIKO\n(Formateur certifié Maxwell Leadership)",
            'date_time' => '2026-02-08 20:30:00', // Dimanche 8 février 2026 à 20h30
            'meet_link' => 'https://meet.google.com/abc-defg-hij'
        ]);
    }
}
