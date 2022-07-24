<?php

use illuminate\Support\Collection;
use Illuminate\Http\Response;

function responseError(mixed $message): Response
{
    return response([
        'error' => true,
        'message' => $message
    ], 400);
}

function responseSuccess(mixed $data): Response
{
    return response([
        'error' => false,
        'data' => $data
    ], 200);
}

function getUserAccessToken(): string
{
    return auth()->user()->createToken('API Token')->accessToken;
}

function isDataCollection(mixed $data): bool
{
    return ($data instanceof Collection);
}

function responseWithData(mixed $data): Response
{
    return isDataCollection($data) ? responseSuccess($data) : responseError($data);
}

function isDataNotErrorMessage(mixed $data): bool
{
    return (!is_string($data));
}

function responseAfterDelete(mixed $data): Response
{
    return isDataNotErrorMessage($data) ? responseSuccess('Deleted.') : responseError($data); 
}

function responseAfterUpdate(mixed $data): Response
{
    return isDataNotErrorMessage($data) ? responseSuccess('Updated.') : responseError($data);
}