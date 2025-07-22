<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
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
            'type' => [ // 'income' atau 'expense'
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => 0.00,
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'transaction_date' => [
                'type'       => 'DATE',
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}