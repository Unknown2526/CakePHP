<?php
use Migrations\AbstractSeed;

/**
 * Hotels seed.
 */
class HotelsSeed extends AbstractSeed
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
                'hotel_nom' => 'Best Western',
                'hotel_adresse' => '3407 Rue Peel',
                'hotel_codepostal' => 'H3A 1W7',
                'hotel_ville' => 'Montréal',
                'hotel_url' => 'www.bestwestern.com',
                'pays_code' => '2',
                'user_id' => '5',
                'created' => '2018-09-21 03:20:37',
                'modified' => '2018-09-22 15:45:24',
            ],
            [
                'hotel_id' => '2',
                'hotel_nom' => 'best',
                'hotel_adresse' => 'best',
                'hotel_codepostal' => 'best',
                'hotel_ville' => 'best',
                'hotel_url' => 'best',
                'pays_code' => '1',
                'user_id' => '11',
                'created' => '2018-10-09 21:28:40',
                'modified' => '2018-10-09 21:28:40',
            ],
        ];

        $table = $this->table('hotels');
        $table->insert($data)->save();
    }
}
