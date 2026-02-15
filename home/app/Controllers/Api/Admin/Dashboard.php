<?php

namespace App\Controllers\Api\Admin;

use App\Controllers\BaseController;
use App\Models\ParticipantModel;
use CodeIgniter\API\ResponseTrait;

class Dashboard extends BaseController
{
    use ResponseTrait;

    public function getParticipants()
    {
        // Check Admin Auth
        if (!session()->get('isLoggedIn')) {
            return $this->failUnauthorized('Accès non autorisé');
        }

        $participantModel = new ParticipantModel();
        $db = \Config\Database::connect();

        /**
         *  Subquery: Keep only the latest participant entry
         *  Unique by phone + email + webinar_id
         */
        $subQuery = $db->table('participants')
            ->select('MAX(id) as id')
            ->groupBy('phone, email, webinar_id');

        /**
         *  Main Query
         */
        $participants = $participantModel
            ->select('participants.id, participants.name, participants.phone, participants.email, participants.city, participants.created_at, IFNULL(webinars.title, "N/A") as webinar_title')
            ->join('webinars', 'webinars.id = participants.webinar_id', 'left')
            ->whereIn('participants.id', $subQuery)
            // If server-side processing is needed later, we add it here. 
            // For now, we return all unique participants and let client handle search/sort.
            ->orderBy('participants.created_at', 'DESC')
            ->findAll();

        return $this->respond(['data' => $participants]);
    }
}
