<?php

namespace App\Http\Controllers;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cities = City::all();
        return view('cities.index',["cities" => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response()->view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'name' => 'required|string|min:3|max:30',
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'active' => 'required|boolean',
        // ]);
        // $city = new City();
        //     $city->name = $request->input('name');
        //     $city->latitude = $request->input('latitude');
        //     $city->longitude = $request->input('longitude');
        //     $city->active = $request->has('active');
        //     $isSaved = $city->save();
        // if ($isSaved) {
        //     session()->flash('message', __('cms.successfully registered'));
        //     return redirect()->back();
        // } else {
        //     return redirect()->back();
        // }
        $request->validate([
        'name' => 'required|string|min:3|max:30',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'active' => 'nullable|string|in:on',
        ]);
        $city = new City();
        $city->name = $request->input('name');
        $city->latitude = $request->input('latitude');
        $city->longitude = $request->input('longitude');
        $city->active = $request->has('active');
        $isSaved = $city->save();

        if ($isSaved) {
            session()->flash('message', __('cms.successfully registered'));
            return redirect()->back();
        } else {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        //
        return response()->view('cities.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'active' => 'nullable|string|in:on'
        ]);
        $city->name = $request->input('name');
        $city->latitude = $request->input('latitude');
        $city->longitude = $request->input('longitude');
        $city->active = $request->has('active');
        $isUpdate = $city->save();
        if ($isUpdate) {
            // session()->flash('message', __('cms.edited_successfully'));

            return redirect()->route('cities.index');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
        $delete = $city->delete();
        return redirect()->back();
    }
}
