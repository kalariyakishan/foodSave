<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\FoodSize;

class FoodSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.food_size.index');
    }

    public function activityDatatable()
    {

        $record = FoodSize::query();
        return Datatables::of($record)->addColumn('action', function ($item) {
            $editButton = view('components.datatable.edit')->with('url',route('food_sizes.edit',$item->id));
            $actions = view('components.datatable.action-layout')->with('slot', $editButton);
            return $actions;
        })
            ->editColumn('status', function ($item) {
                if($item->status == 1){
                    return 'Active';
                }else{
                    return 'In-Active';
                }
            })
            ->rawColumns(['action'])->smart(false, ['action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $food_size = FoodSize::find($id);
        return view('backend.food_size.edit',compact('food_size'));
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
