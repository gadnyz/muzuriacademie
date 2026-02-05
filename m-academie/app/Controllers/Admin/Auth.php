<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password_hash'])) {
                $ses_data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/dashboard');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Email ou mot de passe incorrect.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }

    // Temporary route to create an admin user (REMOVE IN PRODUCTION)
    public function create_admin()
    {
        $model = new UserModel();
        if ($model->countAll() > 0) {
            return "Admin already exists!";
        }

        $data = [
            'email' => 'admin@muzuriacademie.com',
            'password_hash' => password_hash('admin123', PASSWORD_DEFAULT)
        ];

        $model->save($data);
        return "Admin user created: admin@muzuriacademie.com / admin123";
    }
}
