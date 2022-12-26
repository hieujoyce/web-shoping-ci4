<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
  protected $table      = 'order_items';
  protected $primaryKey = 'id';
  protected $allowedFields = ['id', 'product_id', 'order_id', 'qty'];
}