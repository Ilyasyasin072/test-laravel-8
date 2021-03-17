<?php

namespace App\Http\Controllers\UserDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use App\Http\Traits\ApiResponser;

class UserDetailController extends Controller
{
    use ApiResponser;

    public function __construct()

    {

    }

    public function index_data() {

        try {

            // With Eagerloading
            $user_detail = UserDetail::with('user')->get();

            // With Scope On Model
            // $user_detail = UserDetail::UserDetailJson();

            $response = $this->responseSuccess('GET', $user_detail, 200);

        } catch (\Throwable $th) {
            //throw $th;

            $response = $this->responseSuccess('Error', $th->getMessage(), 401);
        }


        return $response;
    }


    public function store(Request $request) {

        $validated = $request->validate([
            'user_id' => ['required'],
            'status' => ['required'],
            'position' => ['required'],
        ]);


        $user_detail = new UserDetail($validated );

        $user_detail->user_id = $request->user_id;
        $user_detail->status = $request->status;
        $user_detail->position = $request->position;

        try {

            if($user_detail->save()) {
                $response = $this->responseSuccess('POST', $user_detail, 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $response = $this->responseError($ex->getMessage(), 500);
        } catch (\Throwable $th) {
            //throw $th;
            $response = $this->responseError($th->getMessage(), 401);
        }

        return $response;
    }

    public function update(Request $request, $id) {

        $user_detail = UserDetail::find($id);

        $user_detail->user_id = $request->user_id;
        $user_detail->status = $request->status;
        $user_detail->position = $request->position;

        try {

            if($user_detail->save()) {

                $response = $this->responseSuccess('GET', $user_detail, 200);

            }

        } catch (\Illuminate\Database\QueryException $ex) {

            $response = $this->responseError($ex->getMessage(), 500);
        } catch (\Throwable $th) {
            //throw $th;

            $response = $this->responseError($th->getMessage(), 401);
        }

        return $response;

    }

    public function show($id) {

        $user_detail = UserDetail::find($id);

        try {

            $response = $this->responseSuccess('GET', $user_detail, 200);

        } catch (\Illuminate\Database\QueryException $ex) {

            $response = $this->responseError($ex->getMessage(), 500);
        } catch (\Throwable $th) {
            //throw $th;

            $response = $this->responseError($th->getMessage(), 401);
        }

        return $response;
    }

    public function delete($id) {

        $user_detail = UserDetail::find($id);


        try {
            if($user_detail->delete()) {

                $response = $this->responseSuccess('GET', $user_detail, 200);

            }
        } catch (\Illuminate\Database\QueryException $ex) {

            $response = $this->responseError($ex->getMessage(), 500);

        } catch (\Throwable $th) {
            //throw $th;

            $response = $this->responseError($th->getMessage(), 401);
        }

        return $response;
    }
}
