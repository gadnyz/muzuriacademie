<?php
// Load CodeIgniter
require 'app/Config/Paths.php';
$paths = new Config\Paths();
require 'system/bootstrap.php';

use App\Models\WebinarModel;
use App\Models\UserModel;

$webinarModel = new WebinarModel();
$userModel = new UserModel();

echo "Webinars count: " . $webinarModel->countAllResults() . "\n";
$webinar = $webinarModel->first();
if ($webinar) {
    echo "First Webinar: " . $webinar['title'] . "\n";
}

echo "Users count: " . $userModel->countAllResults() . "\n";
