<?php
namespace App\Http\Services\User;

use App\Models\User;

class UserService
{
    public function create($data): array|string
    {
        try {
            $data['password'] = bcrypt($data['password']);

            $user = User::create($data);

            return [
                'user' => $user,
                'token' => $user->createToken('API Token')->accessToken
            ];
        } catch (\Exception $error) {

            return $error->getMessage();
        }
    }
}