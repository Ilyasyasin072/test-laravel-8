<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;
use Validator;
use Hash;
use Str;

class AuthController extends Controller
{

    use ApiResponser;

    public function __construct()
    {
        $this->middleware('auth-middle')->only('details');
    }

    public function register(Request $request)
    {

        $rules = array(
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        );

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            $errors = $validate->messages();
            return response()->json($errors, 500);
        }

        $users = new User();

        $users->name = $request->name;
        $users->email = Str::lower($request->email);
        $users->password = Hash::make($request->password);

        try {
            if ($users->save()) {
                $response = $this->responseSuccess('GET', $users, 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $response = $this->responseError($ex->getMessage(), 500);
        } catch (\Throwable $th) {
            //throw $th;
            $response = $this->responseError($th->getMessage(), 401);
        }

        return $response;
    }


    public function login()
    {

        try {
            if (!Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                return response()->json(['error' => 'Check Your Email and Password'], 400);
            }

            $user = auth()->user();

            if ($user) {
                $status = UserDetail::find($user->id);

                if ($status->status == 'active') {

                    return response()->json(['users' => $user], 200);

                } else {

                    return response()->json(['failed' => 'Your Account Non Active'], 401);

                }
            } else {
                return response()->json(['failed' => 'Your Dont Have Account'], 401);
            }
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {

        $users = User::UserJson();

        return $this->responseSuccess('GET', $users, 200);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user]);
    }
}
