<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    protected $toTruncate = ['users'];

    public function run()
    {
        $this->call([
            UserSeed::class,
        ]);
    }
}
