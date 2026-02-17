<?php

namespace App\Controllers;

use App\Models\WebinarModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new WebinarModel();

        // Get the next upcoming webinar
        // Since we might not have data yet, handle null gracefully in view
        $nextWebinar = $model->where('date_time >=', date('Y-m-d H:i:s'))
            ->orderBy('date_time', 'ASC')
            ->first();

        // If no future webinar, maybe get the latest one just to show something?
        // Or just pass null.

        $data = [
            'webinar' => $nextWebinar,
            'title' => 'Accueil - Muzuri Académie'
        ];

        return view('home', $data);
    }

    public function staging()
    {
        $model = new WebinarModel();

        // Get the next upcoming webinar
        // Since we might not have data yet, handle null gracefully in view
        $nextWebinar = $model->where('date_time >=', date('Y-m-d H:i:s'))
            ->orderBy('date_time', 'ASC')
            ->first();

        // If no future webinar, maybe get the latest one just to show something?
        // Or just pass null.

        $data = [
            'webinar' => $nextWebinar,
            'title' => 'Accueil - Muzuri Académie'
        ];

        return view('home_staging', $data);
    }
}
