<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\UserDetail;

class DashboardController extends Controller
{

    public function __construct() {
        $this->middleware('auth-middle');
    }

    public function index()
    {
        $user = Auth::user();
        $status_user = UserDetail::find($user->id);
        return view('dashboard.home', [
            'user_status' => $status_user,
        ])->render();
    }
}
