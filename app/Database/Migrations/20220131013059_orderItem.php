<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderItem extends Migration
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
          'product_id' => [
            'type'           => 'INT',
            'constraint'     => 5,
          ],
          'order_id' => [
            'type'           => 'INT',
            'constraint'     => 5,
          ],
          'qty' => [
            'type'           => 'INT',
          ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('order_items');
    }

    public function down()
    {
        $this->forge->dropTable('order_items');
    }
}