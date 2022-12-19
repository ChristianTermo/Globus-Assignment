<?php

namespace App\Utils;

class CustomResponse
{


    public static function setFailResponse($message, $code, $errors = null)
    {
        $params = array(
            'success' => false,
            'message' => $message,
            'code' => $code,
            'errors' => $errors,
        );
        //code is the status of result request (200, 404, 500...)

        return response()->json($params, $code);
    }

    
    public static function setSuccessResponse($message, $code, $objName = null, $data= null)
    {
        $params = array(
            'success' => true,
            'message' => $message,
            'code' => $code,
            
        );
        //code is the status of result request (200, 404, 500...)
        
        if($objName){
            $params['data'] =[$objName =>$data];
        }

        if($objName ==null && $data){
            $params['data'] = $data;
        }
        return response()->json($params, $code);
    }
}
