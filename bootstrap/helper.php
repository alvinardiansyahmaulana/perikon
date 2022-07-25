<?php

use illuminate\Support\Collection;
use Illuminate\Http\Response;

const DELETE_MESSAGE = 'Data deleted.';
const API_TOKEN = 'API Token';

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
    return auth()->user()->createToken(API_TOKEN)->accessToken;
}

function isDataCollection(mixed $data): bool
{
    return ($data instanceof Collection);
}

function isDataNotErrorMessage(mixed $data): bool
{
    return (!is_string($data));
}

function responseWithData(mixed $data): Response
{
    return isDataCollection($data) ? responseSuccess($data) : responseError($data);
}

function responseAfterDelete(mixed $data): Response
{
    return isDataNotErrorMessage($data) ? responseSuccess(DELETE_MESSAGE) : responseError($data); 
}