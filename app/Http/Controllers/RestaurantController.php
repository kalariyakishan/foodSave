<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Country;
use App\Models\FoodItem;
use App\Models\RestaurantType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use Response;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.restaurant.index');
    }

    public function activityDatatable()
    {

        $record = Restaurant::query();
        return Datatables::of($record)->addColumn('action', function ($item) {
            $editButton = view('components.datatable.edit')->with('url',route('restaurants.edit',$item->id));
            $deleteButton = view('components.datatable.delete',compact('item'))->with('url',route('restaurants.destroy',$item->id))->with('datatable','#datatable');
            $showButton = view('components.datatable.show')->with('url',route('restaurants.show',$item->id));
            $actions = view('components.datatable.action-layout')->with('slot', $editButton.$showButton.$deleteButton);
            return $actions;
        })
            ->editColumn('logo', function ($item) {
                return '<img src="'.$item->logo_path.'" alt="Logo" class="w-32px h-32px rounded-pill" />';
            })
            ->addColumn('email', function ($item) {
                return $item->user->email ?? '-';
            })
            ->rawColumns(['action','logo'])->smart(false, ['action'])->make(true);
    }

    public function activityFoodItemDatatable($restaurant_id)
    {

        $record = FoodItem::query()->where('restaurant_id',$restaurant_id);
        return Datatables::of($record)
            ->addColumn('price', function ($item) {
                return $item->food_size->price ?? '-';
            })
            ->addColumn('app_price', function ($item) {
                return $item->food_size->app_price ?? '-';
            })
            ->editColumn('food_type_id', function ($item) {
                return $item->food_type->name ?? '-';
            })
            ->editColumn('is_surprise', function ($item) {
                return $item->is_surprise ?  'Start Selling' : 'May Be Later';
            })
            
            ->rawColumns([])->smart(false, ['action'])->make(true);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id')->prepend('', '');
        $restaurant_types = RestaurantType::pluck('name', 'id')->prepend('', '');
        return view('backend.restaurant.create',compact('countries','restaurant_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->except(['is_user','email','password']);
        
        if ($request->hasFile('logo')) {

            // Store the new logo
            $logoName = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('public/restaurants', $logoName);

            // Update Restaurant's logo in the database
            $requestData['logo'] = $logoName;
        }
        if ($request->hasFile('banner_image')) {

            // Store the new banner_image
            $logoName = time() . '.' . $request->banner_image->extension();
            $request->banner_image->storeAs('public/restaurants', $logoName);

            // Update Restaurant's banner_image in the database
            $requestData['banner_image'] = $logoName;
        }
        $restaurant = Restaurant::create($requestData);

        $userData = $request->only(['is_user','email','password','name']);
        $userData['restaurant_id'] = $restaurant->id;

        if($request->has('password') && $request->get('password') != ''){
            $userData['password'] = Hash::make($request->get('password'));
        }else{
            $userData['password'] = Hash::make('12345678');
        }
        User::create($userData);
        return redirect(route('restaurants.index'))->with('message', 'Restaurant Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        return view('backend.restaurant.show',compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $countries = Country::pluck('name', 'id')->prepend('Select a country', '');
        $restaurant_types = RestaurantType::pluck('name', 'id')->prepend('Select a type', '');
        return view('backend.restaurant.edit',compact('restaurant','countries','restaurant_types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $requestData = $request->except(['is_user','email','password']);
        
        if ($request->hasFile('logo')) {
            // Delete old avatar if exists
            if ($restaurant->logo != '') {
                Storage::delete('public/restaurants/' . $restaurant->logo);
            }
            // Store the new logo
            $logoName = time() . '.' . $request->logo->extension();
            $request->logo->storeAs('public/restaurants', $logoName);

            // Update Restaurant's logo in the database
            $requestData['logo'] = $logoName;
        }
        if ($request->hasFile('banner_image')) {
            // Delete old avatar if exists
            if ($restaurant->banner_image != '') {
                Storage::delete('public/restaurants/' . $restaurant->banner_image);
            }
            // Store the new logo
            $logoName = time() . '.' . $request->banner_image->extension();
            $request->banner_image->storeAs('public/restaurants', $logoName);

            // Update Restaurant's logo in the database
            $requestData['banner_image'] = $logoName;
        }
        $restaurant->update($requestData);

        $userData = $request->only(['is_user','email','password','name']);

        if($request->has('password') && $request->get('password') != ''){
            $userData['password'] = Hash::make($request->get('password'));
        }else{
            unset($userData['password']);
        }
        $restaurant->user->update($userData);

        return redirect(route('restaurants.index'))->with('message', 'Restaurant Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->logo != '') {
                Storage::delete('public/restaurants/' . $restaurant->logo);
        }
        if ($restaurant->banner_image != '') {
                Storage::delete('public/restaurants/' . $restaurant->banner_image);
        }
        $restaurant->delete();
       
        return response()->json(['message'=>'Restaurant Deleted Successfully!'],200);
    }
}
