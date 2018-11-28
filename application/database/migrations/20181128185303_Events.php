<?php

class Migration_Events extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'descr' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'date' => array(
                'type' => 'DATETIME'
            ),
            'created_from_ip' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'updated_from_ip' => array(
                'type' => 'VARCHAR',
                'constraint' => 100
            ),
            'date_created' => array(
                'type' => 'DATETIME'
            ),
            'date_updated' => array(
                'type' => 'DATETIME'
            )
        ));
       
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('events');
    }

    public function down() {
        $this->dbforge->drop_table('events');
    }

}
