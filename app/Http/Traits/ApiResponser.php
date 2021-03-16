<?php

namespace App\Http\Traits;

trait ApiResponser {

    public function responseSuccess($message, $result, $code) {

        $data = [
            'message' => $message,
            'data' => $result,
            'code' => $code,
        ];

        return response()->json($data);
    }

    public function responseError($message, $code) {

        $data = [
            'message' => $message,
            'code' => $code
        ];

        return response()->json($data);
    }

}
