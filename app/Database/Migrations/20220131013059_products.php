<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 5,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'name' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
        ],
        'image' => [
            'type' => 'TEXT',
            'null' => true,
        ],
        'des' => [
          'type' => 'TEXT',
          'null' => true,
        ],
        'qty' => [
          'type' => 'INT',
        ],
        'categories_id' => [
          'type' => 'INT',
          'constraint' => 5,
        ],
        'price' => [
          'type' => 'DECIMAL',
          'constraint' => '10,2',
        ],
      ]);
      $this->forge->addKey('id', true);
      $this->forge->createTable('products');
      $this->forge->addForeignKey('categories_id', 'categories', 'id');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}