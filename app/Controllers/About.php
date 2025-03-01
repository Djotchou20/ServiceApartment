<?php

namespace App\Controllers;
use App\Models\PropertyModel;

class About extends BaseController
{
    public function index()
    {
        $apartmentModel = new PropertyModel();
        $apartment = $apartmentModel->getPropertiesWithDetails();

        $page = new \stdClass();
        $page->title = 'About';

        $data = [
            'page' => $page,
            'apartment' => $apartment,
            // 'type' => $type,
        ];

        // $activeMenuItem = 'about'; // Set active menu item // for the controller
        // $data['activeMenuItem'] = $activeMenuItem;
        $data['activeMenuItem'] = 'about';

        return view('about', $data);
    }
}
