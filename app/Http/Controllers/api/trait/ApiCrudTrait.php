<?php

namespace App\Http\Controllers\api\trait;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ApiCrudTrait
{
    abstract function model();
    abstract function validationRules();
    use ApiResponseTrait;
    public function modelIndex()
    {
        $models = $this->model()::all();
        if ($models) {
            return $this->ApiResponseSuccess($models, "success", 200);
        }
        return $this->ApiResponseFaild("faild", 'no data', 404);
    }
    public function modelCreate(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), $this->validationRules());

            if ($validate->fails()) {
                return $this->ApiResponseFaild('faild', $validate->errors(), 500);
            } else {

                $model = $this->model()::create($request->all());
                if ($model) {

                    return $this->ApiResponseSuccess($model, "success", 201);
                } else {
                    return $this->ApiResponseFaild("faild", "somthing was error", 400);
                }
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }
    public function modelCreateWithFile(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), $this->validationRules());

            if ($validate->fails()) {
                return $this->ApiResponseFaild('faild', $validate->errors(), 500);
            } else {

                $model = $this->model()::create($request->all());
                if ($model) {

                    return $this->ApiResponseSuccess($model, "success", 201);
                } else {
                    return $this->ApiResponseFaild("faild", "somthing was error", 400);
                }
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }

    public function modelShow($resource_id)
    {
        try {
            $model = $this->model()::find($resource_id);
            if ($model) {
                return $this->ApiResponseSuccess($model, "success", 200);
            }
            return $this->ApiResponseFaild("faild", 'no data', 404);
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }

    public function modelUpdate(Request $request, $resource_id)
    {
        try {
            $resource = $this->model()::find($resource_id);

            if ($resource) {
                $validate = Validator::make($request->all(), $this->validationRules($resource_id));



                if ($validate->fails()) {
                    return $this->ApiResponseFaild('faild', $validate->errors(), 500);
                } else {
                    $model = $resource->update($request->all());
                    if ($model) {
                        $resource = $this->model()::find($resource_id);
                        return $this->ApiResponseSuccess($resource, "success", 201);
                    } else {
                        return $this->ApiResponseFaild("faild", "somthing was error", 400);
                    }
                }
            } else {
                return $this->ApiResponseFaild("faild", 'no data', 404);
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }

    public function modelDelete($resource_id)
    {
        try {
            $resource = $this->model()::find($resource_id);
            if ($resource) {
                $resource->delete();
                return $this->ApiResponseSuccess($resource, "success", 200);
            } else {
                return $this->ApiResponseFaild("faild", "something was error", 400);
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }
}
