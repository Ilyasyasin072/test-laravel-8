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
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    use ApiResponser;

    public function __construct()
    {
        $this->middleware('auth-middle')->except(['login', 'checkLogin', 'index_user']);
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

    public function login() {

        return view('auth.login')->render();

    }


    public function checkLogin(Request $request)
    {

        try {
            if (!Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
                return response()->json(['error' => 'Check Your Email and Password'], 401);
            }

            $user = auth()->user();
            $user->save();
            Auth::login($user);
            if ($user) {
                $status = UserDetail::find($user->id);

                if ($status->status == 'active') {
                    return redirect()->route('home')->with( ['user' => $user] );

                } else {

                    return response()->json(['error' => 'Your Account Non Active'], 400);

                }
            }
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }

    public function index_data()
    {

        $users = User::UserJson();

        return $this->responseSuccess('GET', $users, 200);
    }
}
