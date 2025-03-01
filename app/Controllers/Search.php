<?php

namespace App\Controllers;

use App\Models\PropertyModel;
use CodeIgniter\Controller;

class Search extends BaseController
{
    public function search()
    {

        $page = new \stdClass();
        $page->title = 'Apartment';
        // Load the PropertyModel
        $propertyModel = new PropertyModel();

        // Get search parameters from the GET request
        $location = $this->request->getGet('location');
        $bedrooms = $this->request->getGet('bedrooms');
        $type = $this->request->getGet('type');

        // Build the query based on the search parameters
        $query = $propertyModel->where('status', 'available');

        if (!empty($location)) {
            $query->like('location', $location);
        }

        if (!empty($bedrooms)) {
            $query->where('bedrooms', $bedrooms);
        }

        if (!empty($type)) {
            $query->where('type', $type);
        }

        // Execute the query and get the results
        $qurry = $query->findAll();
        $data = [
            'apartment' => $qurry,
            'page' => $page,
        
        ];

        // Load the search results view
        return view('apartment', $data);
    }
}
