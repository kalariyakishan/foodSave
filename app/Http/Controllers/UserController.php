<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\Storage;

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
            ->editColumn('avatar', function ($item) {
                return '<img src="'.$item->avatar_path.'" alt="User Avatar" class="w-32px h-32px rounded-pill" />';
            })
            ->rawColumns(['action','avatar'])->smart(false, ['action'])->make(true);
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
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar != '') {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            // Store the new avatar
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);

            // Update user's avatar in the database
            $requestData['avatar'] = $avatarName;
        }
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
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar != '') {
                Storage::delete('public/avatars/' . $user->avatar);
            }

            // Store the new avatar
            $avatarName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('public/avatars', $avatarName);

            // Update user's avatar in the database
            $requestData['avatar'] = $avatarName;
        }
        $user->update($requestData);

        return redirect(route('users.index'))->with('message', 'User Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user->avatar != '') {
                Storage::delete('public/avatars/' . $user->avatar);
        }
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
