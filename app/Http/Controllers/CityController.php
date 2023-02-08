<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function Showcity()
    {
        $city = City::simplepaginate(5);
        $state = State::all();
        return view('city/index', ['city' => $city], ['state' => $state]);
    }

    public function create(Request $request)
    {
        $city = new City();
        $city->state_id = $request->state_name;
        $city->city_name = $request->city_name;
        $city->save();
        return redirect('Showcity')->with('status', 'Inserted Succesfully');
    }
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('city/edit', ['city' =>  $city]);
    }
    public function update(Request $request, $id)
    {
        $city = city::findOrFail($id)->update($request->only('city_name'));
        return redirect('Showcity')->with('status', 'Updated Succesfully');
    }
    public function delete($id)
    {
        City::destroy($id);
        return redirect('Showcity')->with('status', 'Deleted Succesfully');
    }
}
