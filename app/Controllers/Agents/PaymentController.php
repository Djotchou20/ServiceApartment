<?php

namespace App\Controllers\Agents;

use App\Models\PaymentModel;
use CodeIgniter\Controller;

class PaymentController extends Controller
{
    protected $paymentModel;
    
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->paymentModel = new PaymentModel();
       
    }

    // List all properties
    public function index()
    {
        $userId = session()->get('user_id');
        $data['payments'] = $this->paymentModel->where('agent_id', $userId)->findAll();
        return view('agent/payments', $data);
    }

   
}