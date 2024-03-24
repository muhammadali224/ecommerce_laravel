<?php

namespace App\Http\Controllers\api\branch;

use App\Http\Controllers\api\trait\ApiCrudTrait;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;


class BranchController extends Controller
{
    use ApiCrudTrait;

    public function model()
    {
        return Branch::class;
    }
    public function validationRules()
    {
        return [
            'nameAr' => 'required|max:255',
            'nameEn' => 'required|max:255',
            'isOpen' => 'required',
            'lang' => 'required',
            'late' => 'required',
            'phone1' => 'required|max:10',
            'phone2' => 'required|max:10',
            'facebookUrl' => 'required|max:255',
            'instagramUrl' => 'max:255',
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
