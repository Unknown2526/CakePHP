<?php
use Migrations\AbstractSeed;

/**
 * Villes seed.
 */
class VillesSeed extends AbstractSeed
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
                'id' => '1',
                'nom' => 'Toronto',
                'pays_code' => '2',
            ],
            [
                'id' => '2',
                'nom' => 'Montreal',
                'pays_code' => '2',
            ],
            [
                'id' => '3',
                'nom' => 'Ottawa',
                'pays_code' => '2',
            ],
            [
                'id' => '4',
                'nom' => 'Vancouver',
                'pays_code' => '2',
            ],
            [
                'id' => '5',
                'nom' => 'Quebec',
                'pays_code' => '2',
            ],
            [
                'id' => '6',
                'nom' => 'New York',
                'pays_code' => '1',
            ],
            [
                'id' => '7',
                'nom' => 'Chicago',
                'pays_code' => '1',
            ],
            [
                'id' => '8',
                'nom' => 'San Diego',
                'pays_code' => '1',
            ],
            [
                'id' => '9',
                'nom' => 'San Francisco',
                'pays_code' => '1',
            ],
            [
                'id' => '10',
                'nom' => 'Buffalo',
                'pays_code' => '1',
            ],
        ];

        $table = $this->table('villes');
        $table->insert($data)->save();
    }
}
