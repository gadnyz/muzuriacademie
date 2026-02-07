<?php

namespace App\Controllers;

use App\Models\WebinarModel;
use App\Models\UserModel;

class TestVerification extends BaseController
{
    public function index()
    {
        $webinarModel = new WebinarModel();
        $userModel = new UserModel();

        echo "<h1>Database Verification</h1>";

        $count = $webinarModel->countAllResults();
        echo "<p>Webinars count: " . $count . "</p>";

        if ($count > 0) {
            $webinars = $webinarModel->findAll();
            foreach ($webinars as $w) {
                echo "<p>Webinar: " . esc($w['title']) . " (Date: " . $w['date_time'] . ")</p>";
            }
        } else {
            echo "<p style='color:red'>No webinars found!</p>";
        }

        echo "<p>Users count: " . $userModel->countAllResults() . "</p>";
    }
}
