<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ParticipantModel;
use App\Models\WebinarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        $participantModel = new ParticipantModel();
        $webinarModel = new WebinarModel();

        // Filters
        $search = $this->request->getGet('search');
        $city = $this->request->getGet('city');
        $webinarId = $this->request->getGet('webinar_id');

        if ($search) {
            $participantModel->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->orLike('phone', $search)
                ->groupEnd();
        }

        if ($city) {
            $participantModel->where('city', $city);
        }

        if ($webinarId) {
            $participantModel->where('webinar_id', $webinarId);
        }

        $data = [
            'participants' => $participantModel->paginate(20),
            'pager' => $participantModel->pager,
            'webinars' => $webinarModel->findAll(),
            'filters' => [
                'search' => $search,
                'city' => $city,
                'webinar_id' => $webinarId
            ]
        ];

        return view('admin/dashboard', $data);
    }

    public function export()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        $participantModel = new ParticipantModel();

        // Apply filters again for export
        $search = $this->request->getGet('search');
        $city = $this->request->getGet('city');
        $webinarId = $this->request->getGet('webinar_id');

        if ($search) {
            $participantModel->groupStart()
                ->like('name', $search)
                ->orLike('email', $search)
                ->orLike('phone', $search)
                ->groupEnd();
        }
        if ($city)
            $participantModel->where('city', $city);
        if ($webinarId)
            $participantModel->where('webinar_id', $webinarId);

        $participants = $participantModel->findAll();

        $filename = 'participants_' . date('Ymd_His') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $file = fopen('php://output', 'w');
        fputcsv($file, ['ID', 'Webinar ID', 'Nom', 'Email', 'Téléphone', 'Ville', 'Statut', 'Date Inscription']);

        foreach ($participants as $p) {
            fputcsv($file, [
                $p['id'],
                $p['webinar_id'],
                $p['name'],
                $p['email'],
                $p['phone'],
                $p['city'],
                $p['status'],
                $p['created_at']
            ]);
        }

        fclose($file);
        exit;
    }
}
