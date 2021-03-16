<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';
    protected $primaryKey = 'user_id';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Scope

    public function scopeUserDetailJson($query) {
        return $query->select('*')
        ->leftJoin('users', 'users.id', '=', 'user_details.user_id')
        ->get();
    }
}
