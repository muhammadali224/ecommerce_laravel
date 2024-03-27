<?php

namespace App\Http\Controllers\api\sub_category;

use App\Http\Controllers\api\trait\ApiCrudTrait;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    
    use ApiCrudTrait;

    public function model()
    {
        return SubCategory::class;
    }
    public function validationRules()
    {
        return [
            'sub_category_nameAr' => 'required|max:255',
            'sub_category_nameEn' => 'required|max:255',
            'category_id' => 'required',
            
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
