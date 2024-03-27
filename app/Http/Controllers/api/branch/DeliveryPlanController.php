<?php

namespace App\Http\Controllers\api\branch;

use App\Http\Controllers\api\trait\ApiCrudTrait;
use App\Http\Controllers\Controller;
use App\Models\DeliveryPlan;
use Illuminate\Http\Request;

class DeliveryPlanController extends Controller
{

    use ApiCrudTrait;

    public function model()
    {
        return DeliveryPlan::class;
    }
    public function validationRules()
    {
        return [
            'plan_name' => 'required|max:255',
            'base_price' => 'required|max:255',
            'charge' => 'required',
            'isFixed' => 'required',
            'fix_charg' => 'required',
            'fix_zone' => 'required|max:10',
            'max_zone' => 'required|max:10',

        ];
    }
    public function index()
    {
        return $this->modelIndex();
    }

    public function store(Request $request)
    {
        return $this->modelCreate($request);
    }


    public function update(Request $request, $id)
    {
        return $this->modelUpdate($request, $id);
    }

    public function destroy($id)
    {
        return $this->modelDelete($id);
    }
}
