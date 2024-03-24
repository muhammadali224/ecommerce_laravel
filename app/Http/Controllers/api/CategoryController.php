<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\api\trait\FileUploadTrait;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use FileUploadTrait;
    public function index()
    {
        $categories = Category::all();
        if ($categories) {
            return $this->ApiResponseSuccess($categories, "success", 200);
        }
        return $this->ApiResponseFaild("faild", 'no data', 404);
    }
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'category_nameAr' => 'required|max:255',
                'category_nameEn' => 'required|max:255',
                'category_image' => 'required|mimes:png,jpg,jpeg,gif|max:204800'

            ]);

            if ($validate->fails()) {
                return $this->ApiResponseFaild('faild', $validate->errors(), 500);
            } else {
                $path = $this->uploadImage($request, 'category_image', 'category');
                $category = Category::create([
                    'category_image' => $path,
                    'category_nameAr' => $request->category_nameAr,
                    'category_nameEn' => $request->category_nameEn,
                ]);
                if ($category) {
                    return $this->ApiResponseSuccess($category, "success insert category", 201);
                } else {
                    return $this->ApiResponseFaild("faild", "sothing was error", 400);
                }
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if ($category) {
                $this->deleteFile('images/category/' . $category->category_image);
                $category->delete();
                return $this->ApiResponseSuccess($category, "success delete category", 200);
            } else {
                return $this->ApiResponseFaild("faild", "something was error", 400);
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validate = Validator::make($request->all(), [
                'category_nameAr' => 'required|max:255',
                'category_nameEn' => 'required|max:255',
                'category_image' => 'required|mimes:png,jpg,jpeg,gif|max:204800'
            ]);
            if (!$validate->fails()) {
                $category = Category::find($id);
                if ($category) {

                    $formData = $request->all();
                    if ($request->hasFile('category_image')) {
                        $this->deleteFile('images/category/' . $category->category_image);
                        $path = $this->uploadImage($request, 'category_image', 'category');
                        $formData['category_image'] = $path;
                    }
                    $category->update($formData);
                    return $this->ApiResponseSuccess($category, "success", 200);
                } else {
                    return $this->ApiResponseFaild("faild", "no data found", 400);
                }
            } else {
                return $this->ApiResponseFaild('faild', $validate->errors(), 500);
            }
        } catch (Exception $e) {
            return $this->ApiResponseFaild("faild", $e->getMessage(), 500);
        }
    }
}
