<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
  protected $table      = 'orders';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id', 'amount', 'type', 'date', 'user_id', 'status', 'address', 'phone'];
}