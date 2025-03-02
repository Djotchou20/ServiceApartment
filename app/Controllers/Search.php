<?php

namespace App\Controllers;
use App\Models\ApartmentModel;
use App\Models\PropertyModel;
use App\Models\PropertyImageModel;
use App\Models\PropertyFeatureModel;
use App\Models\SettingsModel;

use CodeIgniter\Controller;

class Search extends BaseController
{
    // public function search()
    // {

    //     $page = new \stdClass();
    //     $page->title = 'Apartment';
    //     // Load the PropertyModel
    //     $apartmentModel = new PropertyModel();
    //     $query = $apartmentModel->getPropertiesWithDetails();

    //     // Get search parameters from the GET request
    //     $location = $this->request->getGet('location');
    //     $bedrooms = $this->request->getGet('bedrooms');
    //     $type = $this->request->getGet('type');


    //     // Build the query based on the search parameters
    //     $query = $apartment->where('status', 'available')->where('visibility', 'visible');
    //     echo '<pre>';
    //     print_r($query);
    //     die;

    //     if (!empty($location)) {
    //         $query->like('location', $location);
    //     }

    //     if (!empty($bedrooms)) {
    //         $query->where('bedrooms', $bedrooms);
    //     }

    //     if (!empty($type)) {
    //         $query->where('type', $type);
    //     }

    //     // Execute the query and get the results
    //     $qurry = $query->findAll();
    //     $data = [
    //         'apartment' => $qurry,
    //         'page' => $page,
    //     ];


    //     echo '<pre>';
    //     print_r($data);
    //     die;
    //     // Load the search results view
    //     return view('apartment', $data);
    // }


//     public function search()
// {
//     // Create a page object for the title
//     $page = new \stdClass();
//     $page->title = 'Apartment';

//     // Load the PropertyModel
//     $apartmentModel = new PropertyModel();

//     // Get the base query with details
//     $query = $apartmentModel->getPropertiesWithDetails();

//     // Apply default filters for status and visibility
//     $query->where('status', 'available')->where('visibility', 'visible');

//     // Get search parameters from the GET request
//     $location = $this->request->getGet('location');
//     $bedrooms = $this->request->getGet('bedrooms');
//     $type = $this->request->getGet('type');

//     // Add search filters based on the parameters
//     if (!empty($location)) {
//         $query->like('location', $location);
//     }

//     if (!empty($bedrooms)) {
//         $query->where('bedrooms', $bedrooms);
//     }

//     if (!empty($type)) {
//         $query->where('type', $type);
//     }

//     // Execute the query and get the results
//     $results = $query->findAll();

//     // Prepare data for the view
//     $data = [
//         'apartment' => $results,
//         'page' => $page,
//     ];

//     // Load the search results view
//     return view('apartment', $data);
// }

public function search()
{
    // Create a page object for the title
    $page = new \stdClass();
    $page->title = 'Apartment';

    // Load the PropertyModel
    $apartmentModel = new PropertyModel();

    // Get all properties with details (returns an array)
    $properties = $apartmentModel->getPropertiesWithDetails();

    // Get search parameters from the GET request
    $location = $this->request->getGet('location');
    $bedrooms = $this->request->getGet('bedrooms');
    $type = $this->request->getGet('type');

    // Filter properties based on search parameters
    $filteredProperties = array_filter($properties, function ($property) use ($location, $bedrooms, $type) {
        // Default filter for status and visibility
        if ($property['status'] !== 'available' || $property['visibility'] !== 'visible') {
            return false;
        }

        // Filter by location (case-insensitive partial match)
        if (!empty($location) && stripos($property['location'], $location) === false) {
            return false;
        }

        // Filter by bedrooms (exact match)
        if (!empty($bedrooms) && $property['bedrooms'] != $bedrooms) {
            return false;
        }

        // Filter by type (exact match)
        if (!empty($type) && $property['type'] !== $type) {
            return false;
        }

        // If all filters pass, include the property
        return true;
    });

    // Prepare data for the view
    $data = [
        'apartment' => $filteredProperties, // Pass filtered properties to the view
        'page' => $page,
    ];

    // Load the search results view
    return view('apartment', $data);
}

}
