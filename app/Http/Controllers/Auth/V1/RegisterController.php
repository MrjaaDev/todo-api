<?php

namespace App\Http\Controllers\Auth\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\RegisterRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Response;
use Mockery\Exception;

class RegisterController extends Controller
{

    public function __invoke(RegisterRequest $request, UserService $service)
    {
        try {
            $response = $service->Register($request->validated());
            return Response::json([
                'success' => true,
                'message' => 'User registered successful!',
                'data' => [
                    'token' => $response->plainTextToken
                ]
            ], 201);
        }catch (Exception $exception){
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
