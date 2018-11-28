<?php

class EventsSeeder extends Seeder {

    private $table = 'events';

    public function run() {
        $this->db->truncate($this->table);

        //seed many records using faker
        $limit = 30;
        echo "seeding $limit events";

        for ($i = 0; $i < $limit; $i++) {
            echo ".";

            $data = array(
                'descr' => $this->faker->unique()->word,
                'date' => $this->faker->date($format = 'Y-m-d H:i:s'),
                'created_from_ip' => $this->faker->ipv4,
                'updated_from_ip' => $this->faker->ipv4,
                'date_created' => $this->faker->date($format = 'Y-m-d H:i:s'),
                'date_updated' => $this->faker->date($format = 'Y-m-d H:i:s'),
            );

            $this->db->insert($this->table, $data);
        }

        echo PHP_EOL;
    }
}
