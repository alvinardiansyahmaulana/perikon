<?php

function responseError($message)
{
    return response([
        'error' => true,
        'message' => $message
    ]);
}

function responseSuccess($data)
{
    return response([
        'error' => false,
        'data' => $data
    ]);
}

function getUserAccessToken()
{
    return auth()->user()->createToken('API Token')->accessToken;
}