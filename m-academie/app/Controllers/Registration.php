<?php

namespace App\Controllers;

use App\Models\ParticipantModel;
use App\Models\WebinarModel;

class Registration extends BaseController
{
    public function index($webinarId = null)
    {
        $webinarModel = new WebinarModel();

        if ($webinarId) {
            $webinar = $webinarModel->find($webinarId);
        } else {
            // Get next webinar if no ID provided
            $webinar = $webinarModel->where('date_time >=', date('Y-m-d H:i:s'))
                ->orderBy('date_time', 'ASC')
                ->first();
        }

        if (!$webinar) {
            return redirect()->to(base_url())->with('error', 'Aucun webinaire disponible pour l\'inscription.');
        }

        return view('registration', ['webinar' => $webinar]);
    }

    public function create()
    {
        $webinarID = $this->request->getPost('webinar_id');
        $model = new ParticipantModel();
        $webinarModel = new WebinarModel();

        // Validation rules
        $rules = [
            'name' => [
                'label' => 'Nom Complet',
                'rules' => 'required|min_length[3]',
            ],
            'phone' => [
                'label' => 'Numéro de téléphone',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Le numéro de téléphone doit contenir au moins 8 chiffres.',
                    'required' => 'Le numéro de téléphone est obligatoire.'
                ]
            ],
            'email' => [
                'label' => 'Adresse Email',
                'rules' => 'required|valid_email',
            ],
            'city' => [
                'label' => 'Ville',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($rules)) {
            $webinar = $webinarModel->find($webinarID);
            return view('registration', [
                'validation' => $this->validator,
                'webinar' => $webinar
            ]);
        }

        // Save data
        $data = [
            'webinar_id' => $webinarID,
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'city' => $this->request->getPost('city'),
            'status' => 'registered'
        ];

        $model->save($data);

        // Send Confirmation Email (Simulated for MVP)
        $this->sendConfirmationEmail($data['email'], $data['name']);

        return redirect()->to(base_url('registration/success'));
    }

    public function success()
    {
        return view('registration_success');
    }

    private function sendConfirmationEmail($to, $name)
    {
        $email = \Config\Services::email();

        $email->setFrom('no-reply@muzuriacademie.com', 'Muzuri Académie');
        $email->setTo($to);
        $email->setSubject('Confirmation d\'inscription au webinaire');
        $email->setMessage("Bonjour $name,\n\nVotre inscription au webinaire a bien été confirmée.\n\nCordialement,\nL'équipe Muzuri Académie");

        // We don't stop execution if email fails in this MVP, just log it.
        if (!$email->send()) {
            log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
        }
    }
}
