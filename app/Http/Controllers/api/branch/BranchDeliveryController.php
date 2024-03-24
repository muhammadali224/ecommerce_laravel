<?php

namespace App\Http\Controllers\api\branch;

use App\Http\Controllers\api\trait\ApiCrudTrait;
use App\Http\Controllers\Controller;
use App\Models\BranchDelivery;
use Illuminate\Http\Request;

class BranchDeliveryController extends Controller
{
    use ApiCrudTrait;

    public function model()
    {
        return BranchDelivery::class;
    }
    public function validationRules()
    {
        return [
            'plan_name' => 'required|max:255',
            'base_price' => 'required',
            'charge' => 'required',
            'isFixed' => 'required',
            'fix_charge' => 'required',
            'fix_zone' => 'required',
            'max_zone' => 'required',
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
