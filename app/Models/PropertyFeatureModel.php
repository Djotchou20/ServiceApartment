<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyFeatureModel extends Model
{
    protected $table = 'property_features';
    protected $primaryKey = 'id';
    protected $allowedFields = ['property_id', 'feature_id'];
}