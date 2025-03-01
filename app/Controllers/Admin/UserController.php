<?php

namespace App\Controllers\Admin;

use App\Models\PropertyModel;
use App\Models\FeatureModel;
use App\Models\PropertyFeatureModel;
use App\Models\LocationModel;
use App\Models\CategoryModel;
use App\Models\PropertyImageModel;
use App\Models\UsersModel;

use App\Models\AgentModel;
use Config\Services;
use CodeIgniter\Controller;



class UserController extends Controller
{
    
    protected $propertyModel;
    protected $imageModel;
    protected $locModel;
    protected $userModel;
    protected $featureModel;
    protected $PropertyFeatureModel;
    protected $agentsModel;
    protected $catModel;

    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->userModel = new UsersModel();
        $this->propertyModel = new PropertyModel();
        $this->imageModel = new PropertyImageModel();
        $this->featureModel = new FeatureModel();
        $this->propfeatureModel = new PropertyFeatureModel();
        $this->catModel = new CategoryModel();
        $this->locModel = new LocationModel();
        $this->agentsModel = new AgentModel();
    }

    // List all properties
    public function index()
    {
        $data['users'] = $this->userModel->findAll();

        // $apartmentModel = new PropertyModel();
        // $data = $apartmentModel->getPropertiesWithDetails();
        
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('admin/user_list_view', $data);
    }

     // List all properties
     public function agentsCreate()
     {
 
         // $apartmentModel = new PropertyModel();
         // $data = $apartmentModel->getPropertiesWithDetails();
         
         // echo "<pre>";
         // print_r($data);
         // die;
         return view('admin/create_agents' );
     }

    // public function register_agents()
    // {
    //     $validation = Services::validation();

    //     $validationRules = [
    //         'name' => [
    //             'rules' => 'required|alpha_space|min_length[3]|max_length[50]',
    //             'errors' => [
    //                 'required' => 'Name name is required.',
    //                 'alpha_space' => 'Name name can only contain alphabetic characters and spaces.',
    //                 'min_length' => 'Name name must be at least 3 characters long.',
    //                 'max_length' => 'Name name cannot exceed 50 characters.',
    //             ],
    //         ],
    //         'email' => [
    //             'rules' => 'required|valid_email|is_unique[members.email]',
    //             'errors' => [
    //                 'required' => 'Email is required.',
    //                 'valid_email' => 'You must provide a valid email address.',
    //                 'is_unique' => 'This email address is already registered.',
    //             ],
    //         ],
    //         'password' => [
    //             'rules' => 'required|min_length[8]',
    //             'errors' => [
    //                 'required' => 'Password is required.',
    //                 'min_length' => 'Password must be at least 8 characters long.',
    //             ],
    //         ],
    //         'confirm-password' => [
    //             'rules' => 'required|matches[password]',
    //             'errors' => [
    //                 'required' => 'Confirm Password is required.',
    //                 'matches' => 'Confirm Password does not match the Password.',
    //             ],
    //         ],
    //         'phone' => [
    //             'rules' => 'required|regex_match[/^\+?[0-9\s\-\(\)]+$/]',
    //             'errors' => [
    //                 'required' => 'Phone number is required.',
    //                 'regex_match' => 'Phone number is not in a valid format.',
    //             ],
    //         ],
    //     ];

    //     $formData = $this->request->getPost();

    //     if (!$this->validate($validationRules)) {
    //         return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    //     }

    //     $formData['password'] = password_hash($formData['password'], PASSWORD_DEFAULT);
    //     $name = $formData['name']; // e.g., "mohammed ibrahim"
    //     $firstName = explode(' ', trim($name))[0]; // Extracts "mohammed"
    //     $randomNumber = rand(100, 999); // Generates a random number between 100 and 999

    //     $username = strtolower($firstName) . $randomNumber; // e.g., "mohammed523"
    //     $formData['username'] = $username;
    //     // echo "<pre>";
    //     // print_r($formData);
    //     // die;

    //     unset($formData['confirm-password']);

    //     $AgentModel = new AgentModel();
    //     $affected = $AgentModel->insert($formData);

    //     if ($affected > 0) {
    //         $this->sendRegistrationEmail($formData['email'], $formData['name']);
    //         return redirect()->to('login')->with('success', 'Registration successful. Please check your email for confirmation.');
    //     } else {
    //         return redirect()->back()->withInput()->with('error', 'Registration not successful');
    //     }
    // }


    public function StatusVisibility($id)
    {
        // Retrieve the property by its ID
        $users = $this->userModel->find($id);
        $username = session()->get('username');
    
        // Check if the property exists
        if (!$users) {
            return redirect()->back()->with('error', 'Property not found');
        }
    
        // Toggle the visibility
        $newStatus = ($users['status'] == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE';
    
        // Update the property record
        $data = [
            'status' => $newStatus,
            // 'change_time' => date('Y-m-d H:i:s'),
            // 'changed_by' => $username,
        ];
    
        $updated = $this->userModel->update($users['id'], $data);
    
        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update users status');
        }
    
        return redirect()->back()->with('success', 'users status changed successfully');
    }

    // private function sendRegistrationEmail($email, $name)
    // {
    //     $emailService = Services::email();

    //     $emailService->setTo($email);
    //     $emailService->setFrom('cebastienemeka@gmail.com', 'Service Apartment');
    //     $emailService->setSubject('Registration Confirmation');

    //     $loginUrl = base_url('login'); // Replace with your actual login URL

    //     // Logo image URL (replace with your actual logo image URL)
    //     $logoUrl = base_url('assets/img/rounded_logo_brand.png');

    //     $message = "
    //     <html>
    //     <head>
    //         <style>
    //             /* Add any additional styles here */
    //         </style>
    //     </head>
    //     <body>
    //         <img src=\"$logoUrl\" alt=\"Service Apartment Logo\" style=\"display: block; margin: 0 auto; max-width: 20%;\">
    //         <br>
    //         <p>Dear $name,</p>
    //         <p>Thank you for registering on our platform. We are excited to have you with us.</p>
    //         <p><a href=\"$loginUrl\" style=\"display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #4CAF50; text-align: center; text-decoration: none; border-radius: 5px;\">Click here to login</a></p>
    //         <br>
    //         <p>Best regards,<br>Service Apartment</p>
    //     </body>
    //     </html>
    // ";

    //     $emailService->setMessage($message);
    //     $emailService->setMailType('html'); // Set email type to HTML

    //     // Debugging output
    //     $emailService->setNewLine("\r\n");
    //     $emailService->setCRLF("\r\n");

    //     if (!$emailService->send()) {
    //         log_message('error', 'Failed to send registration email to ' . $email);
    //         // Output the email debugger information for better debugging
    //         echo $emailService->printDebugger(['headers']);
    //     }
    // }
    

}