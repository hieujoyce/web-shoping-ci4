<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
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
          'amount' => [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
          ],
          'type' => [
            'type' => 'ENUM("COD", "online")',
            'default' => 'COD',
            'null' => false,
          ],
          'date' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
          ],
          'user_id' => [
            'type'           => 'INT',
            'constraint'     => 5,
          ],
          'date' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
          ],
          'status' => [
            'type' => 'ENUM("Shipping", "Processing", "Sold")',
            'default' => 'Processing',
          ],
          'address' => [
            'type' => 'TEXT',
          ],
          'phone' => [
            'type'       => 'VARCHAR',
            'constraint' => '100',
          ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}