<?php

namespace App\Controllers\Agents;


use App\Models\BookingModel;
use CodeIgniter\Controller;

class BookingController extends Controller
{
    protected $bookingModel;
 
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
      
    }

    // List all properties
    public function index()
    {
        $userId = session()->get('user_id');
        $data['bookings'] = $this->bookingModel->where('user_id', $userId)->findAll();
        return view('agent/bookings_view', $data);
    }

  
}