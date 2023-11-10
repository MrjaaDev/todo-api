<?php

namespace App\Http\Controllers\Task\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TaskController extends Controller
{
    private TaskService $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Response::json([
            'success'=>true,
            'message'=>'Get task info!',
            'data'=>$this->service->GetAll()
        ]);
    }

    public function show(int $id)
    {
        return Response::json([
            'success'=>true,
            'message'=>'Get task info!',
            'data'=>new TaskResource($this->service->Get($id))
        ]);
    }

    public function user_tasks(Request $request)
    {
        $tasks = $this->service->GetTaskByUser($request->user());
        return Response::json([
            'success'=>true,
            'message'=>'Get task info!',
            'data'=>$tasks
        ]);
    }
}
