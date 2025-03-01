<?php

namespace App\Controllers;
use App\Models\ApartmentModel;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Models\PropertyFeatureModel;
use App\Models\SettingsModel;


class Apartment extends BaseController
{
    public function index()
    {
        $apartmentModel = new PropertyModel();
        $apartment = $apartmentModel->getPropertiesWithDetails();
    
        $page = new \stdClass();
        $page->title = 'Apartment';
    
        $data = [
            'apartment' => $apartment,
            'page' => $page,
            'activeMenuItem' => 'property',
        ];

        // echo '<pre>';
        // print_r($data);
        // die;
    
        return view('apartment', $data);
    }


    public function ApartmentView($prop_url)
{
    $propertyModel = new PropertyModel();
    $Model = new SettingsModel();
    $page = new \stdClass();
    $page->title = 'Apartment Details - Service Apartment';

    $property = $propertyModel->getPropertyByUrl($prop_url);

    if (!$property) {
        return redirect()->to('/properties')->with('error', 'Property not found.');
    }
    $settingsData = $Model->first();

    $data = [
        'page' => $page,
        'settingsData' => $settingsData,
        'apartment' => $property
    ];

// echo "<pre>";
// print_r($data);
// die;
    return view('apartment_details', $data);
}


//     public function ApartmentView($prop_url)
// {
//     $propertyModel = new PropertyModel();
//     $page = new \stdClass();
//     $page->title = 'Apartment Details - Service Apartment';
//     $apartment = $apartmentModel->getPropertiesWithDetails();

//     $property = $propertyModel->where('prop_url', $prop_url)->first();
    
//     if (!$property) {
//         return redirect()->to('/properties')->with('error', 'Property not found.');
//     }

//     $data = [
//         'page' => $page,
//         'apartment' => $property
//     ];



//     $data['activeMenuItem'] = 'property';

//     echo '<pre>';
//     print_r($data);
//     die;
    
//     return view('apartment_details', $data);
// }


    // public function ApartmentView()
    // {
        
        
    
    //     $apartmentModel = new PropertyModel();
        
    //     $page = new \stdClass();
    //     $page->title = 'Apartment Details - Service Apartment';
        
    //     $apartment = $apartmentModel->getPropertiesWithDetails();
    //     $data = [
    //         'apartment' => $apartment,
    //         'page' => $page,
    //     ];



    //     $data['activeMenuItem'] = 'property';


    //     return view('apartment_details', $data);
    // }
}
