<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'file_name' => 'Hello.jpg',
                'file_path' => 'Files/',
                'created' => '2018-09-24 07:00:00',
                'modified' => '2018-09-24 07:10:00',
                'status' => '1',
            ],
            [
                'id' => '13',
                'file_name' => 'Tulips.jpg',
                'file_path' => 'Files/',
                'created' => '2018-10-08 21:47:15',
                'modified' => '2018-10-08 21:47:15',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
