<?php

namespace App\Controllers\Admin;

use App\Models\PropertyModel;
use App\Models\FeatureModel;
use App\Models\PropertyFeatureModel;
use App\Models\LocationModel;
use App\Models\CategoryModel;
use App\Models\PropertyImageModel;
use App\Models\AgentModel;

use CodeIgniter\Controller;



class PropertyController extends Controller
{
    
    protected $propertyModel;
    protected $imageModel;
    protected $locModel;
    protected $featureModel;
    protected $PropertyFeatureModel;
    protected $agentsModel;
    protected $catModel;

    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->propertyModel = new PropertyModel();
        $this->imageModel = new PropertyImageModel();
        $this->featureModel = new FeatureModel();
        $this->propfeatureModel = new PropertyFeatureModel();
        $this->catModel = new CategoryModel();
        $this->locModel = new LocationModel();
        $this->agentsModel = new AgentModel();

        
    }

    // List all properties
    public function index()
    {
        $data['properties'] = $this->propertyModel->findAll();

        // $apartmentModel = new PropertyModel();
        // $data = $apartmentModel->getPropertiesWithDetails();
        
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('admin/properties', $data);
    }

    // Show create form
    public function create()
    {
        $data['features'] = $this->featureModel->findAll();
        $data['categories'] = $this->catModel->findAll();
        $data['locations'] = $this->locModel->findAll();
        $data['agents'] = $this->agentsModel->findAll();

        return view('admin/post_property', $data);
    }


    public function store()
    {
        // Validate form input
        $validation = \Config\Services::validation();
        $validation->setRules($this->propertyModel->validationRules);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $session = session();
        $username = $session->get('username');
    
        $propertyData = $this->request->getPost();
        $propertyData['username'] = $username;
        $propertyData['posted_by'] = $username;
    
        // Generate a unique URL-friendly slug for the property title
        $propertyData['prop_url'] = $this->generateSlug($propertyData['title']);
    
        // Handle Thumbnail Upload
        $thumbnail = $this->request->getFile('thumbnail');
        if ($thumbnail && $thumbnail->isValid() && !$thumbnail->hasMoved()) {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('uploads/thumbnails', $thumbnailName);
            $propertyData['thumbnail'] = 'uploads/thumbnails/' . $thumbnailName; // Save thumbnail path
        }
    
        // Insert property data
        $this->propertyModel->insert($propertyData);
        $propertyId = $this->propertyModel->insertID();
    
        // Insert property features
        if (!empty($propertyData['features'])) {
            foreach ($propertyData['features'] as $featureId) {
                $this->propfeatureModel->insert([
                    'property_id' => $propertyId,
                    'feature_id' => $featureId
                ]);
            }
        }
    
        // Handle Multiple Image Uploads (Property Images)
        $files = $this->request->getFiles();
        if (!empty($files['images'])) {
            foreach ($files['images'] as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move('uploads/properties', $newName);
                    $this->imageModel->insert([
                        'property_id' => $propertyId,
                        'image_url' => 'uploads/properties/' . $newName
                    ]);
                }
            }
        }
    
        return redirect()->to('/properties')->with('success', 'Property added successfully.');
    }
    
    // Function to generate slug from title
    private function generateSlug($title)
    {
        $slug = url_title($title, '-', true); // Convert title to slug
        $existing = $this->propertyModel->where('prop_url', $slug)->countAllResults();
    
        if ($existing > 0) {
            $slug .= '-' . time(); // Append timestamp if slug exists
        }
    
        return $slug;
    }
    

     // Show edit 
     
public function edit($id)
{
    $propertyModel = new PropertyModel();
    $categoryModel = new CategoryModel();
    $agentModel = new AgentModel();
    $locationModel = new LocationModel();
    $featureModel = new FeatureModel();


    // Fetch the property details
    $property = $propertyModel->find($id);
    if (!$property) {
        return redirect()->to('/properties')->with('error', 'Property not found');
    }

    // Fetch related data
    $categories = $categoryModel->findAll();
    $agents = $agentModel->findAll();
    $locations = $locationModel->findAll();
    $features = $featureModel->findAll();


     // Fetch property images
     $images = $this->imageModel->where('property_id', $id)->findAll();
    // Fetch selected features
    // $propertyFeatures = $propertyModel->getPropertyFeatures($id); // Implement this method to get selected features

    return view('admin/property_edit', [
        'property' => $property,
        'categories' => $categories,
        'images' => $images,
        'agents' => $agents,
        'locations' => $locations,
        'features' => $features,
        // 'propertyFeatures' => $propertyFeatures
    ]);
}


    // Update property
    public function update($id)
    {
        $data = $this->request->getPost();
        $this->propertyModel->update($id, $data);
        return redirect()->to('/properties')->with('success', 'Property updated successfully.');
    }

    // Delete entire property and its images
    public function delete($id)
    {
        $images = $this->imageModel->where('property_id', $id)->findAll();

        foreach ($images as $image) {
            $filePath = $image['image_url'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $this->imageModel->where('property_id', $id)->delete();
        $this->propertyModel->delete($id);

        return redirect()->to('/properties')->with('success', 'Property deleted successfully.');
    }

    // **Delete individual property image**
    public function deleteImage($imageId)
    {
        $image = $this->imageModel->find($imageId);
        if ($image) {
            $filePath = $image['image_url'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $this->imageModel->delete($imageId);
            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }

    // public function Statushidden($id)
    // {

    //     // Retrieve the booking by its ID
    //     $property = $this->propertyModel->find($id);
    //     $username = session()->get('username');

    //     // Check if the booking exists
    //     if (!$property) {
    //         return redirect()->back()->with('error', 'property not found');
    //     }

    //     // Update the booking record
    //     $data = [
    //         'visibility' => 'hidden',
    //         'change_time' => date('Y-m-d H:i:s'),
    //         'changed_by' => $username,
    //     ];

    //     // echo '<pre>';
    //     // print_r($data);
    //     // die;

    //     $updated =  $this->propertyModel->update($property['id'], $data);

    //     // echo '<pre>';
    //     // print_r($updateData);
    //     // die;

    //     if ($updated === false) {
    //         return redirect()->back()->with('error', 'Failed to update room status in details table');
    //     }

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'Status changed successfully');
    // }

    // public function Statushidden($id)
    // {
    //     // Ensure ID is valid
    //     if (empty($id) || !is_numeric($id)) {
    //         return redirect()->back()->with('error', 'Invalid property ID');
    //     }
    
    //     // Retrieve the property
    //     $property = $this->propertyModel->find($id);
    //     $username = session()->get('username');
    
    //     // Check if the property exists
    //     if (!$property) {
    //         return redirect()->back()->with('error', 'Property not found');
    //     }
    
    //     // Ensure the new data is different
    //     if ($property['visibility'] === 'hidden') {
    //         return redirect()->back()->with('error', 'Property is already hidden');
    //     }
    
    //     // Prepare update data
    //     $data = [
    //         'visibility' => 'hidden',
    //         'change_time' => date('Y-m-d H:i:s'),
    //         'changed_by' => $username,
    //     ];
    
    //     // Debugging: Check if data is properly set
    //     if (empty($data)) {
    //         return redirect()->back()->with('error', 'No data to update');
    //     }
    
    //     // Perform the update with WHERE condition
    //     $updated = $this->propertyModel
    //         ->where('id', $id)  // Ensure ID matches
    //         ->set($data)
    //         ->update();
    
    //     if (!$updated) {
    //         return redirect()->back()->with('error', 'Failed to update property status');
    //     }
    
    //     return redirect()->back()->with('success', 'Property status changed successfully');
    // }

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