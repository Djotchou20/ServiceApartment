<?php

namespace App\Controllers\Admin;

use App\Models\PropertyModel;
use App\Models\BookingModel;
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
    protected $bookingModel;
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
        $this->bookingModel = new BookingModel();
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
     public function bookinglist()
     {
           // Retrieve property details
           $BookingModel = new BookingModel();
         $userId = session()->get('user_id');
         $data['bookings'] = $BookingModel->findAll();
         return view('admin/bookings_view', $data);
     }

     
     public function PaymentVerified($id)
     {
         // Retrieve the agent by its ID
         $booking = $this->bookingModel->find($id);
         $username = session()->get('username');
     
         // Check if the agent exists
         if (!$booking) {
             return redirect()->back()->with('error', 'booking not found');
         }
     
         // Toggle the payment status
         $newStatus = ($booking['payment_status'] == 'paid') ? 'pending' : 'paid';
     
         // Update the agent record
         $data = [
             'payment_status' => $newStatus,
             'status' => 'confirmed',
             'change_time' => date('Y-m-d H:i:s'),
             'changed_by' => $username,
         ];
     
         $updated = $this->bookingModel->update($booking['id'], $data);
     
         if ($updated === false) {
             return redirect()->back()->with('error', 'Failed to booking agent status');
         }
     
         // If the agent is marked as PAID, store payment informatio
     
         return redirect()->back()->with('success', 'booking status changed successfully');
     }

    

}