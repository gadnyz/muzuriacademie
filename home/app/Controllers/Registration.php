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
        }
        else {
            // Get next webinar if no ID provided
            $webinar = $webinarModel->where('date_time >=', date('Y-m-d H:i:s'))
                ->orderBy('date_time', 'ASC')
                ->first();
        }

        if (!$webinar) {
            return redirect()->to(base_url())->with('error', 'Aucun webinaire disponible pour l\'inscription.');
        }

        $participantModel = new ParticipantModel();
        $registeredCount = $participantModel->where('webinar_id', $webinar['id'])->countAllResults();
        $capacity = isset($webinar['capacity']) ? (int) $webinar['capacity'] : 0;
        $remaining = $capacity > 0 ? max($capacity - $registeredCount, 0) : null;
        $isSoldOut = $capacity > 0 && $remaining <= 0;
          $isUrgent = $capacity > 0 
            && $remaining > 0 
            && $remaining <= ($capacity / 2);

        return view('registration', [
            'webinar' => $webinar,
            'capacity' => $capacity,
            'remaining' => $remaining,
            'isSoldOut' => $isSoldOut,
            'isUrgent' => $isUrgent
        ]);
    }

    public function create()
    {
        $webinarID = $this->request->getPost('webinar_id');

        // Basic validation for webinar ID existence
        if (!$webinarID) {
            return redirect()->to(base_url())->with('error', 'Identifiant du webinaire manquant.');
        }

        $model = new ParticipantModel();
        $webinarModel = new WebinarModel();

        $webinar = $webinarModel->find($webinarID);
        if (!$webinar) {
            return redirect()->to(base_url())->with('error', 'Le webinaire demandé n\'existe pas.');
        }

        $registeredCount = $model->where('webinar_id', $webinarID)->countAllResults();
        $capacity = isset($webinar['capacity']) ? (int) $webinar['capacity'] : 0;
        $remaining = $capacity > 0 ? max($capacity - $registeredCount, 0) : null;
        $isSoldOut = $capacity > 0 && $remaining <= 0;
        $isUrgent = $capacity > 0 && $remaining <= 20 && $remaining > 0;

        if ($isSoldOut) {
            return redirect()
                ->to(base_url('registration/index/' . $webinarID))
                ->with('error', 'Sold Out: quota atteint.');
        }

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
            // $webinar is already fetched above
            return view('registration', [
                'validation' => $this->validator,
                'webinar' => $webinar,
                'capacity' => $capacity,
                'remaining' => $remaining,
                'isSoldOut' => $isSoldOut,
                'isUrgent' => $isUrgent
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
        $this->sendConfirmationEmail($data['email'], $data['name'], $webinar);

        return redirect()->to(base_url('registration/success/' . $webinarID));
    }

    public function success($webinarId = null)
    {
        if (!$webinarId) {
            return redirect()->to(base_url());
        }

        $webinarModel = new WebinarModel();
        $webinar = $webinarModel->find($webinarId);

        if (!$webinar) {
            return redirect()->to(base_url());
        }

        return view('registration_success', ['webinar' => $webinar]);
    }

    private function sendConfirmationEmail($to, $name, $webinar)
    {
        $email = \Config\Services::email();

        $email->setFrom('no-reply@muzuriacademie.com', 'Muzuri Académie');
        $email->setTo($to);
        $email->setSubject('Confirmation d\'inscription : ' . $webinar['title']);

        $email->setMailType('html');

        $message = view('emails/confirmation', [
            'name' => $name,
            'webinar' => $webinar
        ]);

        $email->setMessage($message);

        $invitationPath = FCPATH . 'ressources/img/invitation.jpg';
        if (is_file($invitationPath)) {
            $email->attach($invitationPath);
        } else {
            log_message('error', 'Invitation image not found: ' . $invitationPath);
        }

        // We don't stop execution if email fails in this MVP, just log it.
        if (!$email->send()) {
            log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
        }
    }
}
