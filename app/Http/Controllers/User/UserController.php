<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\UserDetail;
use App\Http\Traits\ApiResponser;
use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{

    use ApiResponser;

    public function __construct() {
        $this->middleware('auth-middle');
    }

    public function index()
    {
        $userDetail = UserDetail::with('user')->paginate(2);
        return view('manage_user.index', [
            'user' => $userDetail,
        ])->render();
    }
}
