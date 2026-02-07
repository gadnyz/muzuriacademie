<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\WebinarModel;
use App\Models\ParticipantModel;

class SendReminders extends BaseCommand
{
    protected $group = 'Muzuri';
    protected $name = 'muzuri:reminders';
    protected $description = 'Send reminder emails for upcoming webinars';

    public function run(array $params)
    {
        $webinarModel = new WebinarModel();
        $participantModel = new ParticipantModel();
        $emailService = \Config\Services::email();

        // 1. Reminders for tomorrow (24h before)
        // Find webinars starting between 24h and 25h from now
        $start24 = date('Y-m-d H:i:s', strtotime('+24 hours'));
        $end24 = date('Y-m-d H:i:s', strtotime('+25 hours'));

        $webinars24 = $webinarModel->where('date_time >=', $start24)
            ->where('date_time <=', $end24)
            ->findAll();

        foreach ($webinars24 as $webinar) {
            CLI::write("Processing 24h reminder for: " . $webinar['title']);
            $participants = $participantModel->where('webinar_id', $webinar['id'])->findAll();

            foreach ($participants as $p) {
                $this->sendEmail($p, $webinar, 'Rappel : Votre webinaire est demain !');
            }
        }

        // 2. Reminders for soon (30 mins before)
        // Find webinars starting between 30m and 45m from now
        $start30 = date('Y-m-d H:i:s', strtotime('+30 minutes'));
        $end30 = date('Y-m-d H:i:s', strtotime('+45 minutes'));

        $webinars30 = $webinarModel->where('date_time >=', $start30)
            ->where('date_time <=', $end30)
            ->findAll();

        foreach ($webinars30 as $webinar) {
            CLI::write("Processing 30m reminder for: " . $webinar['title']);
            $participants = $participantModel->where('webinar_id', $webinar['id'])->findAll();

            foreach ($participants as $p) {
                $this->sendEmail($p, $webinar, 'Rappel : Votre webinaire commence dans 30 minutes !');
            }
        }

        CLI::write('Reminders processing complete.');
    }

    private function sendEmail($participant, $webinar, $subject)
    {
        $email = \Config\Services::email();
        $email->setFrom('no-reply@muzuriacademie.com', 'Muzuri Académie');
        $email->setTo($participant['email']);
        $email->setSubject($subject);

        $message = "Bonjour " . $participant['name'] . ",\n\n";
        $message .= "Ceci est un rappel pour le webinaire : " . $webinar['title'] . ".\n";
        $message .= "Date : " . date('d/m/Y H:i', strtotime($webinar['date_time'])) . "\n";
        $message .= "Lien Google Meet : " . ($webinar['meet_link'] ?? 'Le lien sera envoyé bientôt') . "\n\n";
        $message .= "À très vite !";

        $email->setMessage($message);

        if ($email->send()) {
            // Log success if needed
        } else {
            log_message('error', 'Reminder failed for ' . $participant['email']);
        }

        // Clear for next loop
        $email->clear();
    }
}
