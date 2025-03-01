<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', 'category_id', 'location_id', 'title', 'username', 'posted_by', 
        'location', 'locationmap', 'change_time', 'prop_url', 'description', 
        'changed_by', 'thumbnail', 'price', 'bedrooms', 'toilets', 'bathrooms', 
        'area', 'status', 'type', 'visibility', 'is_featured', 'created_at', 'updated_at'
    ];

    protected $validationRules = [
        // 'user_id'     => 'required|integer',
        'category_id' => 'required|integer',
        // 'location_id' => 'required|integer',
        'title'       => 'required|min_length[3]|max_length[255]',
        // 'username' => 'required',
        'description' => 'required',
        'price'       => 'required|decimal',
        'bedrooms'    => 'integer',
        'bathrooms'   => 'integer',
        'area'        => 'integer',
        'status'      => 'in_list[available,sold,rented]'
    ];

    public function getPropertiesWithDetails()
    {
        return $this->select('
                properties.*,
                agents.name AS agent_name, agents.username AS agent_username, agents.email AS agent_email, agents.phone AS agent_phone,
                agents.address AS agent_address, agents.govt_id AS agent_govt_id, agents.company_name AS agent_company,
                agents.photo AS agent_photo, agents.status AS agent_status, agents.paid AS agent_paid,
                categories.name AS category_name,
                locations.city AS location_city, locations.state AS location_state, locations.country AS location_country,
                GROUP_CONCAT(DISTINCT property_images.image_url) AS images,
                GROUP_CONCAT(DISTINCT features.name) AS features
            ')
            ->join('agents', 'agents.id = properties.user_id', 'left')  // Join Agents Table
            ->join('categories', 'categories.id = properties.category_id', 'left')  // Join Categories Table
            ->join('locations', 'locations.id = properties.location_id', 'left')  // Join Locations Table
            ->join('property_images', 'property_images.property_id = properties.id', 'left')  // Join Property Images
            ->join('property_features', 'property_features.property_id = properties.id', 'left')  // Join Property Features
            ->join('features', 'features.id = property_features.feature_id', 'left')  // Join Features Table
            ->groupBy('properties.id')  // Ensure unique property rows
            ->findAll();
    }

    public function getPropertyByUrl($prop_url)
{
    return $this->select('
            properties.*,
            agents.name AS agent_name, agents.username AS agent_username, agents.email AS agent_email, agents.phone AS agent_phone,
            agents.address AS agent_address, agents.govt_id AS agent_govt_id, agents.company_name AS agent_company,
            agents.photo AS agent_photo, agents.status AS agent_status, agents.paid AS agent_paid,
            categories.name AS category_name,
            locations.city AS location_city, locations.state AS location_state, locations.country AS location_country,
            GROUP_CONCAT(DISTINCT property_images.image_url) AS images,
            GROUP_CONCAT(DISTINCT features.name) AS features
        ')
        ->join('agents', 'agents.id = properties.user_id', 'left')
        ->join('categories', 'categories.id = properties.category_id', 'left')
        ->join('locations', 'locations.id = properties.location_id', 'left')
        ->join('property_images', 'property_images.property_id = properties.id', 'left')
        ->join('property_features', 'property_features.property_id = properties.id', 'left')
        ->join('features', 'features.id = property_features.feature_id', 'left')
        ->where('properties.prop_url', $prop_url)
        ->groupBy('properties.id')
        ->first();  // Fetch only one record
}


}