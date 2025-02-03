<?php

namespace App\Controllers\Agents;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use App\Models\AgentModel;

class Profile extends BaseController
{

    public function index($id = null)
    {
        $page = new \stdClass();
        $page->title = 'Dashboard';

        // Start the session and check if it's valid
        $session = session();

        // Check if the session is expired
        // $userId = $session->get('user_id');

        // // Update the last activity time
        // $session->set('last_activity', time());

        // // Use the user ID from the route if provided, otherwise get it from the session
        // $userId = $id ?? $session->get('user_id'); // Ensure this matches the session key

        // Load the AgentModel
        $AgentModel = new AgentModel();
        $username = session()->get('username');
        // $studentId = session()->get('student_id');
        // Fetch student details
        $agentData = $AgentModel->where('username', $username)->first();
        // Fetch user data by ID
        // $user = $AgentModel->find($userId);

        // $lastActivity = $session->get('last_activity');

        // if ($userId === null || $lastActivity === null || $lastActivity < time() - 7200) {
        //     // Destroy the session
        //     $session->destroy();

        //     // Redirect to the login page
        //     return redirect()->to('/login');
        // }

        // Prepare data for the view
        $data = [
            'AgentData' => $agentData,
            'activeMenuItem' => 'profile',
            // 'user' => $user,
        ];

        return view('agent/profiledash', $data);
    }


    public function ProfileSettings()
    {
        $AgentModel = new AgentModel();
        $CountryModel = new CountryModel();
        $this->viewBag = [
            'AdminData' => $AgentModel->where('username', session('username'))->first(),
            'CountryList' => $CountryModel->findAll(),
            'title' => 'Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        // echo "<pre>";
        // print_r($this->viewBag);
        // die;

        // $module = new ModuleLinksModel();
        // // Set active menu item
        // $this->viewBag['Modules'] = [
        //     'Modulelinks' => $module->findAll(),
        // ];
        $activeMenuItem = 'student/details'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view('\agent\profile_settings', $this->viewBag);
    }


    public function userDetailsUpdate($id)
    {
        $Model = new AgentModel();
        $post = $this->request->getPost();
        // Handle File Upload if a file is uploaded
        $file = $this->request->getFile('file');
        $filePath = ''; // Initialize file path variable

        // Check if a file is uploaded
        if ($file) {
            // Check if the file is valid
            if ($file->isValid()) {
                // Move the uploaded file to a directory
                $filePath = 'uploads/agent/image';
                if (!is_dir($filePath)) {
                    mkdir($filePath, 0777, true);
                }
                $newFileName = $file->getRandomName();
                if ($file->move($filePath, $newFileName)) {
                    // File uploaded successfully
                    $filePath .= $newFileName; // Update file path
                } else {
                    // File upload failed
                    log_message('error', 'Failed to upload file.');
                    return redirect()->back()->with('error', 'Failed to upload file.');
                }
            } else {
                // File is uploaded but it's invalid
                log_message('warning', 'Uploaded file is invalid.');
                // Still allow the form to submit, just set filePath to empty string
            }
        }
        // Prepare data for insertion
        $data = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'company_name' => $post['company_name'],
            'country' => $post['country'],
        ];

        // Update photo field only if filePath is not empty
        if (!empty($newFileName)) {
            $data['photo'] = $newFileName;
        }

        // echo '<pre>';
        // print_r($data);
        // die;

        // Update data in the database
        $updateResult = $Model->update($id, $data);

        if ($updateResult) {
            return redirect()->to('agent/profiledash')->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }


    public function AgentID($id)
    {
        $Model = new AgentModel();
        $post = $this->request->getPost();

        // Handle File Upload if a file is uploaded
        $file = $this->request->getFile('files');
        $filePath = ''; // Initialize file path variable
        $newFileName = ''; // Initialize newFileName

        // Check if a file is uploaded
        if ($file && $file->isValid()) {
            // Set the upload directory
            $filePath = 'uploads/profile/agentid/';

            // Create directory if it does not exist
            if (!is_dir($filePath)) {
                if (!mkdir($filePath, 0777, true) && !is_dir($filePath)) {
                    log_message('error', 'Failed to create directory: ' . $filePath);
                    return redirect()->back()->with('error', 'Failed to create directory.');
                }
            }

            // Generate a new file name and move the file
            $newFileName = $file->getRandomName();
            if (!$file->move($filePath, $newFileName)) {
                // File upload failed
                log_message('error', 'Failed to upload file.');
                return redirect()->back()->with('error', 'Failed to upload file.');
            }

            // Concatenate the directory path with the new file name
            $filePath .= $newFileName;
        } elseif ($file && !$file->isValid()) {
            // File is uploaded but invalid
            log_message('warning', 'Uploaded file is invalid.');
            return redirect()->back()->with('error', 'Upload file size limit of 1mb exceeded.');
        }

        // Prepare data for update
        $data = [
            'govt_id' => $newFileName,
        ];
        echo "<pre>";
        print_r($data);
        die;
        // Update the database with the new file name
        $update_result = $Model->update($id, $data);

        // Check the result of the update
        if ($update_result) {
            return redirect()->to('agent/settings')->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }
}
