<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait Responses
{
    public function jsonOnly($res)
    {
        return response()->json($res);
    }

    public function responseJson($msg, $res)
    {
        $success    = true;
        $code       = 200;
        if (isset($res->errors) && !empty($res->errors))
        {
            $success = false;
            $errors  = $res->errors;
            if (isset($errors['error_code']))
                $code = $errors['error_code'];
            unset($res->errors);
        }

        $response['success']    = $success;
        $response['message']    = $msg;
        $response['data']       = !empty($res) ? $res : [];

        if (isset($errors))
            $response['errors'] = $errors;

        return response()->json($response, $code);
    }

    public function validation($data, $rules)
    {
        $validator  = Validator::make($data, $rules);
        if ($validator->fails())
        {
            $errors = $validator->errors();
            return (object) ['errors' => ['error_code' => 422, 'error_msg' => $errors->all()]];
        }
    }
}
