<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBranchRequest;
use App\Models\DeliveryPlan;
use Illuminate\Http\Request;

class DeliveryPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = DeliveryPlan::all();

        return view('delivery_plans.delivery_plans', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("delivery_plans.add_delivery_plans");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DeliveryPlan::create($request->all());
        return redirect('delivery_plans');
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
