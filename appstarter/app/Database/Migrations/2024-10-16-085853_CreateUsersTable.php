<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTables extends Migration
{
    public function up()
    {
        // Tabel Users
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nim'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'unique'         => true,
            ],
            'password'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'role'       => [
                'type'           => 'ENUM',
                'constraint'     => ['user', 'admin'],
                'default'        => 'user', // Set default role to 'user'
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => 'CURRENT_TIMESTAMP',
                'on_update'      => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', true); // Primary Key untuk tabel users
        $this->forge->createTable('users');

        // Tabel Pendaftaran Event
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'event_id'   => [
                'type'           => 'INT',
                'null'           => false,
            ],
            'username'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
            ],
            'email'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
                'null'           => false,
            ],
            'nim'        => [
                'type'           => 'VARCHAR',
                'constraint'     => '10',
                'null'           => false,
            ],
            'telpon'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
                'null'           => false,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => 'CURRENT_TIMESTAMP',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => 'CURRENT_TIMESTAMP',
                'on_update'      => 'CURRENT_TIMESTAMP',
            ],
        ]);
        $this->forge->addKey('id', true); // Primary Key untuk tabel pendaftaran_event
        $this->forge->createTable('pendaftaran_event');
    }

    public function down()
    {
        // Hapus tabel ketika melakukan rollback
        $this->forge->dropTable('users');
        $this->forge->dropTable('pendaftaran_event');
    }
}
