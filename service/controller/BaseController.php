<?php
/**
 * 
 */
class BaseController
{
    public function response($code, $data = '')
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code($code);
        $response['message'] = $code == 200 ? 'OK' : 'NOT OK';
        $response['data'] = $data;

        echo json_encode($response);
    }
}