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
        $participantModel
            ->select('participants.*, webinars.title as webinar_title')
            ->join('webinars', 'webinars.id = participants.webinar_id', 'left');
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
            'participants' => $participantModel->orderBy('participants.created_at', 'DESC'),
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
        $participantModel
            ->select('participants.*, webinars.title as webinar_title')
            ->join('webinars', 'webinars.id = participants.webinar_id', 'left');

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

        $participants = $participantModel->orderBy('participants.created_at', 'DESC')->findAll();

        $filename = 'participants_' . date('Ymd_His') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        $file = fopen('php://output', 'w');
        fputcsv($file, ['ID', 'Webinar ID', 'Webinar', 'Nom', 'Email', 'Téléphone', 'Ville', 'Date Inscription']);

        foreach ($participants as $p) {
            fputcsv($file, [
                $p['id'],
                $p['webinar_id'],
                $p['webinar_title'],
                $p['name'],
                $p['email'],
                $p['phone'],
                $p['city'],
                $p['created_at']
            ]);
        }

        fclose($file);
        exit;
    }

    public function seedInitial()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        // if (ENVIRONMENT !== 'development') {
        //     return redirect()->back();
        // }

        $seeder = \Config\Database::seeder();
        $seeder->call('InitialSeeder');

        return "Seeder exécuté";
    }
}
