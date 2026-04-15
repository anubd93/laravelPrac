<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private readonly AuthRepository $authRepository
    ){}

    public function registerUser($data){
        $user = $this->authRepository->setName($data['name'])
                            ->setEmail($data['email'])
                            ->setPassword($data['password'])
                            ->registerUser();
        return $user;
        
    }

    public function login($data){
        $validUser = $this->authRepository->setEmail($data['email'])
                                        ->setPassword($data['password'])
                                        ->login();
        
        $token = $validUser->createToken('authToken')->accessToken;

        if (!$validUser || !Hash::check($data['password'], $validUser->password)) {
            return 'Invalid credentials';
        } else {
            return [
                    'user' => [
                        'id'    => $validUser->id,
                        'name'  => $validUser->name,
                        'email' => $validUser->email,
                    ],
                    'access_token' => 'Bearer' . ' ' . $token,
            ];
        }
    }
}
