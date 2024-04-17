<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'sell', 'created_at'];
    protected $useTimestamps = false; // Disable automatic timestamp updates

    // Other model methods can be added here as needed
}
