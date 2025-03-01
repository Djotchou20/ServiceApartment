<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    // Table name
    protected $DBGroup   = 'default';
    protected $table      = 'bookings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';

    // Allow fields to be inserted/updated
    protected $allowedFields = [
        'property_id',
        'user_id',
        'check_in',
        'username',
        'thumbnail',
        'title',
        'check_out',
        'total_price',
        'price',
        'status',
        'payment_status',
        'payment_method',
    ];

    // Use timestamps (created_at and updated_at)
    protected $useTimestamps = true;

    // Date format for timestamps
    protected $dateFormat = 'datetime';

    // Cast fields to appropriate types
    // protected $casts = [
    //     'check_in' => 'date',
    //     'check_out' => 'date',
    //     'total_price' => 'float',
    //     'price' => 'float',
    //     'status' => 'string',
    //     'payment_status' => 'string',
    //     'payment_method' => 'string',
    // ];

    // Relationships
    public function property()
    {
        return $this->belongsTo('App\Models\PropertyModel', 'property_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\AgentModel', 'user_id');
    }
}