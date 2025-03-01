<?php

namespace App\Controllers\Agents;

use App\Controllers\BaseController;
use App\Models\AgentModel;
use CodeIgniter\Session\Session;



class Login extends BaseController
{
    function __construct()
    {
        helper(['url', 'form']);
        $session = \Config\Services::session();
    }

    public function agents()
    {
        $page = new \stdClass();
        $page->title = 'Agent Login';

        $data = [
            'page' => $page,
        ];

        $data['activeMenuItem'] = 'login';

        return view('agent/login_agents', $data);
    }

    public function Auth()
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

        //  echo "<pre>";
        //                 print_r($formData);
        //                 die;

        // Validate the data
        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Load the MembersModel
        $AgentModel = new AgentModel();

        // Check if the user exists
        $user = $AgentModel->where('email', $formData['email'])->first();

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
                            'user_role' => $user['role'],

                            'username' => $user['username'],
                            'logged_in' => TRUE,
                        ];
                        // echo "<pre>";
                        // print_r($sess);
                        // die;
                        $session->set($sess);


                        // Redirect to the dashboard or another page
                        return redirect()->to('/agent/profiledash')->with('success', 'Login successful.');
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


    public function agentLogout()
    {
        // $session = session();
        // Destroy session
        session()->destroy();

        // Redirect to login page
        return redirect()->to('/');
    }
}