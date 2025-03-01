<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CountryModel;
use App\Models\SettingsModel;

class SettingsController extends BaseController
{
    public function index()
    {
        $page = new \stdClass();
        $page->title = 'Dashboard';

        // Start the session and check if it's valid
        $session = session();

        // Load the MembersModel
        $settingsModel = new SettingsModel();
        $CountryModel = new CountryModel();
        $role = session()->get('user_role');
        // $studentId = session()->get('student_id');
        // Fetch student details
        $adminData = $settingsModel->where('role', $role)->first();
        // Fetch user data by ID
        // $user = $membersModel->find($userId);

        
        // Prepare data for the view
        $data = [
            'SettingsData' => $adminData,
            'activeMenuItem' => 'Settings ',
            'CountryList' => $CountryModel->findAll(),
            // 'user' => $user,
        ];


        // echo "<pre>";
        // print_r($data);
        // die;

        return view('admin/settings_edit', $data);
    }


    public function DetailsUpdate($id)
    {
        $Model = new SettingsModel();
        $post = $this->request->getPost();
        // Handle File Upload if a file is uploaded
        $file = $this->request->getFile('file');
        $filePath = ''; // Initialize file path variable

        // Check if a file is uploaded
        if ($file) {
            // Check if the file is valid
            if ($file->isValid()) {
                // Move the uploaded file to a directory
                $filePath = 'uploads/settings/image';
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
            'country' => $post['country'],
            // 'photo' => $post['file'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'company_name' => $post['company_name'],
            'email' => $post['email'],
            'facebook' => $post['facebook'],
            'instagram' => $post['instagram'],
            'twitter' => $post['twitter'],

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
            return redirect()->to('admin/profiledash')->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }


    public function AgentID($id)
    {
        $Model = new MembersModel();
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
            return redirect()->to('user/settings')->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }
}
