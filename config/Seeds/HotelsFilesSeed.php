<?php
use Migrations\AbstractSeed;

/**
 * HotelsFiles seed.
 */
class HotelsFilesSeed extends AbstractSeed
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
                'hotel_id' => '1',
                'file_id' => '1',
            ],
            [
                'id' => '5',
                'hotel_id' => '1',
                'file_id' => '13',
            ],
        ];

        $table = $this->table('hotels_files');
        $table->insert($data)->save();
    }
}
