<?php

namespace App\Controllers\Users;

use App\Models\BookingModel;
use App\Controllers\BaseController;
use App\Models\PropertyModel;
use App\Models\UsersModel;

class BookingsController extends BaseController
{
    // List all properties
    public function index()
    {
          // Retrieve property details
          $BookingModel = new BookingModel();
        $userId = session()->get('user_id');
        $data['bookings'] = $BookingModel->where('user_id', $userId)->findAll();
        return view('users/bookings_view', $data);
    }

    public function create()
    {
        // Validate the form data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'property_id' => 'required|numeric',
            'check_in' => 'required|valid_date',
            'check_out' => 'required|valid_date',
            'payment_method' => 'required|in_list[card,bank_transfer,cash]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('ERRORS', $validation->getErrors());
        }

        // Retrieve form data
        $propertyId = $this->request->getPost('property_id');


        $checkIn = $this->request->getPost('check_in');
        $checkOut = $this->request->getPost('check_out');
        $paymentMethod = $this->request->getPost('payment_method');
        $price = $this->request->getPost('price');
        $agent_id = $this->request->getPost('user_id');



        // Calculate the total price
        $checkInDate = new \DateTime($checkIn);
        $checkOutDate = new \DateTime($checkOut);
        $numberOfDays = $checkOutDate->diff($checkInDate)->days;
        $totalPrice = $numberOfDays * $price;

        // Get the logged-in user's ID
        $userId = session()->get('user_id'); // Replace with your session key
        $username = session()->get('username'); // Replace with your session key
        $name = session()->get('name'); // Replace with your session key


        // Retrieve property details
        $propertyModel = new PropertyModel();
        $property = $propertyModel->find($propertyId);

        if (!$property) {
            return redirect()->back()->with('error', 'Property not found');
        }

        // Save the booking to the database
        $bookingModel = new BookingModel();
        $bookingData = [
            'property_id' => $propertyId,
            'user_id' => $userId,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'username' => $username,
            'name' => $name,
            'thumbnail' => $property['thumbnail'],
            'title' => $property['title'],
            'prop_url' => $property['prop_url'],
            'agent_id' => $agent_id,
            'total_price' => $totalPrice,
            'price' => $price,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $paymentMethod,
        ];

// echo "<pre>";
// print_r($bookingData);
// die;

$bookingId = $bookingModel->insert($bookingData);
    if ($bookingId) {
        // Redirect to the success page with the booking ID
        return redirect()->to("bookings/checkout/$bookingId")->with('success', 'Booking created successfully');
    } else {
        // Handle insertion failure
        return redirect()->back()->with('error', 'Failed to create booking');
    }
}


public function success($bookingId)
{
    // Create a page object for the title
    $page = new \stdClass();
    $page->title = 'Pay Out ';

    // Load the models
    $bookingModel = new BookingModel();
    $userModel = new UsersModel(); // Ensure you have a UserModel

    // Fetch booking details by ID
    $booking = $bookingModel->find($bookingId);

    if (!$booking) {
        // Handle case where booking is not found
        return redirect()->to('bookings')->with('error', 'Booking not found');
    }

    // Fetch user details using the user_id from the booking
    $user = $userModel->find($booking['user_id']);

    if (!$user) {
        // Handle case where user is not found
        return redirect()->to('bookings')->with('error', 'User not found');
    }

    // Pass booking and user details to the view
    $data = [
        'booking' => $booking,
        'user' => $user, // Add user details to the data array
        'page' => $page,
    ];

    return view('payout', $data);
}


public function paymentSuccess()
{
    // Create a page object for the title
    $page = new \stdClass();
    $page->title = 'Success View';
   
    // Pass booking and user details to the view
    $data = [
    
        'page' => $page,
    ];

    return view('success_view', $data);
}

}