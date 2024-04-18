<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $categories = Category::all();
        return view('categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create($request->all());

        session()->flash('Add', 'تم اضافة التصنيف بنجاح ');
        return redirect('/categories');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;

        $this->validate($request, [

            'category_name_en' => 'required|max:255|unique:categories,category_name_en,' . $id,
            'category_name_ar' => 'required|max:255|unique:categories,category_name_ar,' . $id,
            'category_image' => 'required',
            'count' => 'required',
            'city_id' => 'required',
            'has_service' => 'required',
        ]);

        $category = Category::find($id);
        $category->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_image' => $request->category_image,
            'count' => $request->count,
            'city_id' => $request->city_id,
            'has_service' => $request->has_service,
        ]);

        session()->flash('edit', 'تم تعديل التصنيف بنجاج');
        return redirect('/categories');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Category::find($id)->delete();
        session()->flash('delete', 'تم حذف التصنيف بنجاح');
        return redirect('/categories');
    }
}
