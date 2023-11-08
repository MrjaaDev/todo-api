<?php

namespace App\Http\Controllers\Auth\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginRequest;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, UserService $service)
    {
        try {
            $response = $service->Login($request->validated());
            return Response::json([
                'success' => true,
                'message' => 'User login successful!',
                'data' => [
                    'user' => $response->user,
                    'token' => $response->token->plainTextToken
                ]
            ], 201);
        } catch (Exception $exception) {
            report($exception);
            return Response::json([
                'success' => false,
                'message' => 'Internal server error!',
                'data' => [
                    $request->all()
                ]
            ], 500);
        }
    }
}
