<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\PropertyModel;

class BookingsController extends BaseController
{
    public function create()
    {
        // Validate the form data
        // $validation = \Config\Services::validation();
        // $validation->setRules([
        //     'property_id' => 'required|numeric',
        //     'check_in' => 'required|valid_date',
        //     'check_out' => 'required|valid_date',
        //     'payment_method' => 'required|in_list[card,bank_transfer,cash]',
        // ]);

        // if (!$validation->withRequest($this->request)->run()) {
        //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        // }

        // Retrieve form data
        $propertyId = $this->request->getPost('property_id');

echo "<pre>";
print_r($propertyId);
die;

        $checkIn = $this->request->getPost('check_in');
        $checkOut = $this->request->getPost('check_out');
        $paymentMethod = $this->request->getPost('payment_method');
        $price = $this->request->getPost('price');

        // Calculate the total price
        $checkInDate = new \DateTime($checkIn);
        $checkOutDate = new \DateTime($checkOut);
        $numberOfDays = $checkOutDate->diff($checkInDate)->days;
        $totalPrice = $numberOfDays * $price;

        // Get the logged-in user's ID
        $userId = session()->get('user_id'); // Replace with your session key
        $username = session()->get('username'); // Replace with your session key

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
            'thumbnail' => $property['thumbnail'],
            'title' => $property['title'],
            'prop_url' => $property['prop_url'],
            'total_price' => $totalPrice,
            'price' => $price,
            'status' => 'pending',
            'payment_status' => 'pending',
            'payment_method' => $paymentMethod,
        ];

        $bookingModel->insert($bookingData);

        return redirect()->to('bookings/success')->with('success', 'Booking created successfully');
    }
}