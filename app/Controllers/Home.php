<?php

namespace App\Controllers;

use App\Models\ApartmentModel;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Models\PropertyFeatureModel;

class Home extends BaseController
{
    public function index()
    {
        $apartmentModel = new PropertyModel();
        $apartment = $apartmentModel->getPropertiesWithDetails();
        $page = new \stdClass();
        $page->title = 'Home';

        $data = [
            'page' => $page,
            'apartment' => $apartment,
            // 'type' => $type,
        ];
        // echo '<pre>';
        // print_r($data);
        // die;

        $data['activeMenuItem'] = 'home';

        return view('home', $data);
    }

    
}

