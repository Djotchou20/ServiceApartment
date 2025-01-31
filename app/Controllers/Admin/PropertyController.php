<?php

namespace App\Controllers\Admin;

use App\Models\PropertyModel;
use App\Models\FeatureModel;
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
        $data['properties'] = $this->propertyModel->findAll();
        return view('properties/index', $data);
    }

    // Show create form
    public function create()
    {
        $data['features'] = $this->featureModel->findAll();
        $data['categories'] = $this->catModel->findAll();
        $data['locations'] = $this->locModel->findAll();
        return view('user/post_property', $data);
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

        // Insert property
        $session = session(); // Load session
        $username = $session->get('username'); // Get username from session

        $propertyData = $this->request->getPost(); // Get post data
        $propertyData['username'] = $username;
        $this->propertyModel->insert($propertyData);
        $propertyId = $this->propertyModel->insertID();

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
}