<?php

namespace App\Controllers\Admin;

use App\Models\PropertyModel;
use App\Models\FeatureModel;
use App\Models\PropertyFeatureModel;
use App\Models\LocationModel;
use App\Models\CategoryModel;
use App\Models\PropertyImageModel;
use App\Models\PaymentModel;
use App\Models\CountryModel;

use App\Models\AgentModel;
use Config\Services;
use CodeIgniter\Controller;



class AgentController extends Controller
{
    
    protected $propertyModel;
    protected $imageModel;
    protected $locModel;
    protected $featureModel;
    protected $PropertyFeatureModel;
    protected $agentsModel;
    protected $countryModel;
    protected $paymentModel;
    protected $catModel;

    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->propertyModel = new PropertyModel();
        $this->imageModel = new PropertyImageModel();
        $this->featureModel = new FeatureModel();
        $this->propfeatureModel = new PropertyFeatureModel();
        $this->catModel = new CategoryModel();
        $this->locModel = new LocationModel();
        $this->agentsModel = new AgentModel();
        $this->countryModel = new CountryModel();
        $this->paymentModel = new PaymentModel();

        
    }

    // List all properties
    public function index()
    {
        $data['agents'] = $this->agentsModel->findAll();

        // $apartmentModel = new PropertyModel();
        // $data = $apartmentModel->getPropertiesWithDetails();
        
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('admin/agent_list_view', $data);
    }

     // List all properties
     public function agentsCreate()
     {
 

        $this->viewBag = [
            'CountryList' => $this->countryModel->findAll(),
            'title' => 'Create Agent',
        ];
         // $apartmentModel = new PropertyModel();
         // $data = $apartmentModel->getPropertiesWithDetails();
         
         // echo "<pre>";
         // print_r($data);
         // die;
         return view('admin/create_agents' ,  $this->viewBag);
     }

    public function registeragents()
    {
        $validation = Services::validation();

        $validationRules = [
            'name' => [
                'rules' => 'required|alpha_space|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Name name is required.',
                    'alpha_space' => 'Name name can only contain alphabetic characters and spaces.',
                    'min_length' => 'Name name must be at least 3 characters long.',
                    'max_length' => 'Name name cannot exceed 50 characters.',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[members.email]',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'You must provide a valid email address.',
                    'is_unique' => 'This email address is already registered.',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must be at least 8 characters long.',
                ],
            ],
            'phone' => [
                'rules' => 'required|regex_match[/^\+?[0-9\s\-\(\)]+$/]',
                'errors' => [
                    'required' => 'Phone number is required.',
                    'regex_match' => 'Phone number is not in a valid format.',
                ],
            ],
        ];

        $formData = $this->request->getPost();

        // if (!$this->validate($validationRules)) {
        //     return redirect()->back()->with('ERROR', $validation->getErrors());
        // }

        $formData['password'] = password_hash($formData['password'], PASSWORD_DEFAULT);
        $name = $formData['name']; // e.g., "mohammed ibrahim"
        $firstName = explode(' ', trim($name))[0]; // Extracts "mohammed"
        $randomNumber = rand(100, 999); // Generates a random number between 100 and 999

        $username = strtolower($firstName) . $randomNumber; // e.g., "mohammed523"
        $formData['username'] = $username;
      
        // echo "<pre>";
        // print_r($formData);
        // die;

        unset($formData['confirm-password']);

        $AgentModel = new AgentModel();
        $affected = $AgentModel->insert($formData);

        if ($affected > 0) {
            $this->sendRegistrationEmail($formData['email'], $formData['name']);
            return redirect()->back()->with('success', 'Registration successful. Please check your email for confirmation.');
        } else {
            return redirect()->back()->with('ERROR', 'Registration not successful');
        }
    }


    public function agentSettings($id)
    {
        $AgentModel = new AgentModel();
        $CountryModel = new CountryModel();
        $this->viewBag = [
            'AdminData' => $AgentModel->where('id', $id)->first(),
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
        return view('admin/agent_settings', $this->viewBag);
    }
    public function agentDetailsUpdate($id)
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
            return redirect()->back()->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }

    public function StatusVisibility($id)
    {
        // Retrieve the property by its ID
        $agents = $this->agentsModel->find($id);
        $username = session()->get('username');
    
        // Check if the property exists
        if (!$agents) {
            return redirect()->back()->with('error', 'Property not found');
        }
    
        // Toggle the visibility
        $newStatus = ($agents['status'] == 'ACTIVE') ? 'INACTIVE' : 'ACTIVE';
    
        // Update the property record
        $data = [
            'status' => $newStatus,
            // 'change_time' => date('Y-m-d H:i:s'),
            // 'changed_by' => $username,
        ];
    
        $updated = $this->agentsModel->update($agents['id'], $data);
    
        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update agents status');
        }
    
        return redirect()->back()->with('success', 'agents status changed successfully');
    }


    public function PaymentStatus($id)
    {
        // Retrieve the agent by its ID
        $agents = $this->agentsModel->find($id);
        $username = session()->get('username');
    
        // Check if the agent exists
        if (!$agents) {
            return redirect()->back()->with('error', 'Agent not found');
        }
    
        // Toggle the payment status
        $newStatus = ($agents['paid'] == 'PAID') ? 'UNPAID' : 'PAID';
    
        // Update the agent record
        $data = [
            'paid' => $newStatus,
            'change_time' => date('Y-m-d H:i:s'),
            'changed_by' => $username,
        ];
    
        $updated = $this->agentsModel->update($agents['id'], $data);
    
        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update agent status');
        }
    
        // If the agent is marked as PAID, store payment information
        if ($newStatus == 'PAID') {
            // Load the PaymentModel
            $paymentModel = new \App\Models\PaymentModel();
    
            // Simulate Paystack payment details (replace with actual Paystack response)
            $paymentData = [
                'agent_id' => $agents['id'],
                'name' => $agents['name'],
                'email' => $agents['email'],
                'phone' => $agents['phone'],
                'gateway' => 'PAYSTACK_',
                'payment_reference' => 'PAYSTACK_' . uniqid(), // Simulated Paystack reference
                'amount' => 50000.00, // Example amount (replace with actual amount)
                'payment_date' => date('Y-m-d H:i:s'),
                'status' => 'success', // Simulated status (replace with actual status)
            ];
    
            // Insert payment data into the payments table
            $paymentModel->insert($paymentData);
    
            if ($paymentModel->errors()) {
                return redirect()->back()->with('error', 'Failed to save payment details');
            }
        }
    
        return redirect()->back()->with('success', 'Agent status changed successfully');
    }


    public function payhistory()
    {
        $userId = session()->get('user_id');
        $data['payments'] = $this->paymentModel->findAll();
        return view('admin/payments', $data);
    }

    private function sendRegistrationEmail($email, $name)
    {
        $emailService = Services::email();

        $emailService->setTo($email);
        $emailService->setFrom('cebastienemeka@gmail.com', 'Service Apartment');
        $emailService->setSubject('Registration Confirmation');

        $loginUrl = base_url('login'); // Replace with your actual login URL

        // Logo image URL (replace with your actual logo image URL)
        $logoUrl = base_url('assets/img/rounded_logo_brand.png');

        $message = "
        <html>
        <head>
            <style>
                /* Add any additional styles here */
            </style>
        </head>
        <body>
            <img src=\"$logoUrl\" alt=\"Service Apartment Logo\" style=\"display: block; margin: 0 auto; max-width: 20%;\">
            <br>
            <p>Dear $name,</p>
            <p>Thank you for registering on our platform. We are excited to have you with us.</p>
            <p><a href=\"$loginUrl\" style=\"display: inline-block; padding: 10px 20px; font-size: 16px; color: white; background-color: #4CAF50; text-align: center; text-decoration: none; border-radius: 5px;\">Click here to login</a></p>
            <br>
            <p>Best regards,<br>Service Apartment</p>
        </body>
        </html>
    ";

        $emailService->setMessage($message);
        $emailService->setMailType('html'); // Set email type to HTML

        // Debugging output
        $emailService->setNewLine("\r\n");
        $emailService->setCRLF("\r\n");

        if (!$emailService->send()) {
            log_message('error', 'Failed to send registration email to ' . $email);
            // Output the email debugger information for better debugging
            echo $emailService->printDebugger(['headers']);
        }
    }
    

}