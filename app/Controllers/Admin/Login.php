<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MembersModel;
use CodeIgniter\Session\Session;



class Login extends BaseController
{
    function __construct()
    {
        helper(['url', 'form']);
        $session = \Config\Services::session();
    }

    public function index()
    {
        $page = new \stdClass();
        $page->title = 'Login';

        $data = [
            'page' => $page,
        ];

        $data['activeMenuItem'] = 'login';

        return view('login', $data);
    }

    public function login()
    {
        $validation = \Config\Services::validation();

        // Define validation rules with custom error messages
        $validationRules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'You must provide a valid email address.',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password is required.',
                ],
            ],
        ];

        // Get form data
        $formData = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
        ];

        // Validate the data
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Load the MembersModel
        $membersModel = new MembersModel();

        // Check if the user exists
        $user = $membersModel->where('email', $formData['email'])->first();

        if ($user) {
            // Verify the password
            if (password_verify($formData['password'], $user['password'])) {
                // Check if the status key exists
                if (isset($user['status'])) {
                    // Check if the user account is active
                    if ($user['status'] === 'ACTIVE') {
                        // Set user session
                        $session = session();
                        $session->set([
                            'user_id' => $user['id'],
                            'user_role' => $user['role'],
                            'email' => $user['email'],
                            'username' => $user['username'],
                            'logged_in' => true,
                        ]);

                        // Redirect to the dashboard or another page
                        return redirect()->to('/admin/profiledash')->with('success', 'Login successful.');
                    } else {
                        return redirect()->back()->withInput()->with('error', 'Inactive account');
                    }
                } else {
                    return redirect()->back()->withInput()->with('error', 'Account status is missing');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid email or password');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }
    }


    public function logout()
    {
        // $session = session();
        // Destroy session
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/');
    }
}
