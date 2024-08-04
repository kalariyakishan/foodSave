<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.user.index');
    }

    public function activityDatatable()
    {

        $record = User::query();
        return Datatables::of($record)->addColumn('action', function ($item) {
            $editButton = view('components.datatable.edit')->with('url',route('users.edit',$item->id));
            $deleteButton = view('components.datatable.delete',compact('item'))->with('url',route('users.destroy',$item->id))->with('datatable','#datatable');
            //$showButton = view('components.datatable.show')->with('url',route('users.show',$item->id));
            $actions = view('components.datatable.action-layout')->with('slot', $editButton.$deleteButton);
            return $actions;
        })
            // ->addColumn('language', function ($languages) {
            //                 return $languages->languages->map(function($language) {
            //                     return $language->name;
            //                 })->implode(',');
            // })
            ->rawColumns(['action'])->smart(false, ['action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        $requestData['password'] = Hash::make('12345678');
        User::create($requestData);

        return redirect(route('users.index'))->with('message', 'User Created Successfully!');
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
        $user = User::find($id);
        return view('backend.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $requestData = $request->all();
        $user = User::find($id);
        $user->update($requestData);

        return redirect(route('users.index'))->with('message', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
       
        return response()->json(['message'=>'User Deleted Successfully!'],200);
        
    }

    public function emailCheck(Request $request)
    {

        $data = $request->all(); // This will get all the request data.
        $userCount = User::where('email', $data['email']);
        if($request->user_id != ''){
            $userCount->where('id','!=',$request->user_id);
        }
        if ($userCount->count()) {
            return Response::json(array('msg' => 'true'));
        } else {
            return Response::json(array('msg' => 'false'));
        }
    }
}
