<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use App\Models\UsersModel;

class Profile extends BaseController
{

    public function index($id = null)
    {
        $page = new \stdClass();
        $page->title = 'Dashboard';

        // Start the session and check if it's valid
        $session = session();

        // Load the UsersModel
        $UsersModel = new UsersModel();
        $username = session()->get('username');
        // $studentId = session()->get('student_id');
        // Fetch student details
        $userData = $UsersModel->where('username', $username)->first();
        // Fetch user data by ID

        // Prepare data for the view
        $data = [
            'userData' => $userData,
            'activeMenuItem' => 'profile',
            // 'user' => $user,
        ];


        return view('users/profiledash', $data);
    }


    public function ProfileSettings()
    {
        $UsersModel = new UsersModel();
        $CountryModel = new CountryModel();
        $this->viewBag = [
            'userData' => $UsersModel->where('username', session('username'))->first(),
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
        return view('/users/profile_settings', $this->viewBag);
    }


    public function userDetailsUpdate($id)
    {
        $Model = new UsersModel();
        $post = $this->request->getPost();
        // Handle File Upload if a file is uploaded
        $file = $this->request->getFile('file');
        $filePath = ''; // Initialize file path variable

        // Check if a file is uploaded
        if ($file) {
            // Check if the file is valid
            if ($file->isValid()) {
                // Move the uploaded file to a directory
                $filePath = 'uploads/users/image';
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
            // 'company_name' => $post['company_name'],
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
            return redirect()->to('user/profile')->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }


}
