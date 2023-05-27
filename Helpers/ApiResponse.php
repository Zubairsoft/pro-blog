<?php

function sendSuccessResponse($message = 'successful', $data = null, $status_code = 200)
{
    $response = [
        'message' => $message,
        'data' => 'data'
    ];

    return response()->json($response, $status_code);
}


function sendFailedResponse($message = 'failed', $data = null, $status_code = 404)
{
    $response = [
        'message' => $message,
        'data' => 'data'
    ];

    return response()->json($response, $status_code);
}
