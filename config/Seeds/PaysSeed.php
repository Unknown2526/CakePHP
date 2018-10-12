<?php
use Migrations\AbstractSeed;

/**
 * Pays seed.
 */
class PaysSeed extends AbstractSeed
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
                'pays_code' => '1',
                'pays_devise' => 'USD',
                'pays_nom' => 'États-Unis',
            ],
            [
                'pays_code' => '2',
                'pays_devise' => 'CAD',
                'pays_nom' => 'Canada',
            ],
        ];

        $table = $this->table('pays');
        $table->insert($data)->save();
    }
}
