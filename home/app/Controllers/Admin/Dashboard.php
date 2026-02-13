<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ParticipantModel;
use App\Models\WebinarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        //  Vérification connexion admin
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        $participantModel = new ParticipantModel();
        $webinarModel     = new WebinarModel();
        $db               = \Config\Database::connect();

        //  Récupération des filtres GET
        $search    = $this->request->getGet('search');
        $city      = $this->request->getGet('city');
        $webinarId = $this->request->getGet('webinar_id');

        /**
         *  Sous-requête : garder uniquement le dernier participant
         * unique par téléphone + email + webinar
         */
        $subQuery = $db->table('participants')
            ->select('MAX(id) as id')
            ->groupBy('phone, email, webinar_id');

        //  Filtre recherche
        if (!empty($search)) {
            $subQuery->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->orLike('phone', $search)
                ->groupEnd();
        }

        //  Filtre ville
        if (!empty($city)) {
            $subQuery->where('city', $city);
        }

        //  Filtre webinar
        if (!empty($webinarId)) {
            $subQuery->where('webinar_id', $webinarId);
        }

        /**
         *  Requête principale : récupérer les participants uniques
         */
        $participants = $participantModel
            ->select('participants.*, webinars.title as webinar_title')
            ->join('webinars', 'webinars.id = participants.webinar_id', 'left')
            ->whereIn('participants.id', $subQuery)
            ->orderBy('participants.created_at', 'DESC')
            ->findAll();

        //  Données envoyées à la vue
        $data = [
            'participants' => $participants,
            'webinars'     => $webinarModel->findAll(),
            'filters'      => [
                'search'     => $search,
                'city'       => $city,
                'webinar_id' => $webinarId,
            ]
        ];

        return view('admin/dashboard', $data);
    }

    public function seedInitial()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        $seeder = \Config\Database::seeder();
        $seeder->call('InitialSeeder');

        return 'Seeder exécuté';
    }

}
