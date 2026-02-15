<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ParticipantModel;
use App\Models\WebinarModel;
use CodeIgniter\API\ResponseTrait;

class Registration extends BaseController
{
    use ResponseTrait;

    public function create()
    {
        $webinarID = $this->request->getPost('webinar_id');

        if (!$webinarID) {
            return $this->fail('Identifiant du webinaire manquant.', 400);
        }

        $webinarModel = new WebinarModel();
        $webinar = $webinarModel->find($webinarID);
        if (!$webinar) {
            return $this->failNotFound('Le webinaire demandé n\'existe pas.');
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
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $model = new ParticipantModel();

        // Save data
        $data = [
            'webinar_id' => $webinarID,
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'city' => $this->request->getPost('city'),
            'status' => 'registered'
        ];

        try {
            $model->save($data);

            // Send Confirmation Email
            $this->sendConfirmationEmail($data['email'], $data['name'], $webinar);

            return $this->respondCreated([
                'status' => 'success',
                'message' => 'Inscription réussie',
                'redirect_url' => base_url('registration/success/' . $webinarID)
            ]);
        }
        catch (\Exception $e) {
            log_message('error', '[Registration API] ' . $e->getMessage());
            return $this->failServerError('Une erreur est survenue lors de l\'enregistrement.');
        }
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
        }

        if (!$email->send()) {
            log_message('error', 'Email failed: ' . $email->printDebugger(['headers']));
        }
    }
}
