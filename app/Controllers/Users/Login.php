<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\Session\Session;



class Login extends BaseController
{
    function __construct()
    {
        helper(['url', 'form']);
        $session = \Config\Services::session();
    }

    public function users()
    {
        $page = new \stdClass();
        $page->title = 'Service Apartment ~ User Login ';

        $data = [
            'page' => $page,
        ];

        $data['activeMenuItem'] = 'login';

        return view('users/login_users', $data);
    }

    public function userlogin()
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
        $UsersModel = new UsersModel();

        // Check if the user exists
        $user = $UsersModel->where('email', $formData['email'])->first();

        if ($user) {
            // Verify the password
            if (password_verify($formData['password'], $user['password'])) {
                // Check if the status key exists
                if (isset($user['status'])) {
                    // Check if the user account is active
                    if ($user['status'] === 'ACTIVE') {
                        // Set user session
                        $session = session();
                        $sess = [
                            'user_id' => $user['id'],
                            'email' => $user['email'],
                            'username' => $user['username'],
                            'roles' => $user['role'],
                            'logged_in' => TRUE,
                        ];
                        echo "<pre>";
                        print_r($sess);
                        die;
                        $session->set($sess);


                        // Redirect to the dashboard or another page
                        return redirect()->to('/user/profile')->with('success', 'Login successful.<br><br>Kindly make payment to access more features we provide.');
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


    public function userLogout()
    {
        // $session = session();
        // Destroy session
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/');
    }
}