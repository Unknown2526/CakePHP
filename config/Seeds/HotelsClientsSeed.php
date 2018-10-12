<?php
use Migrations\AbstractSeed;

/**
 * HotelsClients seed.
 */
class HotelsClientsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'hotel_id' => '1',
                'client_id' => '2',
                'nb_chambre' => '0',
                'date_de' => '0000-00-00',
                'date_a' => '0000-00-00',
            ],
        ];

        $table = $this->table('hotels_clients');
        $table->insert($data)->save();
    }
}
