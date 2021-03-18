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
        $users->name = 'adasd';
        $users->email = 'aaa@gmail.com';
        $users->password = '1234567';

        $users->save();

        $userD = new UserDetail();
        $userD->user_id = $users->id;
        $userD->position = 'asd';
        $userD->status = 'active';

        $userD->save();

        return $users;
    }
}
