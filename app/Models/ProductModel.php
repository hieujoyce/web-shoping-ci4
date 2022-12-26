<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table      = 'products';
  protected $primaryKey = 'id';
  protected $allowedFields = ['name', 'image', 'des', 'id', 'categories_id', 'price', 'qty'];
}