<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * return response json
     *
     * @param  string $msg
     * @param  int $status
     * @param  array $data
     *
     * @return void
     */
    public function responseAPI($msg, $status, $data = []) {

        if(!is_array($data) && !is_object($data)) {
            return response()->json('Retorno deve ser um array ou um objeto', 500);
        }

        $responseJson = [
            'message' => $msg,
            'data' => $data
        ];

        return response()->json($responseJson, $status);
    }
}
