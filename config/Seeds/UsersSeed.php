<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'user_id' => '5',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$pTN9w5oNfFMVLsRSDH2wNeLCch6hleYUcpZj9aO19/Trb2Hxmj6fy',
                'role_id' => 'admin',
                'created' => '2018-10-01 01:53:33',
                'modified' => '2018-10-01 01:53:33',
            ],
            [
                'user_id' => '8',
                'email' => 'anthonychow000@gmail.com',
                'password' => '$2y$10$hW.Nv2Jm2WLpJRMny2/HP.9jvcKwimn33mx8p6bErgWqCBxIg8IqG',
                'role_id' => 'client',
                'created' => '2018-10-07 20:50:11',
                'modified' => '2018-10-07 20:50:11',
            ],
            [
                'user_id' => '11',
                'email' => 'anthonychow8@gmail.com',
                'password' => '$2y$10$dn9/HiQdKDKMhDuiVRSXfu1kmbiirjvZAV1tewM6Jeje780kUTk36',
                'role_id' => 'proprietaire',
                'created' => '2018-10-09 21:28:14',
                'modified' => '2018-10-09 21:28:14',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
