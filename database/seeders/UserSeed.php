<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $users = new User();
        $users->name = 'Example';
        $users->email = 'example2@gmail.com';
        $users->password = Hash::make('12345678');

        $users->save();

        $userD = new UserDetail();
        $userD->user_id = $users->id;
        $userD->position = 'MANAGER IT';
        $userD->status = 'active';

        $userD->save();

        return $users;
    }
}
