<?php
use Migrations\AbstractSeed;

/**
 * Clients seed.
 */
class ClientsSeed extends AbstractSeed
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
                'client_id' => '1',
                'client_nom' => 'Anthony',
                'client_adresse' => '123 rue allo',
                'client_ville' => 'Montréal',
                'client_phone' => '514-111-1111',
                'email' => 'anthony@gmail.com',
                'user_id' => '5',
                'created' => '2018-09-20 08:23:09',
                'modified' => '2018-09-20 12:34:31',
            ],
            [
                'client_id' => '2',
                'client_nom' => 'anthony',
                'client_adresse' => '123 allo',
                'client_ville' => 'montreal',
                'client_phone' => '111-111-1111',
                'email' => 'a@gmail.com',
                'user_id' => '5',
                'created' => '2018-10-08 02:13:50',
                'modified' => '2018-10-09 02:40:59',
            ],
        ];

        $table = $this->table('clients');
        $table->insert($data)->save();
    }
}
