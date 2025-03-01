<?php

namespace App\Controllers\Agents;

use App\Models\PropertyModel;
use App\Models\FeatureModel;
use App\Models\PropertyFeatureModel;
use App\Models\LocationModel;
use App\Models\CategoryModel;
use App\Models\PropertyImageModel;
use CodeIgniter\Controller;

class PropertyController extends Controller
{
    protected $propertyModel;
    protected $imageModel;
    protected $locModel;
    protected $featureModel;
    protected $catModel;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->propertyModel = new PropertyModel();
        $this->imageModel = new PropertyImageModel();
        $this->featureModel = new FeatureModel();
        $this->catModel = new CategoryModel();
        $this->locModel = new LocationModel();
    }

    // List all properties
    public function index()
    {
        $userId = session()->get('user_id');
        $data['properties'] = $this->propertyModel->where('user_id', $userId)->findAll();
        return view('agent/properties', $data);
    }

    // Show create form
    public function create()
    {
        $data['features'] = $this->featureModel->findAll();
        $data['categories'] = $this->catModel->findAll();
        $data['locations'] = $this->locModel->findAll();
        return view('agent/post_property', $data);
    }

    // Store a new property with images
    public function store()
    {
        // Validate form input
        $validation = \Config\Services::validation();
        $validation->setRules($this->propertyModel->validationRules);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $featModel =
            new PropertyModel();
        // Insert property
        $session = session();
        $username = $session->get('username');
        $userId = $session->get('user_id');

        $propertyData = $this->request->getPost();
        $propertyData['username'] = $username;
        $propertyData['user_id'] = $userId;

        // Remove 'features' from property data before inserting into properties table
        $features = $propertyData['features'] ?? [];
        unset($propertyData['features']);


        // Insert into properties table
        $this->propertyModel->insert($propertyData);
        $propertyId = $this->propertyModel->insertID();

        // Insert property features into property_features table

        if (!empty($features)) {
            foreach ($features as $featureId) {
                $featModel->insert([
                    'property_id' => $propertyId,
                    'feature_id' => $featureId
                ]);
            }
        }

        // Handle image uploads
        $files = $this->request->getFiles();
        if (!empty($files['images'])) {
            foreach ($files['images'] as $index => $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('uploads/properties', $newName);
                    $this->imageModel->insert([
                        'property_id' => $propertyId,
                        'image_url' => 'uploads/properties/' . $newName,
                        'is_main' => ($index == 0) ? 1 : 0
                    ]);
                }
            }
        }

        return redirect()->to('/properties')->with('success', 'Property added successfully.');
    }

   

    // Show edit form
    public function edit($id)
    {
        $data['property'] = $this->propertyModel->find($id);
        return view('properties/edit', $data);
    }

    // Update property
    public function update($id)
    {
        $data = $this->request->getPost();
        $this->propertyModel->update($id, $data);
        return redirect()->to('/properties')->with('success', 'Property updated successfully.');
    }

    // Delete property and images
    public function delete($id)
    {
        $images = $this->imageModel->where('property_id', $id)->findAll();
        foreach ($images as $image) {
            if (file_exists($image['image_url'])) {
                unlink($image['image_url']);
            }
        }
        $this->imageModel->where('property_id', $id)->delete();
        $this->propertyModel->delete($id);

        return redirect()->to('/properties')->with('success', 'Property deleted successfully.');
    }


    public function toggleVisibility($id)
    {
        // Retrieve the property by its ID
        $property = $this->propertyModel->find($id);
        $username = session()->get('username');
    
        // Check if the property exists
        if (!$property) {
            return redirect()->back()->with('error', 'Property not found');
        }
    
        // Toggle the visibility
        $newStatus = ($property['visibility'] == 'visible') ? 'hidden' : 'visible';
    
        // Update the property record
        $data = [
            'visibility' => $newStatus,
            'change_time' => date('Y-m-d H:i:s'),
            'changed_by' => $username,
        ];
    
        $updated = $this->propertyModel->update($property['id'], $data);
    
        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update property status');
        }
    
        return redirect()->back()->with('success', 'Property status changed successfully');
    }
}