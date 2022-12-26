<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
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
          'username' => [
              'type'       => 'VARCHAR',
              'constraint' => '100',
          ],
          'avatar' => [
              'type' => 'TEXT',
              'null' => true,
          ],
          'password' => [
              'type'       => 'VARCHAR',
              'constraint' => '200',
          ],
          'email' => [
              'type'       => 'VARCHAR',
              'constraint' => '100',
          ],
          'role' => [
            'type'       => 'ENUM("admin", "user")',
            'default' => 'user',
            'null' => false,
          ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}