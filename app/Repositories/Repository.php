<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

abstract class Repository
{
    abstract function model(): Model;

    protected function query()
    {
        return $this->model()->newQuery();
    }

    protected function All()
    {
        return $this->query()->get()->toArray();
    }

    protected function Get(int $id)
    {
        try {
            return $this->query()->find($id);
        }catch (QueryException $queryException){
            report($queryException);
            return null;
        }catch (Exception $exception){
            report($exception);
            return null;
        }
    }

    protected function Create(array $data)
    {
        try {
            $response = $this->query()->create($data);
            DB::commit();
            return $response;
        }catch (QueryException $queryException){
            report($queryException);
            DB::rollBack();
            return null;
        }catch (Exception $exception){
            report($exception);
            DB::rollBack();
            return null;
        }
    }

    protected function Update(int $id, array $data): bool|int|null
    {
        try {
            $response = $this->query()->find($id)->update($data);
            DB::commit();
            return $response;
        }catch (Exception $exception){
            report($exception);
            DB::rollBack();
            return null;
        }
    }

    protected function Delete(int $id)
    {
        try {
            $response = $this->query()->find($id)->delete();
            DB::commit();
            return $response;
        }catch (Exception $exception){
            report($exception);
            DB::rollBack();
            return null;
        }
    }
}
