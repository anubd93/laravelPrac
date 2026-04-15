<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ){}

    public function registerUser(RegisterUserRequest $request){
        try {
            $response = $this->authService->registerUser($request->validated());
            if(is_array($response)){
                return response(
                    [
                        'success' => true,
                        'error' => null,
                        'data' => $response
                    ], Response::HTTP_OK);
            } else {
                return response(
                    [
                        'success' => false,
                        'error' => 'User not registered',
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (Exception $e) {
            return response(['success' => false, 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function login(LoginRequest $request){
        try {
            $response = $this->authService->login($request->validated());
            if(is_array($response)){
                return response(
                    [
                        'success' => true,
                        'error' => null,
                        'data' => $response
                    ], Response::HTTP_OK);
            } else {
                return response(
                    [
                        'success' => false,
                        'error' => $response,
                    ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        } catch (Exception $e) {
            return response([
                'success' => false,
                'error' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
