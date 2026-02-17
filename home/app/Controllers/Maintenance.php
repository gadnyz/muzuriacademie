<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Maintenance extends Controller
{
    public function migrate()
    {
        // Temporary route: protect with a token and remove after use.
        $token = $this->request->getGet('token');
        $expected = env('MIGRATE_TOKEN', 'qjgfqjsdhxfbqcdsjxhncskqjdwhxncOIQUSR8I37U4TZERG2YU3JEHZRYH1JO3IZEKMDOLK');

        if (!$token || !hash_equals($expected, $token)) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $migrations = \Config\Services::migrations();
        $migrations->latest();

        return $this->response->setBody('Migrations OK');
    }
}
